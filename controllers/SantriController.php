<?php

namespace app\controllers;

use Yii;
use app\models\Santri;
use app\models\SantriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//ekstension
use yii\web\UploadedFile;
use Mpdf\Mpdf;
use yii\filters\AccessControl;

//models
use app\models\User;
use app\models\Ortu;

/**
 * SantriController implements the CRUD actions for Santri model.
 */
class SantriController extends Controller
{
  /**
  * {@inheritdoc}
  */
  public function behaviors()
  {
    return [
      // Hak Akses User
        'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          //Hak Akses Hanya Untuk Admin
          [
            'actions' => ['create', 'index', 'delete', 'export-all-pdf', 'export-pemula-pdf', 'export-satu-pdf', 'export-dua-pdf', 'export-tiga-pdf', 'export-empat-pdf', 'export-lima-pdf', 'export-enam-pdf'],
            'allow' => User::isAdmin(),
            'roles' => ['@'],
          ],
          //Hak Akses Untuk Admin dan Pengajar
          [
            'actions' => ['view', 'update'],
            'allow' => User::isAdmin() || User::isPengajar(),
            'roles' => ['@'],
          ],
        ],
      ],

      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
          ],
        ],
      ];
    }

    /**
     * Lists all Santri models.
     * @return mixed
     */
    public function actionIndex()
    {
      $searchModel = new SantriSearch();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
      ]);
    }

    /**
     * Displays a single Santri model.
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
     * Creates a new Santri model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    //Aksi Tambah Data Santri
    public function actionCreate()
    {

      $model = new Santri();

      //fitur validasi data di form jika data sudah ada di database (ganda) 
      if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
      }

      if ($model->load(Yii::$app->request->post()) && $model->validate())
      {
        //menamai file foto santri
        $imageName = $model->nama_l;

        // ambil file berkas dan file sampul yg ada di _from.
        $foto = UploadedFile::getInstance($model, 'foto');

        // merubah nama filenya.
        $model->foto = $imageName .'_' . $foto->name;
        
        // save data ke databases.
        $model->save(false);

        // lokasi simpan file.
        $foto->saveAs(Yii::$app->basePath . '/web/upload/santri/' . $model->foto);

        //notifikasi sukses
        Yii::$app->session->setFlash('success', 'Data Santri Berhasil Ditambahkan');

        // Menuju ke view id yang data dibuat.
        return $this->redirect(['view', 'id' => $model->id]);
      }

      return $this->render('create', [
        'model' => $model,
      ]);
    }

    /**
     * Updates an existing Santri model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    //Aksi Ubah Data Santri
    public function actionUpdate($id)
    {
      $model = $this->findModel($id);

      //mengambil foto lama di db
      $foto_lama = $model->foto;

      if ($model->load(Yii::$app->request->post()) && $model->validate())
      {
        $imageName = $model->nama_l;
            
        // Mengambil data baru di layout _from
        $foto = UploadedFile::getInstance($model, 'foto');

        // jika foto baru tersimpan di db maka diganti menjadi foto baru
        if ($foto !== null) {
          unlink(Yii::$app->basePath . '/web/upload/santri/' . $foto_lama);

          //nama foto baru
          $model->foto = $imageName . '_' . $foto->name;

          //penyimpanan di folder
          $foto->saveAs(Yii::$app->basePath . '/web/upload/santri/' . $model->foto);
        } else {
          // jika foto baru tidak tersimpan di db maka menggunakan foto lama
          $model->foto = $foto_lama;
        }
           
        //menyimpan ke db
        $model->save(false);

        //notifikasi sukses
        Yii::$app->session->setFlash('success', 'Data Santri Berhasil Diubah');

        //menuju ke halaman view berdasarkan id
        return $this->redirect(['view', 'id' => $model->id]);
      }

      return $this->render('update', [
        'model' => $model,
      ]);
    }

    /**
     * Deletes an existing Santri model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    //Aksi Hapus Data Santri
    public function actionDelete($id)
    {
      $model = $this->findModel($id);

      //untuk menghapus foto di folder web
      unlink(Yii::$app->basePath .  '/web/upload/santri/' . $model->foto);

      $model->delete();

      //notifikasi sukses
      Yii::$app->session->setFlash('success', 'Data Santri Berhasil Dihapus');

      return $this->redirect(['index']);
    }

    /**
     * Finds the Santri model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Santri the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
      if (($model = Santri::findOne($id)) !== null) {
        return $model;
      }

      throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Aksi Export Semua Data Santri
    public function actionExportAllPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportallpdf',['model'=>$model]));
      $mpdf->Output('Data Santri TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Pemula
    public function actionExportPemulaPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 1])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportpemulapdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Pemula TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Satu
    public function actionExportSatuPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 2])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportsatupdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Satu TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Dua
    public function actionExportDuaPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 3])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportduapdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Dua TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Tiga
    public function actionExportTigaPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 4])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exporttigapdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Tiga TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Empat
    public function actionExportEmpatPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 5])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportempatpdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Empat TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Lima
    public function actionExportLimaPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 6])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportlimapdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Lima TPQ AT-TAUHID.pdf', 'D');
      exit;
    }

    //Aksi Export Data Santri Jilid Enam
    public function actionExportEnamPdf() 
    {
      $this->layout='main1';
      $model = Santri::find()->where(['id_jilid' => 7])->All();
      $mpdf=new mPDF();
      $mpdf->WriteHTML($this->renderPartial('exportenampdf',['model'=>$model]));
      $mpdf->Output('Data Santri Jilid Enam TPQ AT-TAUHID.pdf', 'D');
      exit;
    }
  
}