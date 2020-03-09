<?php

namespace shop\forms\Blog;

use yii\base\Model;

class CommentForm extends Model
{
    public $parentId;
    public $text;

    public function rules(): array
    {
        return [
            [['text'], 'required'],
            ['text', 'string'],
            ['parentId', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'text' => 'Текст комментария'

        ];

    }
}