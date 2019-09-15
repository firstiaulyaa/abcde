<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ortu */

$this->title = 'Tambah Data Orang Tua';
$this->params['breadcrumbs'][] = ['label' => 'Orang Tua', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orangtua-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
