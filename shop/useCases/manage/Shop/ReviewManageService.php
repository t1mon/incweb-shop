<?php

namespace shop\useCases\manage\Shop;

use shop\forms\manage\Shop\Product\ReviewEditForm;
use shop\forms\Shop\ReviewForm;
use shop\repositories\Shop\ProductRepository;

class ReviewManageService
{
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }
    public function addReview($user_id,$id,ReviewForm $form):void
    {
        $product = $this->products->get($id);
        $product->addReview($user_id,$form->vote,$form->text,$id);
        $product->save($product);
    }
    public function edit($id, $reviewId, ReviewEditForm $form): void
    {
        $product = $this->products->get($id);
        $product->editReview(
            $reviewId,
            $form->vote,
            $form->text
        );
        $this->products->save($product);
    }

    public function activate($id, $reviewId): void
    {
        $product = $this->products->get($id);
        $product->activateReview($reviewId);
        $this->products->save($product);
    }

    public function draft($id, $reviewId): void
    {
        $product = $this->products->get($id);
        $product->draftReview($reviewId);
        $this->products->save($product);
    }

    public function remove($id, $reviewId): void
    {
        $product = $this->products->get($id);
        $product->removeReview($reviewId);
        $this->products->save($product);
    }
}