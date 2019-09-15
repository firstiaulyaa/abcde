<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Syahriyah */

$this->title = 'Tambah Data Syahriyah';
$this->params['breadcrumbs'][] = ['label' => 'Syahriyah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syahriyah-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>
