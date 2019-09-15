<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//models
use app\models\Pendidikan;
use app\models\Pekerjaan;
use app\models\JenisKelamin;
use app\models\Kelas;

//ekstensions
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */
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

<div class="pengajar-form">
    <div class="box box-success">
        <div class="box-body">

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput() ?>

        <?= $form->field($model, 'id_jk')->widget(Select2::classname(), [
                'data' =>  JenisKelamin::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
        ]); ?>

        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'value' => date('Y-m-d'),
        'options' => ['placeholder' => '- Tanggal Lahir -'],
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
        ]
      ]) ?>

        <?= $form->field($model, 'id_pend')->widget(Select2::classname(), [
                'data' =>  Pendidikan::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'id_pkj')->widget(Select2::classname(), [
                'data' =>  Pekerjaan::getList(),
                'pluginOptions' => [
                  'allowClear' => true
                ],
            ]); ?>

        <?= $form->field($model, 'alamat')->textArea(['rows'=>3]) ?>

        <?= $form->field($model, 'telepon')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_kelas')->widget(Select2::classname(), [
            'data' =>  Kelas::getList(),
            'pluginOptions' => [
              'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
        'options' => ['accept'=>'upload/*'],
        'pluginOptions'=>[
          'allowedFileExtensions'=>['jpg', 'png'], //bentuk file jpg dan png
          'showUpload' => true,
          'initialPreview' => [
          $model->foto ? Html::img($model->foto) : null, // checks the models to display the preview
          ],
          'overwriteInitial' => false,
        ],
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
