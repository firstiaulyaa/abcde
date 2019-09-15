<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$this->title = 'Ubah Data Pengajar: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengajar-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
