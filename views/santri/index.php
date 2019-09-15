<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

//model
use app\models\Orangtua;
use app\models\Jilid;
use app\models\Katsyah;
use app\models\JenisKelamin;
use app\models\Santri;
use app\models\Kelas;
use app\models\PengantarTes;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SantriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Santri';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="santri-index">
    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Data Santri', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'attribute' => 'nis',
                        'headerOptions' => ['style' => 'text-align:center; width: 130px'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                    ],
                    [
                        'attribute' => 'nama_l',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:left;'],
                    ],
                    [  
                        'attribute' => 'id_jk',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return @$data->jenisKelamin->jk;
                            },
                        'filter'=>JenisKelamin::getList(),
                    ],
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
                    [  
                        'attribute' => 'id_jilid',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->jilid->jilid;
                            },
                        'filter'=>Jilid::getList(),
                    ],
                    // [  
                    //     'attribute' => 'id_ortu',
                    //     'headerOptions' => ['style' => 'text-align:center; width: 130px'],
                    //     'contentOptions' => ['style' => 'text-align:center;'],
                    //     'value' => function($data)
                    //         {
                    //             return @$data->orangtua->nama_ayah;
                    //         },
                    //     'filter'=>Orangtua::getList(),
                    // ],
                    [  
                        'attribute' => 'id_katsyah',
                        'headerOptions' => ['style' => 'text-align:center;'],
                        'contentOptions' => ['style' => 'text-align:center;'],
                        'value' => function($data)
                            {
                                return $data->katsyah->kategori;
                            },
                        'filter'=>Katsyah::getList(),
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php endif ?>
<!-- Akhir Dashboard Admin -->

<!-- =================================================== -->

<!-- Dashboard Pengajar -->
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>

<div class="santri-index">
    <!-- Data Anak -->
    <div class="box box-success box-solid">
        <div class="box-header">
            <h3 class="box-title">Rekap Data Pengantar Tes</h3>
        </div>

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Jilid</th>
                        <th>Tahun Ajaran</th>
                        <th>Tanggal Tes</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllPengantarTes() as $data): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data->jilid->jilid; ?></td>
                        <td><?= $data->tahunAjaran->thn_ajaran; ?></td>
                        <td><?= $data->tanggal_tes; ?></td>
                        <td>
                            <?= Html::a('Lihat Data',['pengantar-tes/view', 'id' => $model->id],['class' => 'btn btn-primary']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php endif ?>
