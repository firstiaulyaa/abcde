<?php

use yii\helpers\Html;
use yii\helpers\Url;

use miloschuman\highcharts\Highcharts;
use yii\widgets\LinkPager;

use app\models\Santri;
use app\models\Pengajar;
use app\models\KatJilid;
use app\models\KatSyah;
use app\models\Syahriyah;
use app\models\KatJk;
use app\models\Status;
use app\models\User;

/* @var $this yii\web\View */

$this->title = 'Tabel Statistik';
?>

<!-- Dashboard Admin -->
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>

  <div class="site-index">
    <!-- Grafik -->
    <div class="row">

      <!-- Grafik Santri berdasarkan Jilid -->
      <div class="col-md-12">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Data Santri Yang Belum Membayar Syahriyah Bulan Ini</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
        <div class="box-body">
        <table class="table table-bordered table-stripped">
        <thead class="">
          <tr>
          <th width="55px" class="text-center">No</th>
          <th class="text-center">Nama Santri</th>
          <th class="text-center">Bulan Yang Belum Dibayar</th>
          </tr>
          </thead>
          <tbody>
          <?php $i = 1?>
          <?php foreach (Syahriyah::find()->orderBy(['id_bulan' =>  SORT_DESC])->limit(7)->all() as $syahriyah): ?>
          <tr>
            <td class="text-center"><?= $i++ ?></td>
            <td class="text-center"><?= $syahriyah->id_santri ?></td>
            <td><?= $syahriyah->id_bulan ?></td>
          </tr>
          <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="col-sm-6">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Pemasukan Syahriyah</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
            <?= \miloschuman\highcharts\Highcharts::widget([
                'options' => [
                'credits' => true,
                'title' => ['text' => 'Jumlah Data Syahriyah Masuk'],
                'exporting' => ['enabled' => true],
                'xAxis' => [
                  'categories' => \app\components\Helper::getListBulanGrafik(),
                ],
                'series' => [
                  [
                    'type' => 'column',
                    'colorByPoint' => true,
                    'name' => 'Syahriyah',
                    'data' => \app\models\Syahriyah::getCountGrafik(),
                    'showInLegend' => false
                  ],
                ],
              ]
            ]) ?>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">col-sm-6</h3>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<!-- Akhir Dashboard Admin -->

<!-- =================================================== -->

<!-- Dashboard Pengajar -->
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>

<div class="site-index">
  <!-- Jumlah Data -->
  <div class="row">

  <!-- Jumlah Santri -->
  <div class="col-lg-4">
    <div class="small-box bg-blue">

      <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Santri::getCount()); ?></h3>
            <p>Jumlah Santri</p>
          </div>

          <div class="icon">
            <i class="fa fa-user"></i>
          </div>

          <a href="<?=Url::to(['santri/index']);?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        
        </div>
      </div>

      <!-- Jumlah Pengajar -->
      <div class="col-lg-4">
        <div class="small-box bg-green">

          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Pengajar::getCount()); ?></h3>
            <p>Jumlah Pengajar</p>
          </div>

          <div class="icon">
            <i class="fa fa-user"></i>
          </div>

          <a href="<?=Url::to(['santri/index']);?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        
        </div>
      </div>

    <!-- Jumlah pemasukan Syahriyah -->
    <div class="col-lg-4">
        <div class="small-box bg-red">

          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Syahriyah::getNominalCount()); ?></h3>
            <p>Jumlah Pemasukan Syahriyah</p>
          </div>

          <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>

            <a href="<?=Url::to(['syahriyah/index']);?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
    </div>
<?php endif ?>
<!-- Akhir Dashboard Admin -->