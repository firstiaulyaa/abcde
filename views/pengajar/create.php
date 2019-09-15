<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$this->title = 'Tambah Data Pengajar';
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-create">
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
