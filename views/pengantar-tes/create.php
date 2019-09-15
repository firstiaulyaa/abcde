<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NilaiTes */

$this->title = 'Tambah Data';
$this->params['breadcrumbs'][] = ['label' => 'Pengantar Tes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengantar-tes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
