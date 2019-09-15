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
<h4 align="center"><b>Bukti Pembayaran Pendaftaran Santri Baru</h4>
<h4 align="center"><b>TPQ At-Tauhid Leuwigede</h4>
<div>&nbsp;</div>
<div>&nbsp;</div>
<table style="margin:auto; width:100%;">
 <thead>
   <?php { ?>
  <tr>
   <td width="20%"><b>Nama Santri</td>
   <td width="2%">:</td>
   <td><?= @$model->nama ?></td>
  </tr>
  <tr>
   <td width="20%"><b>Nomor Registrasi</td>
   <td width="2%">:</td>
   <td><?= @$model->no_registrasi ?></td>
  </tr>
   <tr>
   <td width="20%"><b>Tanggal Daftar</td>
   <td width="2%">:</td>
   <td><?= @$model->tanggal_daftar ?></td>
  </tr>
 </thead>
   <?php } ?>
</table>
<div>&nbsp;</div>
<div>&nbsp;</div>
<p align="center"><b>DETAIL PEMBAYARAN</b></p>
<p style="border-bottom:2px solid #000;">
<table style="margin:auto; width:100%;">
 <thead>
   <?php { ?>
  <tr>
   <td width="20%"><b>Biaya Pendaftaran</td>
   <td width="2%">:</td>
   <td>Rp. <?= number_format($model->biaya_pendftr) ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td width="20%"><b>Biaya Buku Yanbu'a</td>
   <td width="2%">:</td>
   <td>Rp. <?= number_format($model->biaya_jilid) ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td width="20%"><b>Biaya Buku Prestasi</td>
   <td width="2%">:</td>
   <td>Rp. <?= number_format($model->biaya_bukuprestasi) ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td width="20%"><b>Biaya Buku Rapot</td>
   <td width="2%">:</td>
   <td>Rp. <?= number_format($model->biaya_bukurapot) ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-bottom:2px solid #000;"></td>
    <td style="border-bottom:2px solid #000;"></td>
    <td style="border-bottom:2px solid #000;"></td>
  </tr>
 <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td width="20%"><b>Total</td>
   <td width="2%">:</td>
   <td><b>Rp. <?= number_format(@$model->biaya_pendftr+$model->biaya_bukuprestasi+$model->biaya_bukurapot+$model->biaya_jilid) ?></td>
  </tr>
 </thead>
   <?php } ?>
</table>
<br><br>
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