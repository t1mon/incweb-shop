<?php

namespace shop\forms\manage\Shop\Product;

use shop\entities\Shop\Brand;
use shop\entities\Shop\Characteristic;
use shop\entities\Shop\Product\Product;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use shop\validators\SlugValidator;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * @property PriceForm $price
 * @property QuantityForm $quantity
 * @property MetaForm $meta
 * @property CategoriesForm $categories
 * @property PhotosForm $photos
 * @property TagsForm $tags
 * @property ValueForm[] $values
 */
class ProductCreateForm extends CompositeForm
{
    public $brandId;
    public $code;
    public $name;
    public $description;
    public $weight;
    public $slug;

    public function __construct($config = [])
    {
        $this->price = new PriceForm();
        $this->quantity = new QuantityForm();
        $this->meta = new MetaForm();
        $this->categories = new CategoriesForm();
        $this->photos = new PhotosForm();
        $this->tags = new TagsForm();
        $this->values = array_map(function (Characteristic $characteristic) {
            return new ValueForm($characteristic);
        }, Characteristic::find()->orderBy('sort')->all());
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['brandId', 'code', 'name', 'weight'], 'required'],
            [['code', 'name','slug'], 'string', 'max' => 255],
            [['brandId'], 'integer'],
            [['name'], 'unique','targetClass' => Product::class, 'filter' => $this->name ? Inflector::slug($this->name) : null],
            [['code','slug'], 'unique', 'targetClass' => Product::class],
            ['description', 'string'],
            ['description', 'string'],
            ['slug', SlugValidator::class],
            ['weight', 'integer', 'min' => 0],
        ];
    }

    public function brandsList(): array
    {
        return ArrayHelper::map(Brand::find()->orderBy('name')->asArray()->all(), 'id', 'name');
    }

    protected function internalForms(): array
    {
        return ['price', 'quantity', 'meta', 'photos', 'categories', 'tags', 'values'];
    }
}