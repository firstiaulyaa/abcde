<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//ekstensions
use kartik\date\DatePicker;

//model
use app\models\Pekerjaan;
use app\models\JenisKelamin;
use app\models\Pendidikan;
use app\models\Kelas;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="pengajar-view">
    <div class="box box-success">
        <div class="box-header">
                <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="box-body">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        'nip',
                        'nama',
                        [  
                                'attribute' => 'id_jk',
                                'value' => function($data)
                                {
                                return $data->jenisKelamin->jk;
                                }
                            ],
                        'tempat_lahir',
                        'tanggal_lahir',
                        'telepon',
                        'email:email',
                        'alamat',
                    ],
                ]) ?>
            </div>

            <div class="col-sm-6">
                <?= DetailView::widget([
                        'model' => $model,
                        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                        'attributes' => [
                            [  
                                'attribute' => 'id_pend',
                                'value' => function($data)
                                {
                                    return @$data->pendidikan->pendidikan;
                                }
                            ],
                            [  
                                'attribute' => 'id_pkj',
                                'value' => function($data)
                                {
                                    return @$data->pekerjaan->pekerjaan;
                                }
                            ],
                            [  
                                'attribute' => 'id_kelas',
                                'value' => function($data)
                                {
                                    return $data->kelas->kelas;
                                }
                            ],
                            // [  
                            //     'attribute' => 'status',
                            //     'value' => function($data)
                            //     {
                            //         return $data->status->status;
                            //     }
                            // ],
                            [
                                'attribute' => 'foto',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->foto != '') {
                                        return Html::img('@web/upload/pengajar/' . $model->foto, ['class' => 'img-responsive', 'style' => 'height:200px']);
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
</div>
