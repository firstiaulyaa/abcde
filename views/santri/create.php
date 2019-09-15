<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Santri */

$this->title = 'Tambah Data Santri';
$this->params['breadcrumbs'][] = ['label' => 'Santri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="santri-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>
