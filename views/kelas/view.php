<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = 'Data Santri Kelas ' . $model->kelas;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
<div class="kelas-view">

    <div class="box box-success">
        <div class="box-header">
            <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="box-body">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'template' => '<tr><th width="150px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                    'attributes' => [
                        //'id',
                        'kelas',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <div>&nbsp;</div>
    <!-- Data Anak -->
    <div class="box box-success box-solid">
        <div class="box-header">
            <h3 class="box-title">Data Santri Kelas A</h3>
        </div>

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Santri</th>
                        <th>Jilid</th>
                        <th>Jenis Kelamin</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllSantri() as $santri): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $santri->nama_l; ?></td>
                        <td><?= $santri->jilid->jilid; ?></td>
                        <td><?= $santri->jenisKelamin->jk; ?></td>
                        <td>
                            <?= Html::a('Lihat Data',['pengantar-tes/view', 'id' => $model->id],['class' => 'btn btn-primary']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
<div class="kelas-view">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-success">

        <div class="box-body">
            <div>&nbsp;</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jilid</th>
                        <th>Jenis Kelamin</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php $no=1; foreach ($model->findAllSantri() as $santri): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $santri->nama_l; ?></td>
                        <td><?= $santri->jilid->jilid; ?></td>
                        <td><?= $santri->jenisKelamin->jk; ?></td>
                        <td>
                            <?= Html::a("Lihat Data",["santri/view","id"=>$santri->id],['class' => 'btn btn-success']) ?>&nbsp;
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>