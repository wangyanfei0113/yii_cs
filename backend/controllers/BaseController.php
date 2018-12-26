<?php
/**
 * Created by PhpStorm.
 * User: wyf
 * Date: 2018/12/26
 * Time: 16:42
 */

namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public function init()
    {
        $this->enableCsrfValidation = false;
        parent::init();
    }
}