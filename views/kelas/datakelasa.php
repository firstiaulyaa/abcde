<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Santri;
use app\models\Kelas;


/* @var $this yii\web\View */
/* @var $searchModel app\models\OrtuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cetak Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header">
            <h3 class="box-title">Daftar Santri Jilid ?></h3>
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
    </div>
</div>
