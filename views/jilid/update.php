<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KatJilid */

$this->title = 'Ubah Jilid: ' . $model->jilid;
$this->params['breadcrumbs'][] = ['label' => 'Jilid', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jilid, 'url' => ['view', 'id' => $model->jilid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jilid-update">
	<?= $this->render('_form', [
	    'model' => $model,
	]) ?>
</div>
