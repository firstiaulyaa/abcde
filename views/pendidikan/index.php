<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PendidikanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pendidikan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikan-index">
    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            'pendidikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
