<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Santri */

$this->title = 'Ubah Data Santri: ' . $model->nama_l;
$this->params['breadcrumbs'][] = ['label' => 'Data Santri', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_l, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>

<div class="santri-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>
