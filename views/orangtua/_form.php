<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//ekstensions
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\file\FileInput;

//memangil model
use app\models\Santri;
use app\models\Pendidikan;
use app\models\Pekerjaan;

/* @var $this yii\web\View */
/* @var $model app\models\Ortu */
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
    ]
]); ?>

<div class="orang-tua-form">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Form Ayah</h3>
        </div>

        <div class="box-body">

            <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tempat_lahir_ayah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tanggal_lahir_ayah')->widget(DatePicker::classname(), [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => '- Tanggal Lahir Ayah -'],
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ]) ?>

            <?= $form->field($model, 'id_pend_ayah')->widget(Select2::classname(), [
                'data' =>  Pendidikan::getList(),
                'options' => [
                  'placeholder' => '- Pendidikan Ayah -',
                ],
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'id_pkj_ayah')->widget(Select2::classname(), [
                'data' =>  Pekerjaan::getList(),
                'options' => [
                  'placeholder' => '- Pekerjaan Ayah -',
                ],
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'telp_ayah')->textInput() ?>
        </div>
    </div>
    
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Form Ibu</h3>
         </div>

        <div class="box-body">

            <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tempat_lahir_ibu')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tanggal_lahir_ibu')->widget(DatePicker::classname(), [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => '- Tanggal Lahir Ibu -'],
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ]) ?>

            <?= $form->field($model, 'id_pend_ibu')->widget(Select2::classname(), [
                'data' =>  Pendidikan::getList(),
                'options' => [
                  'placeholder' => '- Pendidikan Ibu -',
                ],
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'id_pkj_ibu')->widget(Select2::classname(), [
                'data' =>  Pekerjaan::getList(),
                'options' => [
                  'placeholder' => '- Pekerjaan Ibu -',
                ],
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'telp_ibu')->textInput() ?>
        </div>
            
        <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-3">
              <?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
