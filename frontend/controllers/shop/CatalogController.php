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
use yii\mail\MailerInterface;
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
    private $mailer;

    public function __construct(
        $id,
        $module,
        ProductReadRepository $products,
        CategoryReadRepository $categories,
        BrandReadRepository $brands,
        TagReadRepository $tags,
        ReviewManageService $review,
        MailerInterface $mailer,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->products = $products;
        $this->categories = $categories;
        $this->brands = $brands;
        $this->tags = $tags;
        $this->review = $review;
        $this->mailer = $mailer;
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
                \Yii::$app->session->setFlash('error', 'Bad Request code:'.$e->getCode());
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

    public function actionConsultation()
    {
        if (\Yii::$app->request->isAjax) {
            $dkim = \Yii::$app->params['dkim'];
            $signer = new \Swift_Signers_DKIMSigner(trim($dkim['privateKey']), trim($dkim['domainName']), trim($dkim['selector']));
            $sent = $this->mailer
                ->compose(
                    ['html' => 'auth/consult/consult-html', 'text' => 'auth/consult/consult-text'],
                    [
                        'name' => \Yii::$app->request->post('name'),
                        'phone' => \Yii::$app->request->post('phone'),
                        'message' => \Yii::$app->request->post('message')
                    ]
                )
                ->setTo('gorin163@gmail.com')
                ->setSubject('Пользователь запросил консультацию');
            $sent->getSwiftMessage()->attachSigner($signer);
            $sent->send();

            if (!$sent) {
                throw new \RuntimeException('Sending error.');
            } else
                return 1;
            //return  \Yii::$app->request->post('name').\Yii::$app->request->post('phone').\Yii::$app->request->post('message');
        }

    }
}