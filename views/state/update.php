<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\State */

$this->title = \Yii::t('common', 'Update State: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_state]];
$this->params['breadcrumbs'][] = \Yii::t('common', 'Update');
?>
<div class="state-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
