<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Fans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
