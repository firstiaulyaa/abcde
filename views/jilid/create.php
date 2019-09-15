<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KatJilid */

$this->title = 'Tambah Jilid';
$this->params['breadcrumbs'][] = ['label' => 'Jilid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jilid-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
