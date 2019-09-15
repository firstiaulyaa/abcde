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

$this->title = 'lala';
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="pengajar-view">
    <div class="box box-success">
        <div class="box-header">
        </div>

        <div class="box-body">
            <div class="col-sm-6">
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
