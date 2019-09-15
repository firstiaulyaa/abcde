<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KatJilidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jilid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jilid-index">
    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Jilid', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Cetak Data Berdasarkan Jilid', ['cetak'], ['class' => 'btn btn-danger']) ?>
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
                    [
                    'attribute' => 'jilid',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:left;'],
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
