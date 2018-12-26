<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReplyRule */

$this->title = 'Create Reply Rule';
$this->params['breadcrumbs'][] = ['label' => 'Reply Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
