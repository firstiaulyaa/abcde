<?php

use yii\helpers\Html;
use app\models\Santri;

/* @var $this yii\web\View */
/* @var $model app\models\KatSyah */

$this->title = 'Ubah Data Syahriyah: ';
$this->params['breadcrumbs'][] = ['label' => 'Santri', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="syahriyah-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>
