<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = Yii::t('common', 'Create Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'version' => $model->version,
    ]) ?>

</div>
