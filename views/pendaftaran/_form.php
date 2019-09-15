<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//ekstensions
use kartik\number\NumberControl;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftaran */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-4',
        'error' => '',
        'hint' => '',
        ],
    ],
]); ?>

<div class="pendaftaran-form">
    <div class="box box-default box-solid">
        <div class="box-header">
            <h3 class="box-title">Informasi Pendaftaran</h3>
        </div>

        <div class="box-body">
            <table class="table">
                <tr>
                    <th>Biaya Pendaftaran</th>
                    <th>Biaya Buku Jilid (Yanbu'a)</th>
                    <th>Biaya Buku Prestasi</th>
                    <th>Biaya Buku Rapot</th>
                </tr>
                <tr>
                    <td>Rp. 20,000</td>
                    <td>Rp. 20,000</td>
                    <td>Rp. 20,000</td>
                    <td>Rp. 20,000</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">
            <?= $form->field($model, 'tanggal_daftar')->widget(DatePicker::classname(), [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => '- Tanggal -'],
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
              ]) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'biaya_pendftr')->widget(NumberControl::classname(), [
                'name' => 'normal-decimal',
            ]); ?>

            <?= $form->field($model, 'biaya_jilid')->widget(NumberControl::classname(), [
                'name' => 'normal-decimal',
            ]); ?>

            <?= $form->field($model, 'biaya_bukuprestasi')->widget(NumberControl::classname(), [
                'name' => 'normal-decimal',
            ]); ?>

            <?= $form->field($model, 'biaya_bukurapot')->widget(NumberControl::classname(), [
                'name' => 'normal-decimal',
            ]); ?>
        </div>

        <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-3">
                <?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
