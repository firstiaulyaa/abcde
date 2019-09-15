<?php

namespace app\controllers;

use Yii;
use app\models\Syahriyah;
use app\models\SyahriyahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//ekstension
use Mpdf\Mpdf;
use kartik\mpdf\Pdf;

/**
 * SyahriyahController implements the CRUD actions for Syahriyah model.
 */
class SyahriyahController extends Controller
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
     * Lists all Syahriyah models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new SyahriyahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Syahriyah model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->request->get('export-pdf')) {
            return $this->exportPdf(Yii::$app->request->queryParams);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Syahriyah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Syahriyah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->tahun = date("Y");

            // save data ke databases.
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Syahriyah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Syahriyah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBelumbayar()
    {
        return $this->render('belumbayar');
    }

    /**
     * Finds the Syahriyah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Syahriyah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Syahriyah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //
    public function actionCetakSyahPdf() 
    {
      $this->layout='main1';
      $model = Syahriyah::find()->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('cetaksyahpdf',['model'=>$model]));
      $mpdf->Output('_Bukti Pembayaran.pdf', 'D');
      exit;
  }

  //
    public function actionExportTahunPdf() 
    {
      $this->layout='main1';
      $model = Syahriyah::find()->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('syahriyahtahunpdf',['model'=>$model]));
      $mpdf->Output('Data Syahriyah Tahun ' . date('Y') . '.pdf', 'D');
      exit;
  }

    public function actionPdf($id)
    {

        $model = \app\models\Syahriyah::findOne($id);
        $content = $this->renderPartial('/syahriyah/template', [
                     'model' => $model,
                     'id' => $id,

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

        $pdf->filename = "Bukti Pembayaran Syahriyah.pdf";

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}
