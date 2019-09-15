<?php

use yii\helpers\Html;
use yii\grid\GridView;

//models
use app\models\Kelas;
use app\models\JenisKelamin;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-index">
    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Data Pengajar', ['create'], ['class' => 'btn btn-success']) ?>
                
        </div>

        <div class="box-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'No.',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],
                    [
                        'attribute' => 'nip',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],
                    [
                        'attribute' => 'nama',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    [  
                        'attribute' => 'id_jk',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->jenisKelamin->jk;
                            },
                        'filter'=>Jeniskelamin::getList(),
                    ],
                    //'tempat_lahir',
                    //'tanggal_lahir',
                    //'id_pend',
                    //'id_pkj',
                    //'alamat',
                    //'telepon',
                    //'email:email',
                    //'foto',
                    [  
                        'attribute' => 'id_kelas',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->kelas->kelas;
                            },
                        'filter'=>Kelas::getList(),
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
