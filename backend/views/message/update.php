<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MessageHistory */

$this->title = 'Update Message History: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Message Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
