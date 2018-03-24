<?php

namespace frontend\controllers\shop;

use shop\forms\Shop\AddToCartForm;
use shop\forms\Shop\ReviewForm;
use shop\forms\Shop\Search\SearchForm;
use shop\readModels\Shop\BrandReadRepository;
use shop\readModels\Shop\CategoryReadRepository;
use shop\readModels\Shop\ProductReadRepository;
use shop\readModels\Shop\TagReadRepository;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use shop\useCases\manage\Shop\ReviewManageService;

class CatalogController extends Controller
{
    public $layout = 'catalog';

    private $products;
    private $categories;
    private $brands;
    private $tags;
    private $review;

    public function __construct(
        $id,
        $module,
        ProductReadRepository $products,
        CategoryReadRepository $categories,
        BrandReadRepository $brands,
        TagReadRepository $tags,
        ReviewManageService $review,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->products = $products;
        $this->categories = $categories;
        $this->brands = $brands;
        $this->tags = $tags;
        $this->review = $review;
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->products->getAll();
        $category = $this->categories->getRoot();

        return $this->render('index', [
            'category' => $category,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionCategory($id)
    {
        if (!$category = $this->categories->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $dataProvider = $this->products->getAllByCategory($category);

        return $this->render('category', [
            'category' => $category,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionBrand($id)
    {
        if (!$brand = $this->brands->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $dataProvider = $this->products->getAllByBrand($brand);

        return $this->render('brand', [
            'brand' => $brand,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionTag($id)
    {
        if (!$tag = $this->tags->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $dataProvider = $this->products->getAllByTag($tag);

        return $this->render('tag', [
            'tag' => $tag,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed
     */
    public function actionSearch()
    {
            $this->layout = 'search';
            $form = new SearchForm();
            $form->load(\Yii::$app->request->queryParams);
            $form->validate();
            try {
                $dataProvider = $this->products->search($form);
            }
            catch (\Exception $e){
                $dataProvider = null;
                \Yii::$app->errorHandler->logException($e);
                \Yii::$app->session->setFlash('error', 'BAD REQUEST');
            }
            return $this->render('search', [
                'dataProvider' => $dataProvider,
                'searchForm' => $form,
            ]);

    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionProduct($id)
    {
        if (!$product = $this->products->find($id)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        \Yii::$app->getUser()->setReturnUrl(\Yii::$app->request->url);
        $this->layout = 'blank';
        $cartForm = new AddToCartForm($product);
        $reviewForm = new ReviewForm();
        if ($reviewForm->load(\Yii::$app->request->post()) && $reviewForm->validate()) {
            $this->review->addReview(\Yii::$app->user->id, $id, $reviewForm);
            \Yii::$app->session->setFlash('success', 'Спасибо! Ваш отзыв добавлен (отзыв появится после проверки модератором)!');
        }
        return $this->render('product', [
            'product' => $product,
            'cartForm' => $cartForm,
            'reviewForm' => $reviewForm,
        ]);
    }
}