<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ortu */

$this->title = 'Ubah Data: ' . $model->nama_ayah . ' – ' . $model->nama_ibu;
$this->params['breadcrumbs'][] = ['label' => 'Data Orang Tua', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_ayah . ' – ' . $model->nama_ibu, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="orangtua-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
