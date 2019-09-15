<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SyahriyahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="syahriyah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_santri') ?>

    <?= $form->field($model, 'id_katsyah') ?>

    <?= $form->field($model, 'id_bulan') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'tanggal_bayar') ?>

    <?php // echo $form->field($model, 'id_katsyah') ?>

    <?php // echo $form->field($model, 'nominal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
