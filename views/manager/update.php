<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Manager */

$this->title = \Yii::t('common', 'Update Manager: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'Managers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_manager]];
$this->params['breadcrumbs'][] = \Yii::t('common', 'Update');
?>
<div class="manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
