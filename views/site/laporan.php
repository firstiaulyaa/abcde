<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Santri;


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
                <div class="box-header with-border" style="text-align: center;">
                  <h2 class="box-title">Data Santri</h2> 
                <div class="box-body">
                    <table class="table table-bordered table-stripped">
                        <div>&nbsp;</div>
                        <tbody>
                            <tr>
                                <td class="text-left" width="250px">Semua Data Santri (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-all-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid Pemula (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-pemula-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 1 (Satu) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-satu-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 2 (Dua) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-dua-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 3 (Tiga) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-tiga-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 4 (Empat) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-empat-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 5 (Lima) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-lima-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-left" width="250px">Santri Jilid 6 (Enam) (.pdf)</td>
                                <td class="text-left"><?= Html::a('Cetak Data', ['santri/export-enam-pdf'],['class' => 'btn btn-danger']) ?>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border" style="text-align: center;">
                    <h2 class="box-title">Rekap Data Syahriyah</h2> 
                <div class="box-body">
                    <table class="table table-bordered table-stripped">
                    <div>&nbsp;</div>
                    <tbody>
                        <tr>
                            <td class="text-left" width="250px">Data Syahriyah Tahun <?= date('Y') ?> (.pdf)</td>
                            <td class="text-left"><?= Html::a('Cetak Data', ['syahriyah/export-tahun-pdf'],['class' => 'btn btn-success']) ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border" style="text-align: center;">
                    <h2 class="box-title">Rekap Data Santri Per Kelas</h2> 
                <div class="box-body">
                    <table class="table table-bordered table-stripped">
                    <div>&nbsp;</div>
                    <tbody>
                        <tr>
                            <td class="text-left" width="250px">Data Santri Kelas A <?= date('Y') ?> (.pdf)</td>
                            <td class="text-left"><?= Html::a('Cetak Data', ['kelas/export-a-pdf'],['class' => 'btn btn-primary']) ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="250px">Data Santri Kelas B <?= date('Y') ?> (.pdf)</td>
                            <td class="text-left"><?= Html::a('Cetak Data', ['kelas/export-b-pdf'],['class' => 'btn btn-primary']) ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="250px">Data Santri Kelas C <?= date('Y') ?> (.pdf)</td>
                            <td class="text-left"><?= Html::a('Cetak Data', ['kelas/export-c-pdf'],['class' => 'btn btn-primary']) ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="text-left" width="250px">Data Santri Kelas D <?= date('Y') ?> (.pdf)</td>
                            <td class="text-left"><?= Html::a('Cetak Data', ['kelas/export-d-pdf'],['class' => 'btn btn-primary']) ?>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
