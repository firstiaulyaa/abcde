<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengantarTesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengantar-tes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_thnajaran') ?>

    <?= $form->field($model, 'tanggal_tes') ?>

    <?= $form->field($model, 'id_santri') ?>

    <?= $form->field($model, 'id_jilid') ?>

    <?php // echo $form->field($model, 'kelancaran') ?>

    <?php // echo $form->field($model, 'kefasihan') ?>

    <?php // echo $form->field($model, 'makhroj') ?>

    <?php // echo $form->field($model, 'tajiwd') ?>

    <?php // echo $form->field($model, 'saran') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
