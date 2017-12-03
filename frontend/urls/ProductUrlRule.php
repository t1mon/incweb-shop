<?php
namespace frontend\urls;


use shop\readModels\Shop\ProductReadRepository;
use yii\base\InvalidParamException;
use yii\base\Object;
use yii\caching\Cache;
use yii\web\UrlNormalizerRedirectException;
use yii\web\UrlRuleInterface;

class ProductUrlRule extends Object implements UrlRuleInterface
{
    public $prefix = 'catalog';
    private $repository;
    private $cache;

    public function __construct(ProductReadRepository $repository, Cache $cache, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function parseRequest($manager, $request)
    {
        if (preg_match('#^' . $this->prefix . '/(.*[a-z])$#is',$request->pathInfo, $matches)) {
            $path = $matches['1'];
            $chunks = explode('/', $path);
            $slug = end($chunks);
            if (!$product = $this->repository->findBySlug($slug)) {
                return false;
            }

            return ['shop/catalog/product/',['id' => $product->id]];
        }
        return false;
    }

    public function createUrl($manager, $route, $params)
    {
        if ($route == 'shop/catalog/product'){
            if(!$product = $this->repository->find($params['id'])){
                throw new InvalidParamException('Undefined ID');
            }

            $url = $this->prefix . '/' .$product->slug;
            return $url;
        }

        return false;
    }


}