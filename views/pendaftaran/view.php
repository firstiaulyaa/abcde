<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftaran */

$this->title = 'Nomor Registrasi : ' . $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendaftaran-view">
 	<div class="box box-success">
        <div class="box-header">
            <?= Html::a('Ubah', ['update', 'id' => $model->no_registrasi], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Hapus', ['delete', 'id' => $model->no_registrasi], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Apakah Anda yakin ingin menghapusnya?',
                    'method' => 'post',
                ],
            ]) ?>
    	</div>

    	<div class="box-body">
	    	<div class="col-sm-6">
			    <?= DetailView::widget([
			        'model' => $model,
			        'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
			        'attributes' => [
			            'no_registrasi',
			            'tanggal_daftar',
			            'nama',
			            [
			                'attribute'=>'biaya_pendftr',
			                'value' =>function($data) {
			                    return "Rp. " . number_format($data->biaya_pendftr);
			                },
			            ],
			            [
			                'attribute'=>'biaya_jilid',
			                'value' =>function($data) {
			                    return "Rp. " . number_format($data->biaya_jilid);
			                },
			            ],
			            [
			                'attribute'=>'biaya_bukuprestasi',
			                'value' =>function($data) {
			                    return "Rp. " . number_format($data->biaya_bukuprestasi);
			                },
			            ],
			            [
			                'attribute'=>'biaya_bukurapot',
			                'value' =>function($data) {
			                    return "Rp. " . number_format($data->biaya_bukurapot);
			                },
			            ],
			            [
			                'attribute'=>'total',
			                'value' =>function($data) {
			                    return "Rp. " . number_format($data->total = $data->biaya_pendftr + $data->biaya_jilid + $data->biaya_bukuprestasi + $data->biaya_bukurapot );
			                },
			            ],
			        ],
			    ]) ?>
			</div>
		</div>
 		
 		<div class="box-footer">
            <?= Html::a('<i class="fa fa-print"></i> Cetak Bukti Pembayaran', ['pdf', 'no_registrasi' => $model->no_registrasi], ['class' => 'btn btn-primary btn-flat']) ?>
    		<p class="text-center btn btn-default"><a href="<?=Yii::getAlias('@web').'/form/form.pdf';?>">Download Form Santri</a></p>
 		</div>
 	</div>
 </div>