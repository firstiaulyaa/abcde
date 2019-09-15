<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Sistem Informasi Manajemen';

?>
<div class="site-index">
    <!-- Jumlah Data -->
  <!-- Menampilkan jumlah Anggota -->
  <div class="site-index">
    <div class="row" style="margin: 3px;">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <p>Jumlah Santri</p>

            <h3>1</h3>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="<?=Url::to(['santri/index']);?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>