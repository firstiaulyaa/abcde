<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SantriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="santri-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nis') ?>

    <?= $form->field($model, 'nama_l') ?>

    <?= $form->field($model, 'nama_p') ?>

    <?= $form->field($model, 'id_jk') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'anak_ke') ?>

    <?php // echo $form->field($model, 'id_pend') ?>

    <?php // echo $form->field($model, 'id_ortu') ?>

    <?php // echo $form->field($model, 'tanggal_masuk') ?>

    <?php // echo $form->field($model, 'id_jilid') ?>

    <?php // echo $form->field($model, 'id_kelas') ?>

    <?php // echo $form->field($model, 'id_katsyah') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'id_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
