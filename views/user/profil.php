<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="user-view">
<div class="col-sm-3">
        <div class="box box-success">
            <div class="box-header with-border">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php if (User::isAdmin()): ?>
                        <?= User::getFotoAdmin(['class' => 'profile-user-img img-responsive img-circle']); ?>
                    <?php endif ?>
                    <?php if (User::isPengajar()): ?>
                        <?= User::getFotoPengajar(['class' => 'profile-user-img img-responsive img-circle']); ?>
                    <?php endif ?>
                </a>

                <h3 class="profile-username text-center">
                    <?php if (User::isAdmin()): ?>
                        <?= Yii::$app->user->identity->username ?>
                    <?php endif ?>
                    <?php if (User::isPengajar()): ?>
                        <?= Yii::$app->user->identity->username ?>
                    <?php endif ?>
                </h3>
                <p class="text-muted text-center">
                    <?php if (User::isAdmin()): ?>
                        Admin
                    <?php endif ?>
                    <?php if (User::isPengajar()): ?>
                        Pengajar
                    <?php endif ?>
                </p>

                  <?= Html::a('Ubah Username', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-block']) ?>
                  <?= Html::a('Ubah Password', ['change-password', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
    </div>
</div>
