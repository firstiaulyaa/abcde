<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Santri;
use app\models\Pengajar;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-index">
    <div class="box box-success">

        <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center; width:150px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
            'attribute' => 'kelas',
            'headerOptions' => ['style' => 'text-align:center; width: 130px'],
            'contentOptions' => ['style' => 'text-align:center;'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{myButton}',  // the default buttons + your custom button
                'buttons' => [
                    'myButton' => function($url, $model, $key) {     // render your custom button
                        return Html::a("Lihat Data", ['view', 'id' => $model->id],['class' => 'btn btn-success']);
                    }
                ]
            ]
        ],
    ]); ?>


</div>
