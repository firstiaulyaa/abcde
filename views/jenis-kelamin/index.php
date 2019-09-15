<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisKelaminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Kelamins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kelamin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jenis Kelamin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
