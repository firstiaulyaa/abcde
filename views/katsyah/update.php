<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Katsyah */

$this->title = 'Ubah Kategori Syahriyah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Syahriyah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="katsyah-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
