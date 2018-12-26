<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Wechat */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wechats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="wechat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'token',
            'access_token',
            'account',
            'original',
            'type',
            'key',
            'secret',
            'encoding_aes_key',
            'avatar',
            'qrcode',
            'address',
            'description',
            'username',
            'status',
            'password',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
