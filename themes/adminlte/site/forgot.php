<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Forgot';

$email = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>AM-TPQ</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Masukkan e-mail untuk melakukan ubah password</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $email)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className()) ?>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <button type="button" class="btn btn-default btn-block btn-flat" onclick="history.back()">Kembali</button>
                </div>
                <div class="col-xs-6">
                    <?= Html::submitButton('Kirim Email', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
