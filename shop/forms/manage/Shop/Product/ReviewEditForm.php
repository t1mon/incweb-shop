<?php

namespace shop\forms\manage\Shop\Product;

use shop\entities\Shop\Product\Review;
use yii\base\Model;

class ReviewEditForm extends Model
{
    public $vote;
    public $text;

    public function __construct(Review $review, $config = [])
    {
        $this->vote = $review->vote;
        $this->text = $review->text;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['vote', 'text'], 'required'],
            [['vote'], 'in', 'range' => array_keys($this->votesList())],
            ['text', 'string'],
        ];
    }

    public function votesList(): array
    {
        return [
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
        ];
    }
}