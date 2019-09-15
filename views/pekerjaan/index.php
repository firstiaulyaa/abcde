<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pekerjaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pekerjaan-index">

    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
            'attribute' => 'pekerjaan',
            'headerOptions' => ['style' => 'text-align:center;'],
            'contentOptions' => ['style' => 'text-align:left;'],
            ],

                    ['class' => 'yii\grid\ActionColumn',]
                ],
            ]); ?>
        </div>
    </div>
</div>

