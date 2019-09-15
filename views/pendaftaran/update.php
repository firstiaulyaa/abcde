<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftaran */

$this->title = 'Ubah Data Pendaftaran: ' . $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_registrasi, 'url' => ['view', 'id' => $model->no_registrasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendaftaran-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
