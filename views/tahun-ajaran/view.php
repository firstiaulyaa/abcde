<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaran */

$this->title = 'Tahun Ajaran : ' . $model->thn_ajaran;
$this->params['breadcrumbs'][] = ['label' => 'Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tahun-ajaran-view">

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
                        'thn_ajaran',
                    ],
                ]) ?>
            </div>
        </div>

         <div class="box-footer">
            <?= Html::a('Lihat Data Tahun Ajaran', ['index'], ['class' => 'btn bg-olive']) ?>
        </div>
    </div>
</div>
