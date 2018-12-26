<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MpUser */

$this->title = 'Create Mp User';
$this->params['breadcrumbs'][] = ['label' => 'Mp Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mp-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
