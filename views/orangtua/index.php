<?php

use yii\helpers\Html;
use yii\grid\GridView;

//memanggil model lain
use app\models\Pendidikan;
use app\models\Pekerjaan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrtuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Orang Tua';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-index">
    <div class="box box-success">
        <div class="box-header">
            <?= Html::a('Tambah Data Orang Tua', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'attribute' => 'nama_ayah',
                        'headerOptions' => ['style' => 'text-align:center; width: 210px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    //'tempat_lahir_ayah',
                    //'tanggal_lahir_ayah',
                    //'pendidikan_ayah',
                    [  
                        'attribute' => 'id_pkj_ayah',
                        'headerOptions' => ['style' => 'text-align:center; width: 210px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {
                                return $data->pkjAyah->pekerjaan;
                            },
                        'filter'=>Pekerjaan::getList(),
                    ],
                    //'telp_ayah',
                    [
                        'attribute' => 'nama_ibu',
                        'headerOptions' => ['style' => 'text-align:center; width: 210px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    //'tempat_lahir_ibu',
                    //'tanggal_lahir_ibu',
                    //'pendidikan_ibu',
                    [  
                        'attribute' => 'id_pkj_ibu',
                        'headerOptions' => ['style' => 'text-align:center; width: 210px'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                        'value' => function($data)
                            {

                                return $data->pkjIbu->pekerjaan;
                            },
                        'filter'=>Pekerjaan::getList(),
                    ],
                    //'telp_ibu',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
