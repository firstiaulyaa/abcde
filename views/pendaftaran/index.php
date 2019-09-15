<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PendaftaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-index">

    <div class="box box-success">
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
                        'attribute' => 'no_registrasi',
                        'headerOptions' => ['style' => 'text-align:center; width: 10px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    [
                        'attribute' => 'nama',
                        'headerOptions' => ['style' => 'text-align:center; width: 100px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    [
                        'attribute'=>'biaya_pendftr',
                        'filter'=>NumberControl::widget([
                            'model'=>$searchModel,
                            'attribute'=>'biaya_pendftr',
                        ]),
                        'value' =>function($data) {
                            return "Rp. " . number_format($data->biaya_pendftr);
                        },
                        'headerOptions'=>['style'=>'text-align:center; width: 20px'],
                        'contentOptions'=>['style'=>'text-align:center'],
                    ],
                    [
                        'attribute'=>'biaya_jilid',
                        'filter'=>NumberControl::widget([
                            'model'=>$searchModel,
                            'attribute'=>'biaya_jilid',
                        ]),
                        'value' =>function($data) {
                            return "Rp. " . number_format($data->biaya_jilid);
                        },
                        'headerOptions'=>['style'=>'text-align:center; width: 20px'],
                        'contentOptions'=>['style'=>'text-align:center'],
                    ],
                    [
                        'attribute'=>'biaya_bukuprestasi',
                        'filter'=>NumberControl::widget([
                            'model'=>$searchModel,
                            'attribute'=>'biaya_bukuprestasi',
                        ]),
                        'value' =>function($data) {
                            return "Rp. " . number_format($data->biaya_bukuprestasi);
                        },
                        'headerOptions'=>['style'=>'text-align:center; width: 20px'],
                        'contentOptions'=>['style'=>'text-align:center'],
                    ],
                    [
                        'attribute'=>'biaya_bukurapot',
                        'filter'=>NumberControl::widget([
                            'model'=>$searchModel,
                            'attribute'=>'biaya_bukurapot',
                        ]),
                        'value' =>function($data) {
                            return "Rp. " . number_format($data->biaya_bukurapot);
                        },
                        'headerOptions'=>['style'=>'text-align:center; width: 20px'],
                        'contentOptions'=>['style'=>'text-align:center'],
                    ],
                    [
                        'attribute'=>'total',
                        'filter'=>NumberControl::widget([
                            'model'=>$searchModel,
                            'attribute'=>'total',
                        ]),
                        'value' =>function($data) {
                            return "Rp. " . number_format($total=$data->biaya_bukuprestasi+$data->biaya_pendftr+$data->biaya_bukurapot+$data->biaya_jilid);
                        },
                        'headerOptions'=>['style'=>'text-align:center; width: 20px'],
                        'contentOptions'=>['style'=>'text-align:center'],
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>