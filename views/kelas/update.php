<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = 'Ubah Kelas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="kelas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
