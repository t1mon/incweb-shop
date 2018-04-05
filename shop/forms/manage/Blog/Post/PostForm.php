<?php

namespace shop\forms\manage\Blog\Post;

use shop\entities\Blog\Category;
use shop\entities\Blog\Post\Post;
use shop\forms\CompositeForm;
use shop\forms\manage\MetaForm;
use shop\validators\SlugValidator;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

/**
 * @property MetaForm $meta
 * @property TagsForm $tags
 */
class PostForm extends CompositeForm
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $categoryId;
    public $title;
    public $description;
    public $content;
    public $photo;
    public $slug;

    private  $_post;

    public function __construct(Post $post = null, $config = [])
    {
        if ($post) {
            $this->categoryId = $post->category_id;
            $this->title = $post->title;
            $this->description = $post->description;
            $this->content = $post->content;
            $this->meta = new MetaForm($post->meta);
            $this->tags = new TagsForm($post);
            $this->slug = $post->slug;
            $this->_post =$post;
        } else {
            $this->meta = new MetaForm();
            $this->tags = new TagsForm();
        }
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['categoryId', 'title'], 'required'],
            //[['title'], 'unique','targetClass' => Post::class, 'filter' => $this->title ? Inflector::slug($this->title) : null,'on' => self::SCENARIO_CREATE],
            [['slug','title'], 'unique','targetClass' => Post::class, 'filter' => $this->_post ? ['<>', 'id', $this->_post->id] : null,'on' => self::SCENARIO_CREATE],
            [['title'], 'string', 'max' => 255],
            [['categoryId'], 'integer'],
            [['description', 'content'], 'string'],
            [['photo'], 'image'],
            ['slug', SlugValidator::class],
        ];
    }

    public function categoriesList(): array
    {
        return ArrayHelper::map(Category::find()->orderBy('sort')->asArray()->all(), 'id', 'name');
    }

    protected function internalForms(): array
    {
        return ['meta', 'tags'];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->photo = UploadedFile::getInstance($this, 'photo');
            return true;
        }
        return false;
    }
}