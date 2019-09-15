<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//models
use app\models\Pengajar;
use app\models\Status;
use app\models\UserRole;

//ekstension
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\User */
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

<!-- From admin -->
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="user-form">
    <div class="box box-success">
        <div class="box-body">

            <?php

                if ($model->isNewRecord) {
            ?>

            <?= $form->field($model, 'username')->textInput(['minlength' => 6, 'maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['minlength' => 6, 'maxlength' => true]) ?>


            <?php /*<?= $form->field($model, 'id_user_role')->textInput() ?>*/ ?>
            <?= $form->field($model, 'id_user_role')->widget(Select2::classname(), [
                'data' =>  UserRole::getList(),
                'options' => [
                  'placeholder' => '- Pilih Level User -',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

            <?= $form->field($model, 'status')->widget(Select2::classname(), [
                    'data' =>  Status::getList(),
                    'options' => [
                        'placeholder' => '- Pilih Status User -',
                    ],
                    'pluginOptions' => [
                      'allowClear' => true
                    ],
                ]); ?>

            <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-3">
                  <button type="button" class="btn btn-default" onclick="history.back()">Kembali</button>
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php
                } else {
            ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?php /*<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>*/ ?>

            <?php /*<?= $form->field($model, 'id_anggota')->textInput() ?>*/ ?>

            <?php /*<?= $form->field($model, 'id_petugas')->textInput() ?>*/ ?>

            <?php /*<?= $form->field($model, 'id_user_role')->textInput() ?>*/ ?>

            <?php /*<?= $form->field($model, 'status')->textInput() ?>*/ ?>

            <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-3">
                  <button type="button" class="btn btn-default" onclick="history.back()">Kembali</button>
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

    <?php   
        }
    ?>

</div>
<?php endif ?>

<?php ActiveForm::end(); ?>