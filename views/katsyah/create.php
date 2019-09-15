<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Katsyah */

$this->title = 'Tambah Kategori Syahriyah';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Syahriyah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katsyah-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
