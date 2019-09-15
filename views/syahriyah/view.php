<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\date\DatePicker;
use app\models\Santri;
use app\models\Bulan;

/* @var $this yii\web\View */
/* @var $model app\models\Syahriyah */

$this->title = $model->santri->nama_l;
$this->params['breadcrumbs'][] = ['label' => 'Syahriyah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="syahriyah-view">
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

            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="180px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    //'id',
                    [  
                    'attribute' => 'id_santri',
                    'value' => function($data)
                    {
                        // Cara 1 Pemanggil id_*** menjadi nama.
                        //return $data->getPenulis();

                        // Cara 2 Pemanggil id_*** menjadi nama.
                        return $data->santri->nama_l;
                    }
                    ],
                    [  
                    'attribute' => 'id_bulan',
                    'value' => function($data)
                    {
                        // Cara 1 Pemanggil id_*** menjadi nama.
                        //return $data->getPenulis();

                        // Cara 2 Pemanggil id_*** menjadi nama.
                        return $data->bulan->bulan;
                    }
                    ],
                    'tahun',
                    'tanggal_bayar',
                    // [  
                    // 'attribute' => 'id_kat_syahriyah',
                    // 'value' => function($data)
                    // {
                    //     // Cara 1 Pemanggil id_*** menjadi nama.
                    //     //return $data->getPenulis();

                    //     // Cara 2 Pemanggil id_*** menjadi nama.
                    //     return $data->katsyah->kategori;
                    // }
                    // ],
                    [
                        'attribute'=>'nominal',
                        'value' =>function($data) {
                            return "Rp. " . number_format($data->nominal);
                        },
                    ],
                ],
            ]) ?>
        </div>

        <div class="box-footer">
            
            <?= Html::a('<i class="fa fa-print"></i> Cetak Bukti Pembayaran', ['pdf', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        </div>
    </div>
</div>
