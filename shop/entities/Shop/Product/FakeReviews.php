<?php

namespace shop\entities\Shop\Product;

use Yii;

/**
 * This is the model class for table "shop_fake_reviews".
 *
 * @property int $id
 * @property int $product_id
 * @property int $created_at
 * @property string $user_name
 * @property int $vote
 * @property string $text
 * @property int $active
 *
 * @property ShopProducts $product
 */
class FakeReviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_fake_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'created_at', 'user_name', 'vote', 'text', 'active'], 'required'],
            [['product_id', 'created_at', 'vote'], 'integer'],
            [['text'], 'string'],
            [['user_name'], 'string', 'max' => 255],
            [['active'], 'string', 'max' => 1],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'created_at' => 'Created At',
            'user_name' => 'User Name',
            'vote' => 'Vote',
            'text' => 'Text',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
