<?php

use yii\helpers\Html;
use yii\grid\GridView;

//memanggil model lain
use app\models\Santri;
use app\models\Katsyah;
use app\models\Bulan;

use kartik\number\NumberControl;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SyahriyahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Syahriyah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syahriyah-index">
    <div class="box box-success">

        <div class="box-header">
            <?= Html::a('Tambah Data Syahriyah', ['create'], ['class' => 'btn btn-success']) ?>
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
                    //'id',
                    [  
                        'attribute' => 'id_santri',
                        'headerOptions' => ['style' => 'text-align:center; width:200px;'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {
                                return $data->santri->nama_l;
                            },
                        'filter'=>Santri::getList(),
                    ],
                    [
                        'attribute'=>'tanggal_bayar',
                        'headerOptions' => ['style' => 'text-align:center; width:200px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'encodeLabel'=>false,
                        'filter'=>DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'tanggal_bayar',
                            'pluginOptions'=>[
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])
                    ],
                    [  
                        'attribute' => 'id_bulan',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {
                                return $data->bulan->bulan;
                            },
                        'filter'=>Bulan::getList(),
                    ],

                    'tahun',
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
    </div>
</div>
