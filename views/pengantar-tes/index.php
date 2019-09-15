<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Santri;
use app\models\TahunAjaran;
use app\models\Jilid;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NilaiTesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengantar Tes';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
<div class="nilai-tes-index">

    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                   ['class' => 'yii\grid\SerialColumn',
                        'header' => 'No.',
                        'headerOptions' => ['style' => 'text-align:center; width: 60px'],
                        'contentOptions' => ['style' => 'text-align:center']
                    ],

                    //'id',
                    [  
                        'attribute' => 'id_santri',
                        'headerOptions' => ['style' => 'text-align:center; width: 250px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {
                                return $data->santri->nama_l;
                            },
                        'filter'=>Santri::getList(),
                    ],
                    [  
                        'attribute' => 'id_jilid',
                        'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->jilid->jilid;
                            },
                        'filter'=>Jilid::getList(),
                    ],
                    [  
                        'attribute' => 'id_thnajaran',
                        'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return @$data->tahunAjaran->thn_ajaran;
                            },
                        'filter'=>TahunAjaran::getList(),
                    ],
                    [
                        'attribute'=>'tanggal_tes',
                        'headerOptions' => ['style' => 'text-align:center; width:200px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'encodeLabel'=>false,
                        'filter'=>DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'tanggal_tes',
                            'pluginOptions'=>[
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])
                    ],
                    //'kelancaran',
                    //'kefasihan',
                    //'tajwid',
                    //'makhroj',
                    //'saran:ntext',
                    //'ket',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="nilai-tes-index">
    <div class="box box-success">

        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                   ['class' => 'yii\grid\SerialColumn',
                        'header' => 'No.',
                        'headerOptions' => ['style' => 'text-align:center; width: 60px'],
                        'contentOptions' => ['style' => 'text-align:center']
                    ],

                    //'id',
                    [  
                        'attribute' => 'id_santri',
                        'headerOptions' => ['style' => 'text-align:center; width: 250px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {
                                return $data->santri->nama_l;
                            },
                        'filter'=>Santri::getList(),
                    ],
                    [  
                        'attribute' => 'id_jilid',
                        'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->jilid->jilid;
                            },
                        'filter'=>Jilid::getList(),
                    ],
                    [  
                        'attribute' => 'id_thnajaran',
                        'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return @$data->tahunAjaran->thn_ajaran;
                            },
                        'filter'=>TahunAjaran::getList(),
                    ],
                    [
                        'attribute'=>'tanggal_tes',
                        'headerOptions' => ['style' => 'text-align:center; width:200px;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'encodeLabel'=>false,
                        'filter'=>DatePicker::widget([
                            'model'=>$searchModel,
                            'attribute'=>'tanggal_tes',
                            'pluginOptions'=>[
                                'format' => 'yyyy-mm-dd'
                            ]
                        ])
                    ],
                    //'kelancaran',
                    //'kefasihan',
                    //'tajwid',
                    //'makhroj',
                    //'saran:ntext',
                    //'ket',

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
<?php endif ?>