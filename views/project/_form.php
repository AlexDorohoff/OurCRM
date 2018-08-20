<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?
    if($model->id_client){
        echo $form->field($model, 'id_client')->textInput(['maxlength' => true, 'readonly' => true]);
    } else {
        echo $form->field($model, 'id_client')->textInput(['maxlength' => true]);
    }
    ?>

    <?
    if($model->id_user){
        echo $form->field($model, 'id_user')->textInput(['maxlength' => true, 'readonly' => true]);
    } else {
        echo $form->field($model, 'id_user')->textInput(['maxlength' => true]);
    }
    ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
