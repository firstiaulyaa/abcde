<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ForgotForm;
use app\models\NewPasswordForm;
use app\models\User;
use app\models\Pengajar;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use Mpdf\Mpdf;
use yii\web\UploadedFile;
use app\models\Santri;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->redirect(['site/dashboard']);
        }
        else
        {
            return $this->redirect(['site/login']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    //action dashboard
    public function actionDashboard()
    {

        if (User::isAdmin() || User::isPengajar()) {
            $provider = new ActiveDataProvider([
                'query' => \app\models\Santri::find(),
                'pagination' => [
                    'pageSize' => 6
                ],
                // 'sort' => [
                //     'defaultOrder' => [
                //         'created_at' => SORT_DESC,
                //         'title' => SORT_ASC, 
                //     ]
                // ],
            ]);
            return $this->render('dashboard', ['provider' => $provider]);
        }
        else
        {
            return $this->redirect('site/login');
        }
        // if (User::isAdmin())
        // {
        //     return $this->render('dashboard');
        // }
        // elseif (User::isAnggota()) {
        //     return $this->render('dashboard');
        // }
        // elseif (User::isPetugas()) {
        //     return $this->render('dashboard');
        // }
        // else
        // {
        //     return $this->redirect(['site/login']);
        // }
        // // return $this->render('dashboard');
    }

    // Forgot password
    public function actionForgot()
    {
        $this->layout = 'main-login';
        $model = new ForgotForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            if(!$model->sendEmail()){

                Yii::$app->session->setFlash('Gagal', 'Email tidak ditemukan');
                
                return $this->refresh();

            } else {

                Yii::$app->session->setFlash('Berhasil', 'Cek email anda');

                return $this->redirect('site/login');

            }
        }

        return $this->render('forgot', [
            'model' => $model,
        ]);
    }

    public function actionNewPassword($token)
    {
        $this->layout = 'main-login';
        $model = new NewPasswordForm();

        // Untuk mendapatkan token yang ada di tabel user yang dimana sudah di relasikan di anggota model
        $user = User::findOne(['token' => $token]);

        if ($user === null) {
            throw new NotFoundHttpException("Halaman tidak ditemukan", 404);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $user->password = Yii::$app->getSecurity()->generatePasswordHash( $model->new_password );
            $user->token = Yii::$app->getSecurity()->generateRandomString ( $length = 50 );

            $user->save();

            return $this->redirect(['site/login']);

        }

        return $this->render('newpassword', [
            'model' => $model,
        ]);
    }

    public function actionLaporan()
    {
        return $this->render('laporan');
    }


    public function actionFormPendaftaranPdf() 
    {
        $this->layout='main1';
        $model = Santri::find()->all();
        $mpdf=new mPDF();
        $mpdf->WriteHTML($this->renderPartial('formpendaftaran',['model'=>$model]));
        $mpdf->Output('Form Pendaftaran.pdf', 'D');
        exit;
    }

}