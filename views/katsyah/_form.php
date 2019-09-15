<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KatSyah */
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

<div class="kat-syah-form">

    <div class="box box-success">
        <div class="box-body">

        <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nominal')->textInput() ?>

        <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-3">
                <?= Html::submitButton('Simpan',['class' => 'btn btn-success btn-flat']) ?>
            </div>
        </div>
    </div>

</div>
<?php ActiveForm::end(); ?>
