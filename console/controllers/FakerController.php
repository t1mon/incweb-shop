<?php
/**
 * Created by PhpStorm.
 * User: dmitri
 * Date: 06/03/2020
 * Time: 20:19
 */

namespace console\controllers;

use shop\useCases\auth\AuthService;
use Faker\Factory;
use yii\console\Controller;
use shop\useCases\manage\Shop\ProductManageService;
use yii\httpclient\Client;


class FakerController extends Controller
{
    private $service;
    private $authService;

    public function __construct($id, $module, ProductManageService $service, AuthService $authService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->service = $service;
        $this->authService = $authService;
    }

    public function actionFake(){
//        $faker = Factory::create();
//        for ($i=0;$i<2000;$i++) {
//            Yii::$app->db->createCommand()->insert('shop_products', [
//                'category_id' => 2,
//                'brand_id' => 1,
//                'created_at' => time(),
//                'code' => (string)$faker->unique()->randomNumber().'0',
//                'name' => $faker->name,
//                'price_old' => '22',
//                'price_new' => '1212',
//                'meta_json' => '{"title":"","description":"","keywords":""}',
//                'status' => 1,
//                'weight' => 0,
//                'quantity' => 1000,
//                'slug' => $faker->name,
//                'main_photo_id' => 1
//            ])->execute();
//            $this->stdout('generated... #'.$i . PHP_EOL);
//        }

    }

    public function actionAdd(){
        $client = new Client();
        $faker = Factory::create();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://jsonplaceholder.typicode.com/photos')
            ->send();

        $res = json_decode($response->content);
         //print_r($res[333]->url);


        //for ($i = 1; $i <= 1000; $i++) {
        //$file = file_get_contents('http://static.shop.test/1.jpg');
            $file = file_get_contents($res[777]->url);
        $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl('http://api.shop.test/shop/products/add')
                ->addHeaders(['Authorization' => 'Bearer 96099d1fc30207400c8b873075d6f048e8677427'])
                ->setData([
                    'name'=>$faker->name.$faker->unique()->userName,
                    'category' => 2,
                    'price' => $faker->randomNumber(),
                    'code' => $faker->text(5).$faker->unique()->randomNumber(),
                    'brand' => 1,
                    'description' => $faker->text(500)

                ])
                ->addFileContent('files', $file)
                ->send();
            $this->stdout($response. PHP_EOL);
            //}
      //  }
    }
}