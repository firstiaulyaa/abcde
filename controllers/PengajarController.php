<?php

namespace app\controllers;

use Yii;
use app\models\Pengajar;
use app\models\Kelas;
use app\models\PengajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//untuk memanggil ekstension
use yii\web\Response;
use yii\filters\AccessControl; //access control bagi user
use yii\web\UploadedFile; //upload file

//untuk memanggil model lain
use app\models\User;

/**
 * PengajarController implements the CRUD actions for Pengajar model.
 */
class PengajarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // Access Control URL.
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    //hanya user admin yg boleh mengakses
                    [
                        'actions' => ['index', 'create', 'delete'],
                        'allow' => User::isAdmin(),
                        'roles' => ['@'],
                    ],

                    //yang boleh diakses oleh user pengajar dan admin
                    [
                        'actions' => ['view', 'update', 'datasantri'],
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
     * Lists all Pengajar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajar model.
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
     * Creates a new Pengajar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengajar();

        // fitur validasi data di form jika data sudah ada di database (ganda) 
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        //validasi data di form
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            //$model->nip = date('Ymd') . '010';
            //untuk membuat pemanggilan nama file dengan menggunakan nama user 
            //pada saat foto disimpan di database
            $imageName = $model->nama;
            
            //memanggil ekstension upload file
            $foto = UploadedFile::getInstance($model, 'foto');

            //membuat nama foto
            $model->foto = $imageName . $foto->name;
        
            //menyimpan data di database
            $model->save(false);

            //lokasi menyimpan file di folder pc
            $foto->saveAs(Yii::$app->basePath . '/web/upload/pengajar/' . $model->foto);


            //membuat akun untuk pengajar
            $user = new User();
            
            $user->username = $model->nip;
            $user->password = 'tpqattauhid123';
            $user->id_pengajar = $model->id; ///id dari data pengajar
            $user->id_user_role = 2; //level user 2 untuk pengajar
            //$user->status = 2; //status 2 untuk aktif           
            $user->token = Yii::$app->getSecurity()->generateRandomString ( $length = 50 ); //token
            
            $user->save();

            // Menuju ke view berdasarkan id
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengajar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Mengambi data lama di databases
        $foto_lama = $model->foto;

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $imageName = $model->nama;
            
            // Mengambil data baru di layout _from
            $foto = UploadedFile::getInstance($model, 'foto');

            // Jika ada data file yang dirubah maka data lama akan di hapus dan di ganti dengan data baru yang sudah diambil jika tidak ada data yang dirubah maka file akan langsung save data-data yang lama.
            if ($foto !== null) {
                unlink(Yii::$app->basePath . '/web/upload/pengajar/' . $foto_lama);
                $model->foto = $imageName . '_' . $foto->name;
                $foto->saveAs(Yii::$app->basePath . '/web/upload/pengajar/' . $model->foto);
            } else {
                $model->foto = $foto_lama;
            }
           
            // Simapan data ke databases
            $model->save(false);

            // Menuju ke view id yang data dibuat.
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengajar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $user = User::find()
                    ->where(['id_pengajar' => $id])
                    ->one();

        unlink(Yii::$app->basePath .  '/web/upload/pengajar/' . $model->foto);

        $user->delete();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengajar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengajar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDatasantri()
    {
                return $this->render('datasantri', [
            $model = Kelas::findAllSantri()
        ]);
    }
}
