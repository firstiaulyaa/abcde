<?php
    use yii\helpers\Html;
    use app\components\Helper;
?>

<style type="text/css">
    table {
            *border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
    .table-santri {
        border: 0px solid #282929;
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
    <p class="title-form" ><b>BUKTI PEMBAYARAN PENDAFTARAN SANTRI TPQ AT-TAUHID</b></p>

    <table class="table">
        <tr>
            <td width="80px">Nomor Registrasi</td>
            <td width="5px">: </td>
            <td><?= $data->no_registrasi ?></td>
        </tr>
        <tr>
            <td width="80px">Nama Panggilan</td>
            <td width="5px">: </td>
        </tr>
        <tr>
            <td width="80px">Nama Panggilan</td>
            <td width="5px">: </td>
        </tr>
    </table>

</div>