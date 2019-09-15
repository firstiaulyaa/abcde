<?php

use yii\helpers\Html;
use yii\grid\GridView;

//model
use app\models\Status;
use app\models\UserRole;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="box box-success">

        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    [  
                    'attribute' => 'id_user_role',
                    'value' => function($data)
                    {
                        return $data->getUserRole();
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{resetpassword}, {view}',
                    'buttons' => [
                        'resetpassword' => function($url, $model, $key) {
                            return Html::a('<i class="fa fa-refresh"></i>', ['reset-password', 'id' => $model->id], ['data' => ['confirm' => 'Apa anda yakin ingin me-reset password akun ini?'],]);
                        },
                    ]
                ],
                ],
            ]); ?>
        </div>
    </div>
</div>
