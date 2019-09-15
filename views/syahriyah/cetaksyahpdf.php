<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Bulan;
use app\models\Katsyah;
use app\models\Santri;
use app\models\Syahriyah;

?>
<style type="text/css">
 table {
            *border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
        .table {
            border: 0px solid #282929;
        }
        .table2 {
            padding: 10px;
            border: 1px solid #0000;
            text-align: center;
        }
        .garis {
            border: 3px solid black;
        }
        .table-pdf td, .table-pdf th {
            padding: 10px;
            border: 1px solid #0000;
            text-align: center;
        }
        .table-pdf th {
            border: 1px solid #0000;
            background-color: #eee;
            text-align: center;
        }
        .line {
            text-decoration: underline;
        }
        .tengah {
            text-align: center;
        }
        .jarak {
            padding: 20px;
        }
        .garis-hitam {
            border-bottom:2px solid #000;
        }
</style>


<h3 class="tengah"><b>BUKTI PEMBAYARAN SYAHRIYAH TAHUN <?= date('Y') ?><br>TPQ AT-TAUHID DESA LEUWIGEDE</b></h3>
<p class="tengah">Alamat: Desa Leuwigede Blok Balai Desa RT/RW 04/02 Kec. Widasari Kab. Indramayu 45271</p>
<p class="garis-hitam"></p><br>

<table class="table">
    <thead>
  
      <tr>
       <th align="center">NO</th>
       <th align="center">TANGGAL BAYAR</th>
       <th align="center">BULAN</th>
       <th align="center">NOMINAL</th>
      </tr>
     </thead>
        <?php $i=1; foreach (Syahriyah::find()->andWhere(['id_santri' => 'id'])->orderBy(['tanggal_bayar' =>  SORT_ASC])->all() as $data){ ?>
        <tr>
         <td align="center"><?= $i ?></td>
         <td><?= $data->tanggal_bayar ?></td>
         <td><?= @$data->KatBulan->bulan ?></td>
         <td><?= $data->nominal ?></td>
        </tr>
       <?php $i++; } ?>
</table>
