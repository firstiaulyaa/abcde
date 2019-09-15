<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//models
use app\models\Santri;
use app\models\Bulan;
use app\models\Katsyah;

//ekstensions
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\number\NumberControl;


/* @var $this yii\web\View */
/* @var $model app\models\Syahriyah */
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

<div class="syahriyah-form">
  <div class="box box-success">
    <div class="box-body">

    <?= $form->field($model, 'id_santri')->widget(Select2::classname(), [
        'data' =>  Santri::getList(),
        'options' => [
                  'placeholder' => '- Pilih -',
                ],
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

    <?= $form->field($model, 'id_katsyah')->widget(Select2::classname(), [
        'data' =>  Katsyah::getList(),
        'options' => [
                  'placeholder' => '- Pilih -',
                ],
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

    <?= $form->field($model, 'id_bulan')->widget(Select2::classname(), [
        'data' =>  Bulan::getList(),
        'options' => [
                  'placeholder' => '- Pilih -',
                ],
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_bayar')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'value' => date('Y-m-d'),
        'options' => ['placeholder' => '- Tanggal Bayar -'],
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
        ]
      ]) ?>

    <?= $form->field($model, 'nominal')->widget(NumberControl::classname(), [
        'name' => 'normal-decimal',
    ]); ?>

      <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
          <?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php ActiveForm::end(); ?>
