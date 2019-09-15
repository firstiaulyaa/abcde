<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PendaftaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'biaya_pendftr') ?>

    <?= $form->field($model, 'biaya_jilid') ?>

    <?= $form->field($model, 'biaya_bukuprestasi') ?>

    <?php // echo $form->field($model, 'biaya_bukurapot') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
