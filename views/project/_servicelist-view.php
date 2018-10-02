<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>

<div class="serviceset-info">
  <h3 class="serviceset-info-title">
         <?php
            echo \Yii::t('common', 'Serviceset number') . ': ';
            echo HtmlPurifier::process($model['id']);
         ?>
  </h3>
  <p class="pull-right">
     <?php
     $optionUpdate = ['class' => 'btn btn-primary'];
     $optionDelet = [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post']
          ];
     if($model['isOpen'] == '0') {
         Html::addCssClass($optionUpdate,  ['not_click', 'disabled']);
         Html::addCssClass($optionDelet, ['not_click', 'disabled']);
     }
     echo Html::a(\Yii::t('common', 'Update'), ['serviceset/update', 'id' => $model['id']], $optionUpdate);
     echo Html::a(\Yii::t('common', 'Delete'), ['serviceset/delete', 'id' => $model['id']], $optionDelet); ?>
  </p>
  <div>
      <?php
      $checked = ($model['isOpen'] == '0');
      $option = ['label' => \Yii::t('common', 'Close project')];
      if ($model['isOpen'] == '0') {
          $option['disabled'] = true;
      }
      echo Html::beginForm( 'project/close', 'post', ['name' => 'close-project_form']);
      echo Html::checkbox('close-project', $checked, $option);
      echo Html::endForm();
      ?>
  </div>
  <div>
     <?php
     $checked = ($model['payment'] != null);
     $option = ['label' => \Yii::t('common', 'Paid')];
     if ($model['payment'] != null) {
         $option['disabled'] = true;
     }
     echo Html::beginForm( 'project/payment', 'post', ['name' => 'payment-check_form']);
     echo Html::checkbox('pay', $checked, $option);
     echo Html::endForm();
     ?>
  </div>
  <div>
      <?php
      echo \Yii::t('common', 'State') . ': ';
      echo Html::encode($model['state']);
      ?>
  </div>
  <div>
      <?php
      echo \Yii::t('common', 'Payment') . ': ';
      if ($model['payment'] != null) {
          echo Html::encode($model['payment']);
      } else {
          echo Html::encode('--');
      }
      ?>
  </div>
  <div>
      <?php
      echo \Yii::t('common', 'Delivery') . ': ';
      if ($model['delivery'] != null) {
          echo Html::encode($model['delivery']);
      } else {
          echo Html::encode('--');
      }
      ?>
  </div>
</div>
