<?php
    use yii\helpers\Html;
    use app\components\Helper;
?>

<style type="text/css">
table {
 *border-collapse: collapse; /* IE7 and lower */
 border-spacing: 0;
 width: 100%;   
}
.zebra td, .zebra th {
 padding: 10px;
 border-bottom: 1px solid #f2f2f2;   
}

.zebra tbody tr:nth-child(even) {
 background: #f5f5f5;
 -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;
 -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset; 
 box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;       
}

.zebra th {
 text-align: left;
 text-shadow: 0 1px 0 rgba(255,255,255,.5);
 border-bottom: 1px solid #ccc;
 background-color: #eee;
 background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
 background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
 background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
 background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
 background-image:      -o-linear-gradient(top, #f5f5f5, #eee);
 background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
 -moz-border-radius: 6px 0 0 0;
 -webkit-border-radius: 6px 0 0 0;
 border-radius: 6px 0 0 0; 
}

.zebra th:last-child {
 -moz-border-radius: 0 6px 0 0;
 -webkit-border-radius: 0 6px 0 0;
 border-radius: 0 6px 0 0;
}

.zebra th:only-child{
 -moz-border-radius: 6px 6px 0 0;
 -webkit-border-radius: 6px 6px 0 0;
 border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
 border-bottom: 0;
 border-top: 1px solid #fff;
 background-color: #f1f1f1; 
}

.zebra tfoot td:first-child {
 -moz-border-radius: 0 0 0 6px;
 -webkit-border-radius: 0 0 0 6px;
 border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
 -moz-border-radius: 0 0 6px 0;
 -webkit-border-radius: 0 0 6px 0;
 border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
 -moz-border-radius: 0 0 6px 6px;
 -webkit-border-radius: 0 0 6px 6px
 border-radius: 0 0 6px 6px
}
    .title-form {
        text-align: center;
        font-size: 16px;
    }
    .garis-hitam {
        border-bottom:2px solid #000;
    }
    </style>

<div>
    
    <img src="images/kop.png">
    <div>&nbsp;</div>
    <p class="title-form" ><b>DAFTAR SANTRI JILID 6 (ENAM) TPQ AT-TAUHID LEUWIGEDE</b></p>
<div>&nbsp;</div>

    <table class="zebra" style="margin:auto; width:100%;">
 <thead>
  
  <tr>
   <th align="center">No.</th>
   <th align="center">Nama Santri</th>
   <th align="center">Kelas</th>
   <th align="center">Jilid</th>
   <th align="center">Alamat</th>
   <th align="center">Nama Ayah</th>
   <th align="center">Nama Ibu</th>
  </tr>
 </thead>

<?php $i=1; foreach($model as $data){ ?>

    <tr>
     <td align="center"><?= $i ?></td>
     <td><?= $data->nama_l ?></td>
     <td><?= @$data->kelas->kelas ?></td>
     <td><?= @$data->jilid->jilid ?></td>
     <td><?= $data->alamat ?></td>
     <td><?= @$data->orangtua->nama_ayah ?></td>
     <td><?= @$data->orangtua->nama_ibu ?></td>
    </tr>
   <?php $i++; } ?>
</table>

</div>