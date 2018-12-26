<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReplyKeyword */

$this->title = 'Create Reply Keyword';
$this->params['breadcrumbs'][] = ['label' => 'Reply Keywords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-keyword-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
