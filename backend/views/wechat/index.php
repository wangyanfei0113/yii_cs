<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wechats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wechat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'token',
            'access_token',
            'account',
            //'original',
            //'type',
            //'key',
            //'secret',
            //'encoding_aes_key',
            //'avatar',
            //'qrcode',
            //'address',
            //'description',
            //'username',
            //'status',
            //'password',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
