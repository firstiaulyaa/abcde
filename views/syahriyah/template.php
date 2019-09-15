<?php
use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Syahriyah;
use app\models\Santri;
use app\models\Katsyah;
use app\models\Bulan;
?>

<!-- KOP SURAT -->
 <img src="images/kop.png">
<br><br>
<h4 align="center"><b>Bukti Pembayaran Syahriyah</h4>
<h4 align="center"><b>TPQ At-Tauhid Leuwigede</h4>
<div>&nbsp;</div>
<div>&nbsp;</div>
<table style="margin:auto; width:100%;">
 <thead>
   <?php { ?>
  <tr>
   <td width="30%"><b>Nama Santri</td>
   <td width="3%">:</td>
   <td><?= @$model->santri->nama_l ?></td>
  </tr>
  <tr>
   <td><b>Bulan</td>
   <td>:</td>
   <td><?= $model->bulan->bulan ?></td>
  </tr>
  <tr>
   <td><b>Nominal</td>
   <td>:</td>
   <td>Rp. <?= number_format($model->nominal) ?></td>
  </tr>
  <tr>
   <td><b>Tanggal Bayar</td>
   <td>:</td>
   <td><?= $model->tanggal_bayar ?></td>
  </tr>
 </thead>
   <?php } ?>
</table>

<div>&nbsp;</div>
<div>&nbsp;</div>

<table align="right">
  <tr>
    <td  width="70%">Leuwigede, <?= date('d M Y') ?></td>
  </tr>
  <tr>
    <td  width="70%">Bendahara TPQ At-Tauhid</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>ttd.</td>
  </tr>
    <tr>
    <td  width="70%">Muzdalifah</td>
  </tr>
</table>
<div>&nbsp;</div>