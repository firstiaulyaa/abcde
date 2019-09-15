<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KatsyahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Syahriyah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katsyah-index">

   <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Kategori', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'kategori',
                'headerOptions' => ['style' => 'text-align:center; width: 130px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'nominal',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
