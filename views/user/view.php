<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\UserRole;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="user-view">
    <div class="box box-success">
        <div class="box-body">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        //'id',
                        'username',
                        [
                            'attribute' => 'id_user_role',
                            'value' => function ($model) {
                                if ($model->id_user_role == 1) {
                                    return "Admin";
                                } else {
                                    return "Pengajar";
                                }
                            }
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
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

     <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4>Data Pribadi</h4>
            </div>
            <div class="box-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="180px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        //'id',
                        'username',
                        // 'password',
                        // 'id_pengajar',
                        // 'id_user_role',
                        // 'status',
                        //'token',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
