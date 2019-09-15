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
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-left" width="250px">Lihat Data Kelas A</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['kelas/data-kelas-a'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
