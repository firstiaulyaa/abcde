<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Santri;
use app\models\Jilid;
use app\models\TahunAjaran;

use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiTes */
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

<div class="nilai-tes-form">
    <div class="box box-success">
        <div class="box-body">

            <?= $form->field($model, 'id_santri')->widget(Select2::classname(), [
                'data' =>  Santri::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'id_thnajaran')->widget(Select2::classname(), [
                'data' =>  TahunAjaran::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'id_jilid')->widget(Select2::classname(), [
                'data' =>  Jilid::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'tanggal_tes')->widget(DatePicker::classname(), [
                'removeButton' => false,
                'value' => date('Y-m-d'),
                'options' => ['placeholder' => '- Tanggal Tes -'],
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
            ]) ?>

            <?= $form->field($model, 'kelancaran')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'kefasihan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tajwid')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'makhroj')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'saran')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'keterangan')->textarea(['rows' => 2]) ?>

            <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-3">
                    <?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>