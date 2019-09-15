<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiTes */

$this->title = 'Ubah Data: ' . $model->santri->nama_l;
$this->params['breadcrumbs'][] = ['label' => 'Pengantar Tes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->santri->nama_l, 'url' => ['view', 'id' => $model->santri->nama_l]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengantar-tes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
