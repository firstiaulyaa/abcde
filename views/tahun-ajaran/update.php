<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaran */

$this->title = 'Ubah Tahun Ajaran: ' . $model->thn_ajaran;
$this->params['breadcrumbs'][] = ['label' => 'Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="tahun-ajaran-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
