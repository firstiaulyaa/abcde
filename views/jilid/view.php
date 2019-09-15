<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Santri;
use app\models\Pengajar;

/* @var $this yii\web\View */
/* @var $model app\models\KatJilid */

$this->title = 'Jilid ' . $model->jilid;
$this->params['breadcrumbs'][] = ['label' => 'Jilid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="jilid-view">
    <div>&nbsp;</div>
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
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        //'id',
                        'jilid',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="box-footer">
            <?= Html::a('Lihat Data Jilid', ['index'], ['class' => 'btn bg-olive']) ?>
        </div>
    </div>
    
    <div>&nbsp;</div>
    <!-- Data Anak -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Daftar Santri Jilid <?= $model->jilid; ?></h3>
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
