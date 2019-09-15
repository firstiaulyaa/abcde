<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Santri;
use app\models\Jilid;
use app\models\TahunAjaran;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiTes */

$this->title = $model->santri->nama_l;
$this->params['breadcrumbs'][] = ['label' => 'Pengantar Tes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
<div class="pengantar-tes-view">
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
                    [
                        'attribute' => 'id_thnajaran',
                        'value' => function($data)
                        {
                            return $data->tahunAjaran->thn_ajaran;
                        }
                    ],
                    'tanggal_tes',
                    [
                        'attribute' => 'id_santri',
                        'value' => function($data)
                        {
                            return $data->santri->nama_l;
                        }
                    ],
                    [
                        'attribute' => 'id_jilid',
                        'value' => function($data)
                        {
                            return $data->jilid->jilid;
                        }
                    ],
                ],
            ]) ?>
            </div>

            <div class="col-sm-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    'kelancaran',
                    'kefasihan',
                    'tajwid',
                    'makhroj',
                    'saran:ntext',
                    'keterangan:ntext',
                ],
            ]) ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="pengantar-tes-view">
    <div class="box box-success">
        <div class="box-body">
            <div class="col-sm-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    //'id',
                    [
                        'attribute' => 'id_thnajaran',
                        'value' => function($data)
                        {
                            return $data->tahunAjaran->thn_ajaran;
                        }
                    ],
                    'tanggal_tes',
                    [
                        'attribute' => 'id_santri',
                        'value' => function($data)
                        {
                            return $data->santri->nama_l;
                        }
                    ],
                    [
                        'attribute' => 'id_jilid',
                        'value' => function($data)
                        {
                            return $data->jilid->jilid;
                        }
                    ],
                ],
            ]) ?>
            </div>

            <div class="col-sm-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    'kelancaran',
                    'kefasihan',
                    'tajwid',
                    'makhroj',
                    'saran:ntext',
                    'keterangan:ntext',
                ],
            ]) ?>
            </div>
        </div>
    </div>
</div>
<?php endif ?>