<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fans */

$this->title = 'Create Fans';
$this->params['breadcrumbs'][] = ['label' => 'Fans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
