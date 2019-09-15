<?php
use yii\helpers\Html;
use app\models\User;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">TPQ</span><span class="logo-lg">' . /*Yii::$app->name */ 'AM - TPQ' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (User::isAdmin()): ?>
                        <?= User::getFotoAdmin(['class' => 'user-image']); ?>
                        <span class="hidden-xs">Admin</span>
                    <?php endif ?>
                    <?php if (User::isPengajar()): ?>
                        <?= User::getFotoPengajar(['class' => 'user-image']); ?>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    <?php endif ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if (User::isAdmin()): ?>
                            <?= User::getFotoAdmin(['class' => 'img-circle']); ?>
                            <p>
                                Admin
                                <small>TPQ AT-TAUHID LEUWIGEDE</small>
                            </p>
                            <?php endif ?>
                            <?php if (User::isPengajar()): ?>
                            <?= User::getFotoPengajar(['class' => 'img-circle']); ?>
                            <p>
                            <?= Yii::$app->user->identity->username ?> - Pengajar
                                <small>TPQ AT-TAUHID LEUWIGEDE</small>
                            </p>
                            <?php endif ?>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a("Profil",["user/view","id" => Yii::$app->user->identity->id],['class' => 'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Logout',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>
