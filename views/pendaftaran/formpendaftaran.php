<?php

$nomor = 1;
$pihak = 'Ibu / Bapak';
$tanggal_lahir = date('Y-m-d');
?>
<div class="section">
    <h5>
        Ibu / Bapak
    </h5>
    <div class="clear"></div>

    <table width="100%" autosize="1">
        <tr>
            <td class="nomor">
                <?= $nomor++; ?>.
            </td>
            <td class="caption">
                NIK
            </td>
            <td class="point">
                :
            </td>
            <?php
            
            for ($i = 0; $i < 16; $i++) { ?>
                <td class="kotak">
                    &nbsp;
                </td>
            <?php } ?>
            <td colspan="9"></td>
            <td class="kanan">

            </td>
        </tr>
        <tr>
            <td class="nomor">
                <?= $nomor++; ?>.
            </td>
            <td class="caption">
                Nama Lengkap
            </td>
            <td class="point">
                :
            </td>
            <?php
            
            for ($i = 0; $i < 25; $i++) { ?>
                <td class="kotak">
                    &nbsp;
                </td>
            <?php } ?>
            <td class="kanan">

            </td>
        </tr>
        <?php if (in_array($pihak, ['pelapor', 'saksi1', 'saksi2'])) { ?>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Umur
                </td>
                <td class="point">
                    :
                </td>
                <?php
                
                for ($i = 0; $i < 2; $i++) { ?>
                    <td class="kotak">
                        &nbsp;
                    </td>
                <?php } ?>
                <td class="colspan t-center" colspan="4">
                    Tahun
                </td>
                <td colspan="19">
                </td>
                <td class="kanan">

                </td>
            </tr>
        <?php } ?>

        <?php if ($pihak == 'pelapor') { ?>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Jenis Kelamin
                </td>
                <td class="point">
                    :
                </td>
                <td class="kotak">
                    &nbsp;
                </td>
                <td class="colspan" colspan="6">
                    1. Laki-laki
                </td>
                <td class="colspan" colspan="18">
                    2. Perempuan
                </td>
                <td class="kanan">

                </td>
            </tr>
        <?php } ?>

        <?php if (in_array($pihak, ['ayah', 'ibu'])) { ?>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Tanggal Lahir / Umur
                </td>
                <td class="point">
                    :
                </td>
                <?php

                $date = new DateTime($tanggal_lahir);
                ?>
                <td colspan="2" class="t-center">
                    Tgl
                </td>
                <?php
                $tgl = $date->format('d');
                for ($i = 0; $i < 2; $i++) { ?>
                    <td class="kotak">
                        &nbsp;
                    </td>
                <?php } ?>

                <td colspan="2" class="t-center">
                    Bln
                </td>
                <?php
                $bln = $date->format('m');
                for ($i = 0; $i < 2; $i++) { ?>
                    <td class="kotak">
                        &nbsp;
                    </td>
                <?php } ?>
                <td colspan="2" class="t-center">
                    Thn
                </td>
                <?php
                $thn = $date->format('Y');
                for ($i = 0; $i < 4; $i++) { ?>
                    <td class="kotak">
                        &nbsp;
                    </td>
                <?php } ?>

                <td class="colspan t-center" colspan="4">
                    Umur
                </td>
                <?php
                $umur = $date->diff((new DateTime()))->y;
                $umur = strval($umur);
                for ($i = 0; $i < 3; $i++) { ?>
                    <td class="kotak">
                        &nbsp;
                    </td>
                <?php } ?>

                <td colspan="4">
                </td>
                <td class="kanan">

                </td>
            </tr>
        <?php } ?>
        <tr>
            <td class="nomor">
                <?= $nomor++; ?>.
            </td>
            <td class="caption">
                Pekerjaan
            </td>
            <td class="point">
                :
            </td>

            <?php
            
            for ($i = 0; $i < 2; $i++) { ?>
                <td class="kotak">
                    &nbsp;
                </td>
            <?php } ?>
            <td colspan="23"></td>
            <td class="kanan">

            </td>
        </tr>

        <tr>
            <td class="nomor">
                <?= $nomor++; ?>.
            </td>
            <td class="caption">
                Alamat
            </td>
            <td class="point">
                :
            </td>
            <td class="border colspan" colspan="25">
                &nbsp;
            </td>
            <td class="kanan">
            </td>
        </tr>

        <tr>
            <td class="nomor">
                &nbsp;
            </td>
            <td class="caption">
                &nbsp;
            </td>
            <td class="point">
                &nbsp;
            </td>
            <td class="colspan" colspan="7">
                a. Desa/Kelurahan
            </td>
            <td class="border" colspan="7">

            </td>
            <td class="colspan" colspan="4">
                b. Kecamatan
            </td>
            <td class="border" colspan="7">

            </td>
            <td class="kanan">
            </td>
        </tr>

        <tr>
            <td class="nomor">
                &nbsp;
            </td>
            <td class="caption">
                &nbsp;
            </td>
            <td class="point">
                &nbsp;
            </td>
            <td class="colspan" colspan="7">
                c. Kab/Kota
            </td>
            <td class="border" colspan="7">

            </td>
            <td class="colspan" colspan="4">
                d. Provinsi
            </td>
            <td class="border" colspan="7">

            </td>
            <td class="kanan">
            </td>
        </tr>

        <?php if (in_array($pihak, ['ayah', 'ibu'])) { ?>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Kewarganegaraan
                </td>
                <td class="point">
                    :
                </td>
                <td class="kotak">
                    &nbsp;
                </td>
                <td class="colspan" colspan="4">
                    1. WNI
                </td>
                <td class="colspan" colspan="4">
                    2. WNA
                </td>
                <td colspan="16"></td>
                <td class="kanan">
                </td>
            </tr>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Kebangsaan
                </td>
                <td class="point">
                    :
                </td>
                <td class="colspan" colspan="9">
                    &nbsp;
                </td>
                <td colspan="16"></td>
                <td class="kanan">
                </td>
            </tr>
        <?php } ?>

        <?php if ($pihak == 'ibu') { ?>
            <tr>
                <td class="nomor">
                    <?= $nomor++; ?>.
                </td>
                <td class="caption">
                    Tgl Pencatatan Perkawinan
                </td>
                <td class="point">
                    :
                </td>

                <td class="colspan" colspan="2">
                    Tgl
                </td>
                <?php for ($i = 0; $i < 2; $i++) { ?>
                    <td class="kotak">
                    </td>
                <?php } ?>

                <td class="colspan" colspan="2">
                    Bln
                </td>
                <?php for ($i = 0; $i < 2; $i++) { ?>
                    <td class="kotak">
                    </td>
                <?php } ?>

                <td class="colspan" colspan="2">
                    Thn
                </td>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <td class="kotak">
                    </td>
                <?php } ?>

                <td colspan="11">
                </td>
                <td class="kanan">

                </td>
            </tr>
        <?php } ?>
    </table>
</div>
