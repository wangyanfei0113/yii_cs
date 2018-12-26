<?php
/**
 * Created by PhpStorm.
 * User: wyf
 * Date: 2018/12/26
 * Time: 16:40
 */

namespace backend\controllers;

class TestController extends BaseController
{
    public function actionIndex()
    {
        $data = \Yii::$app->request->post();

    }
}