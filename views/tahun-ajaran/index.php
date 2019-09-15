<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TahunAjaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tahun Ajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tahun-ajaran-index">

    <div class="box box-success">

        <div class="box-header">
                <?= Html::a('Tambah Tahun Ajaran', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    'header' => 'No.',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'text-align:center']
                ],
                'thn_ajaran',
                ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
        </div>
    </div>
</div>
