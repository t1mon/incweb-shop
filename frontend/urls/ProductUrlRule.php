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
        if (preg_match('#^catalog/[\w\-]+/(.*[a-z0-9])$#is',$request->pathInfo, $matches)) {
            $path = $matches['1'];
            $category = explode('/',$matches['0']);
            $result = $this->cache->getOrSet(['product_route', 'path' => $path], function () use ($path) {

                if (!$product = $this->repository->findBySlug($path)) {
                    return ['id' => null, 'path' => null];
                }
                return ['id' => $product->id];
            });
            if (empty($result['id'])) { return false; }
            if ($category[1] != $this->repository->getCategory($result['id'])){
                throw new UrlNormalizerRedirectException(['shop/catalog/product', 'id' => $result['id']],301);
            }
            return ['shop/catalog/product/',['id' => $result['id']]];
        }
        return false;
    }

    public function createUrl($manager, $route, $params)
    {
        if ($route == 'shop/catalog/product'){

            if (empty($params['id'])) {
                throw new InvalidParamException('Empty id.');
            }
            $id = $params['id'];

            $url = $this->cache->getOrSet(['product_route', 'id' => $id], function () use ($id) {
                if (!$product = $this->repository->find($id)) {
                    return null;
                }
                return $this->prefix . '/'.$product->category->name.'/' .$product->slug;
            });
            return $url;
        }
        return false;
    }
}