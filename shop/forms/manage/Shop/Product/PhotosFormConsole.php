<?php

namespace shop\forms\manage\Shop\Product;

use Faker\Factory;
use yii\base\Model;
use yii\web\UploadedFile;

class PhotosFormConsole extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $files;

    public function rules(): array
    {
        return [
            ['files', 'each', 'rule' => ['image']],
        ];
    }

    public function beforeValidate(): bool
    {
        if (parent::beforeValidate()) {
            $this->files = UploadedFile::getInstancesByName('files');
            return true;
        }
        return false;
    }
}