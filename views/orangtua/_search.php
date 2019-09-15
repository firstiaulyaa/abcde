<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrangtuaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orangtua-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_ayah') ?>

    <?= $form->field($model, 'tempat_lahir_ayah') ?>

    <?= $form->field($model, 'tanggal_lahir_ayah') ?>

    <?= $form->field($model, 'id_pend_ayah') ?>

    <?php // echo $form->field($model, 'id_pkj_ayah') ?>

    <?php // echo $form->field($model, 'telp_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'tempat_lahir_ibu') ?>

    <?php // echo $form->field($model, 'tanggal_lahir_ibu') ?>

    <?php // echo $form->field($model, 'id_pend_ibu') ?>

    <?php // echo $form->field($model, 'id_pkj_ibu') ?>

    <?php // echo $form->field($model, 'telp_ibu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
