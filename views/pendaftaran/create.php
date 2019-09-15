<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftaran */

$this->title = 'Form Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
