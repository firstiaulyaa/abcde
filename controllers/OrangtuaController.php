<?php

namespace app\controllers;

use Yii;
use app\models\Orangtua;
use app\models\OrangtuaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//ekstensions
use yii\filters\AccessControl;

//models
use app\models\User;

/**
 * OrangtuaController implements the CRUD actions for Orangtua model.
 */
class OrangtuaController extends Controller
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
            'actions' => ['create', 'index', 'delete'],
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
     * Lists all Orangtua models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrangtuaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orangtua model.
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
     * Creates a new Orangtua model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orangtua();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        //notifikasi sukses
        Yii::$app->session->setFlash('success', 'Data Orang Tua Santri Berhasil Ditambahkan');

        return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orangtua model.
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
        Yii::$app->session->setFlash('success', 'Data Orang Tua Santri Berhasil Diubah');

        return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orangtua model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //notifikasi sukses
        Yii::$app->session->setFlash('success', 'Data Orang Tua Santri Berhasil Dihapus');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orangtua model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orangtua the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orangtua::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
