<?php

use yii\helpers\Html;
use yii\helpers\Url;

use miloschuman\highcharts\Highcharts;
use yii\widgets\LinkPager;

use app\models\Santri;
use app\models\Pengajar;
use app\models\PengantarTes;
use app\models\Jilid;
use app\models\Katsyah;
use app\models\Syahriyah;
use app\models\Kelas;
use app\models\JenisKelamin;
use app\models\User;

/* @var $this yii\web\View */

$this->title = 'Dashboard | AM-TPQ';
?>

<!-- Dashboard Admin -->
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>

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

    <div class="row">
      <div class="col-sm-6">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Grafik Jumlah Santri Berdasarkan Jilid</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
            <?=Highcharts::widget([
              'options' => [
                'credits' => false,
                'title' => ['text' => 'JILID'],
                'exporting' => ['enabled' => true],
                'plotOptions' => [
                  'pie' => [
                    'cursor' => 'pointer',
                  ],
                ],
                'series' => [
                  [
                    'type' => 'pie',
                    'name' => 'Jumlah Santri',
                    'data' => Jilid::getGrafikList(),
                  ],
                ],
              ],
            ]);?>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Grafik Jumlah Santri Berdasarkan Kelas</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
            <?=Highcharts::widget([
              'options' => [
                'credits' => false,
                'title' => ['text' => 'KELAS'],
                'exporting' => ['enabled' => true],
                'plotOptions' => [
                  'pie' => [
                    'cursor' => 'pointer',
                  ],
                ],
                'series' => [
                  [
                    'type' => 'pie',
                    'name' => 'Jumlah Santri',
                    'data' => Kelas::getGrafikList(),
                  ],
                ],
              ],
            ]);?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Grafik Jumlah Santri Berdasarkan Pengantar Tes</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
            <?= \miloschuman\highcharts\Highcharts::widget([
              'options' => [
                'credits' => true,
                'title' => ['text' => 'PENGANTAR TES'],
                'exporting' => ['enabled' => true],
                'xAxis' => [
                  'categories' => \app\components\Helper::getListBulanGrafik(),
                ],
                'series' => [
                  [
                    'type' => 'column',
                    'colorByPoint' => true,
                    'name' => 'Jumlah Santri',
                    'data' => \app\models\PengantarTes::getCountGrafik(),
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
            <h3 class="box-title">Grafik Jumlah Santri Berdasarkan Syahriyah</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="box-body">
             <?= \miloschuman\highcharts\Highcharts::widget([
              'options' => [
                'credits' => true,
                'title' => ['text' => 'SYAHRIYAH'],
                'exporting' => ['enabled' => true],
                'xAxis' => [
                  'categories' => \app\components\Helper::getListBulanGrafik(),
                ],
                'series' => [
                  [
                    'type' => 'column',
                    'colorByPoint' => true,
                    'name' => 'Jumlah Santri',
                    'data' => \app\models\Syahriyah::getCountGrafik(),
                    'showInLegend' => false
                  ],
                ],
              ]
            ]) ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Santri</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="box-header with-border" style="text-align: center;">
                  <h3 class="box-title">Daftar Santri Terbaru</h3> 
                </div>
                  <table class="table table-bordered table-stripped">
                    <thead class="">
                      <tr>
                        <th width="55px" class="text-center">No</th>
                        <th class="text-center">Tanggal Masuk</th>
                        <th class="text-center">Nama Santri</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    <?php foreach (Santri::find()->orderBy(['id' =>  SORT_DESC])->limit(7)->all() as $santri): ?>
                      <tr>
                        <td class="text-left"><?= $i++ ?></td>
                        <td class="text-left"><?= $santri->tanggal_masuk ?></td>
                        <td class="text-left"><?= $santri->nama_l ?></td>
                        <td class="text-center"><?= $santri->jenisKelamin->jk ?></td>
                        <td class="text-center"><?= $santri->kelas->kelas ?></td>
                        <td align="center">
                            <?= Html::a("Lihat Data",["santri/view","id"=>$santri->id],['class' => 'btn btn-success']) ?>&nbsp;
                        </td>
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
      <div class="col-lg-6">
        <div class="small-box bg-blue">

          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Santri::getCount()); ?></h3>
            <p>Jumlah Santri</p>
          </div>

          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
        
        </div>
      </div>

      <!-- Jumlah Pengajar -->
      <div class="col-lg-6">
        <div class="small-box bg-green">

          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Kelas::getCount()); ?></h3>
            <p>Jumlah Kelas</p>
          </div>

          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<!-- Akhir Dashboard Admin -->