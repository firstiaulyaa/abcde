<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//ekstensions
use kartik\date\DatePicker;

//model
use app\models\Orangtua;
use app\models\TahunAjaran;
use app\models\Jilid;
use app\models\JenisKelamin;
use app\models\Pendidikan;
use app\models\Katsyah;
use app\models\Syahriyah;
use app\models\PengantarTes;
/* @var $this yii\web\View */
/* @var $model app\models\Santri */

$this->title = $model->nama_l;
$this->params['breadcrumbs'][] = ['label' => 'Santri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="santri-view">
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
                <?= Html::a('Lihat Data Orang Tua', ['orangtua/view', 'id' => $model->orangtua->id], ['class' => 'btn btn-warning']) ?>
        </div>

        <div class="box-body">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        'nis',
                        'nama_l',
                        'nama_p',
                        [  
                            'attribute' => 'id_jk',
                            'label' => 'Jenis Kelamin',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return @$data->jenisKelamin->jk;
                            }
                        ],
                         [
                            'attribute' => 'tanggal_lahir',
                            'format' => ['date', 'php:d-M-Y'],
                            'value' => $model->tanggal_lahir,
                            'encodeLabel' => false
                        ],
                        'alamat',
                        'anak_ke',
                        [  
                            'attribute' => 'id_pend',
                            'label' => 'Pendidikan',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->pendidikan->pendidikan;
                            }
                        ],
                        [
                            'attribute' => 'id_ortu',
                            'format' => 'raw',
                            'value' => function ($data) 
                            {
                                return $data->orangtua->nama_ayah;
                                //return Html::a($data->ortu->nama_ayah, ['ortu/view', 'id' => $data->ortu->id]);
                            },
                        ],
                        [
                            'attribute' => 'id_ortu',
                            'label' => 'Nama Ibu',
                            'format' => 'raw',
                            'value' => function ($data) 
                            {
                                return $data->orangtua->nama_ibu;
                                //return Html::a($data->ortu->nama_ayah, ['ortu/view', 'id' => $data->ortu->id]);
                            },
                        ],
                    ],
                ]) ?>
        </div>

        <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        [  
                            'attribute' => 'id_kelas',
                            'label' => 'Kelas',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->kelas->kelas;
                            }
                        ],
                        [  
                            'attribute' => 'id_jilid',
                            'label' => 'Jilid',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->jilid->jilid;
                            }
                        ],
                         [
                            'attribute' => 'tanggal_masuk',
                            'format' => ['date', 'php:d-M-Y'],
                            'value' => $model->tanggal_masuk,
                            'encodeLabel' => false
                        ],
                        //'tanggal_lulus',
                        [  
                            'attribute' => 'id_katsyah',
                            'label' => 'Kategori Syahriyah',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return @$data->katsyah->kategori;
                            }
                        ],
                        [
                            'attribute' => 'foto',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->foto != '') {
                                    return Html::img('@web/upload/santri/' . $model->foto, ['class' => 'img-responsive', 'style' => 'height:200px']);
                                } else { 
                                    return Html::img('@web/images/no-images.png', ['class' => 'img-responsive', 'style' => 'height:500px']);
                                }
                            },
                        ],
                    ],
                ]) ?>
        </div>
    </div>
</div>

<div>&nbsp;</div>
    <!-- Data Anak -->
    <div class="box box-success box-solid">
        <div class="box-header">
            <h3 class="box-title">Rekap Data Pengantar Tes Santri</h3>
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

    <div class="box box-danger box-solid">
        <div class="box-header">
            <h3 class="box-title">Rekap Data Syahriyah Santri</h3>
        </div>

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Nominal</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllSyahriyah() as $data): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data->bulan->bulan; ?></td>
                        <td><?= $data->tanggal_bayar; ?></td>
                        <td><?= $data->nominal; ?></td>
                        <td>
                            <?= Html::a('Lihat Data',['syahriyah/view', 'id' => $model->id],['class' => 'btn btn-primary']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
<div class="santri-view">
    <div class="box box-success">
        <div class="box-header">
                <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Lihat Data Orang Tua', ['orangtua/view', 'id' => $model->orangtua->id], ['class' => 'btn btn-warning']) ?>
        </div>

        <div class="box-body">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        'nis',
                        'nama_l',
                        'nama_p',
                        [  
                            'attribute' => 'id_jk',
                            'label' => 'Jenis Kelamin',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return @$data->jenisKelamin->jk;
                            }
                        ],
                         [
                            'attribute' => 'tanggal_lahir',
                            'format' => ['date', 'php:d-M-Y'],
                            'value' => $model->tanggal_lahir,
                            'encodeLabel' => false
                        ],
                        'alamat',
                        'anak_ke',
                        [  
                            'attribute' => 'id_pend',
                            'label' => 'Pendidikan',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->pendidikan->pendidikan;
                            }
                        ],
                        [
                            'attribute' => 'id_ortu',
                            'format' => 'raw',
                            'value' => function ($data) 
                            {
                                return $data->orangtua->nama_ayah;
                                //return Html::a($data->ortu->nama_ayah, ['ortu/view', 'id' => $data->ortu->id]);
                            },
                        ],
                        [
                            'attribute' => 'id_ortu',
                            'label' => 'Nama Ibu',
                            'format' => 'raw',
                            'value' => function ($data) 
                            {
                                return $data->orangtua->nama_ibu;
                                //return Html::a($data->ortu->nama_ayah, ['ortu/view', 'id' => $data->ortu->id]);
                            },
                        ],
                    ],
                ]) ?>
        </div>

        <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        [  
                            'attribute' => 'id_kelas',
                            'label' => 'Kelas',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->kelas->kelas;
                            }
                        ],
                        [  
                            'attribute' => 'id_jilid',
                            'label' => 'Jilid',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return $data->jilid->jilid;
                            }
                        ],
                         [
                            'attribute' => 'tanggal_masuk',
                            'format' => ['date', 'php:d-M-Y'],
                            'value' => $model->tanggal_masuk,
                            'encodeLabel' => false
                        ],
                        //'tanggal_lulus',
                        [  
                            'attribute' => 'id_katsyah',
                            'label' => 'Kategori Syahriyah',
                            'value' => function($data)
                            {
                                // Cara pemanggilan 1 yang ada di model buku.
                                        //return $data->getPenulis();

                                // Cara pemanggilan 2 yang ada di model buku.
                                return @$data->katsyah->kategori;
                            }
                        ],
                        [
                            'attribute' => 'foto',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->foto != '') {
                                    return Html::img('@web/upload/santri/' . $model->foto, ['class' => 'img-responsive', 'style' => 'height:200px']);
                                } else { 
                                    return Html::img('@web/images/no-images.png', ['class' => 'img-responsive', 'style' => 'height:500px']);
                                }
                            },
                        ],
                    ],
                ]) ?>
        </div>
    </div>
</div>

<div>&nbsp;</div>
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

    <div class="box box-danger box-solid">
        <div class="box-header">
            <h3 class="box-title">Data Syahriyah</h3>
        </div>

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tanggal Bayar</th>
                        <th>Nominal</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllSyahriyah() as $data): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data->bulan->bulan; ?></td>
                        <td><?= $data->tanggal_bayar; ?></td>
                        <td><?= $data->nominal; ?></td>
                        <td>
                            <?= Html::a('Lihat Data',['syahriyah/view', 'id' => $model->id],['class' => 'btn btn-primary']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif ?>