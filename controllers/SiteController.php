<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\VKeterlambatan;
use app\models\VPenyebabtelat;

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
        return $this->render('index');
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionJeniskelaska(){

        $model = new VKeterlambatan();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
            $rows = (new \yii\db\Query())
            ->select(['nama', 'id_kelas','jml','no_ka'])
            ->from('v_keterlambatan')
            // ->filterWhere(['nama' => $model->nama,'id_kelas' => $model->id_kelas])
            ->filterWhere(['like','nama',$model->nama.'%',false])
            ->andFilterWhere(['id_kelas' => $model->id_kelas])
            ->andFilterCompare('jml', '>0')
            ->groupBy(['nama','id_kelas','jml','no_ka'])
            ->all();

            // do something meaningful here about $model ...

            return $this->render('jeniskelaska', ['model' => $model,'data' => $rows]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('jeniskelasentry', ['model' => $model]);
        }
        

    }

    public function actionPenyebabtelatka(){

        $sql = "SELECT no_ka, nama, id_kelas, m_penyebab, akibat_nama, COUNT(akibat_nama) AS jml FROM v_penyebabtelat
                WHERE (tgl_ka ='2017-03-01') AND (nama like 'Argo wilis%')
                GROUP BY no_ka, nama, id_kelas, m_penyebab, akibat_nama
                ORDER BY akibat_nama";
        $hasil = VPenyebabtelat::findBySql($sql)
                ->asArray()
                ->all();

        return $this->render('adsa', ['dat' => $hasil]);

        // $model = new VKeterlambatan();

        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     // valid data received in $model

        //     // do something meaningful here about $model ...

        //     return $this->render('adsa', ['model' => $model]);
        // } else {
        //     // either the page is initially displayed or there is some validation error
        //     return $this->render('jeniskelasentry', ['model' => $model]);
        // }

    }
}
