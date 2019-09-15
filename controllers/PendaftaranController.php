<?php

namespace app\controllers;

use Yii;
use app\models\Pendaftaran;
use app\models\PendaftaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\mpdf\Pdf;

/**
 * PendaftaranController implements the CRUD actions for Pendaftaran model.
 */
class PendaftaranController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pendaftaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PendaftaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendaftaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pendaftaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pendaftaran();

        //fitur validasi data di form jika data sudah ada di database (ganda) 
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        $total  = $model->biaya_pendftr + $model->biaya_jilid + $model->biaya_bukurapot + $model->biaya_bukuprestasi;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //notifikasi sukses
            Yii::$app->session->setFlash('success', 'Data Pendaftaran Berhasil Ditambahkan');

            return $this->redirect(['view', 'id' => $model->no_registrasi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pendaftaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //notifikasi sukses
            Yii::$app->session->setFlash('success', 'Data Pendaftaran Berhasil Diubah');

            return $this->redirect(['view', 'id' => $model->no_registrasi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pendaftaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //notifikasi sukses
        Yii::$app->session->setFlash('success', 'Data Santri Berhasil Dihapus');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pendaftaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pendaftaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pendaftaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPdf($no_registrasi)
    {

        $model = \app\models\Pendaftaran::findOne($no_registrasi);
        $content = $this->renderPartial('/pendaftaran/template', [
                     'model' => $model,
                     'no_registrasi' => $no_registrasi,

                     ]);

        // $searchModel = new SuratKetDesaSearch();
        // $searchModel = $searchModel->getQuerySearch($params)->all();
        // $content = $this->renderPartial('/template/suket2', ['model' => $searchModel]);



        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginLeft' => 10,
            'marginRight' => 10,
            // A4 paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
           
             // set mPDF properties on the fly
            'options' => ['title' => 'Linen - Supervisi Outsourcing'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=> [null],
                'SetFooter'=> [null],
            ]
        ]);

        $date = date('Y-m-d His');

        $pdf->filename = "Bukti Pembayaran Pendaftaran Santri.pdf";

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
