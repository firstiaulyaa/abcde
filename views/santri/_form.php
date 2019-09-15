<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//models
use app\models\Orangtua;
use app\models\Jilid;
use app\models\Pendidikan;
use app\models\JenisKelamin;
use app\models\Katsyah;
use app\models\Kelas;
use app\models\Pendaftaran;

//ekstensions
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Santri */
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

<div class="santri-form">
  <div class="box box-success">
    <div class="box-body">
      <?= $form->field($model, 'id_no_registrasi')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nis')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nama_l')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nama_p')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'id_jk')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Jenis Kelamin -'],
        'data' =>  JenisKelamin::getList(),
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

      <?= $form->field($model, 'id_kelas')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Kelas -'],
        'data' =>  Kelas::getList(),
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

      <?= $form->field($model, 'id_jilid')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Jilid -'],
        'data' =>  Jilid::getList(),
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

      <?= $form->field($model, 'id_ortu')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Nama Ayah -'],
        'data' =>  Orangtua::getList(),
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

      <?= $form->field($model, 'alamat')->textArea(['rows'=>3]) ?>

      <?= $form->field($model, 'anak_ke')->textInput() ?>

      <?= $form->field($model, 'id_pend')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Pendidikan -'],
        'data' =>  Pendidikan::getList(),
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>

      <?= $form->field($model, 'tanggal_masuk')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'value' => date('Y-m-d'),
        'options' => ['placeholder' => '- Tanggal Masuk -'],
        'pluginOptions' => [
          'autoclose'=>true,
          'format' => 'yyyy-mm-dd'
        ]
      ]) ?>

      <?= $form->field($model, 'id_katsyah')->widget(Select2::classname(), [
        'options' => ['placeholder' => '- Kategori Syahriyah -'],
        'data' =>  Katsyah::getList(),
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
