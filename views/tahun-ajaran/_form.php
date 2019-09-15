<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaran */
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

<div class="tahun-ajaran-form">
    <div class="box box-success">
    	<div class="box-body">
			<?= $form->field($model, 'thn_ajaran')->textInput(['maxlength' => true]) ?>

			<div class="box-footer">
        		<div class="col-sm-offset-2 col-sm-3">
          			<?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
        		</div>
      		</div>
      	</div>
	</div>
</div>

<?php ActiveForm::end(); ?>
