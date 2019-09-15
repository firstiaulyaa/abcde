<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//ekstensions
use yii\helpers\Url;

//models
use app\models\Pendidikan;
use app\models\Pekerjaan;

/* @var $this yii\web\View */
/* @var $model app\models\Ortu */

$this->title = $model->nama_ayah . ' – ' . $model->nama_ibu;
$this->params['breadcrumbs'][] = ['label' => 'Orang Tua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Jika User Adalah Admin -->
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
    <!-- Data Orang tua -->
    <div class="orang-tua-view">
        <div class="box box-success">
            <div class="box-header">
                <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Apakah Anda yakin ingin menghapusnya?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <div class="box-body">
                <!-- Data Ayah -->
                <div class="col-sm-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                        'attributes' => [
                            //'id',
                            'nama_ayah',
                            'tempat_lahir_ayah',
                            'tanggal_lahir_ayah',
                            [  
                                'attribute' => 'id_pend_ayah',
                                'label' => 'Pendidikan Ayah',
                                'value' => function($data)
                                {
                                    return $data->pendAyah->pendidikan;
                                }
                            ],
                            [  
                                'attribute' => 'id_pkj_ayah',
                                'label' => 'Pekerjaan Ayah',
                                'value' => function($data)
                                {
                                    return $data->pkjAyah->pekerjaan;
                                }
                            ],
                            'telp_ayah'
                        ],
                    ]) ?>
                </div>
                
                <!-- Data Ibu -->
                <div class="col-sm-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                        'attributes' => [
                            'nama_ibu',
                            'tempat_lahir_ibu',
                            'tanggal_lahir_ibu',
                            [  
                                'attribute' => 'id_pend_ibu',
                                'label' => 'Pendidikan Ibu',
                                'value' => function($data)
                                {
                                    return $data->pendIbu->pendidikan;
                                }
                            ],
                            [  
                                'attribute' => 'id_pkj_ibu',
                                'label' => 'Pekerjaan Ibu',
                                'value' => function($data)
                                {
                                    return $data->pkjIbu->pekerjaan;
                                }
                            ],
                            'telp_ibu',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div>&nbsp;</div>

    <!-- Data Anak -->
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title">Data Anak</h3>
        </div>

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllSantri() as $santri): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $santri->nama_l; ?></td>
                        <td>
                            <?= Html::a("Lihat Data",["santri/view","id"=>$santri->id],['class' => 'btn btn-success']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif ?>


<!-- Jika User Adalah Pengajar -->
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
    <div class="orang-tua-view">
        <!-- Data Orang tua -->
        <div class="box box-success">
            <div class="box-body">
                <!-- Data Ayah -->
                <div class="col-sm-6">
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                        'attributes' => [
                            //'id',
                            'nama_ayah',
                            'tempat_lahir_ayah',
                            'tanggal_lahir_ayah',
                            [  
                                'attribute' => 'id_pend_ayah',
                                'label' => 'Pendidikan Ayah',
                                'value' => function($data)
                                {
                                    return $data->pendAyah->pendidikan;
                                }
                            ],
                            [  
                                'attribute' => 'id_pkj_ayah',
                                'label' => 'Pekerjaan Ayah',
                                'value' => function($data)
                                {
                                    return $data->pkjAyah->pekerjaan;
                                }
                            ],
                            'telp_ayah'
                        ],
                    ]) ?>
                </div>

                <div class="col-sm-6">
                    <!-- Data Ibu -->
                    <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                        'attributes' => [
                            'nama_ibu',
                            'tempat_lahir_ibu',
                            'tanggal_lahir_ibu',
                            [  
                                'attribute' => 'id_pend_ibu',
                                'label' => 'Pendidikan Ibu',
                                'value' => function($data)
                                {
                                    return $data->pendIbu->pendidikan;
                                }
                            ],
                            [  
                                'attribute' => 'id_pkj_ibu',
                                'label' => 'Pekerjaan Ibu',
                                'value' => function($data)
                                {
                                    return $data->pkjIbu->pekerjaan;
                                }
                            ],
                            'telp_ibu',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div>&nbsp;</div>

        <!-- Data Anak -->
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">Data Anak</h3>
            </div>

            <div class="box-body">
                <div>&nbsp;</div>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php $no=1; foreach ($model->findAllSantri() as $santri): ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $santri->nama_l; ?></td>
                            <td>
                                <?= Html::a("Lihat Data",["santri/view","id"=>$santri->id],['class' => 'btn btn-success']) ?>&nbsp;
                            </td>
                        </tr>
                        <?php $no++; endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>