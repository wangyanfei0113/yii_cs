<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MpUser */

$this->title = '用户创建';
$this->params['breadcrumbs'][] = ['label' => 'mp用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mp-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
