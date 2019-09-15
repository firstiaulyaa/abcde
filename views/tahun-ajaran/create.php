<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TahunAjaran */

$this->title = 'Tambah Tahun Ajaran';
$this->params['breadcrumbs'][] = ['label' => 'Tahun Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tahun-ajaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
