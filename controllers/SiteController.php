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
use miloschuman\highcharts\Highcharts;

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
            ->filterWhere(['like','nama',$model->nama.'%',false])
            ->andFilterWhere(['id_kelas' => $model->id_kelas])
            ->andFilterCompare('jml', '>0')
            ->groupBy(['nama','id_kelas','jml','no_ka'])
            ->all();

            if(!empty($rows)){
                foreach($rows as $value){
                    $a[] = array('type' => 'column', 'name' => $value['nama'].'('.$value['no_ka'].')', 'data' => array((int)$value['jml']));
                }
                if(isset($a)){
                                
                    $charttelat = Highcharts::widget([
                        'options' => [
                            'chart'=>[
                                'type'=>'column',
                                'height' => '70%',
                            ],
                        'title' => ['text' => ''],
                        'xAxis' => [
                            'categories' => ['Kereta']
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Keterlambatan (Menit)'],
                            'type' =>'logarithmic'
                        ],
                        'series' => $a,
                        ]
                    ]);    
                
                }else{
                    $charttelat = 
                    "<div class=\"alert alert-warning alert-with-icon\" data-notify=\"container\">
                    <i data-notify=\"icon\" class=\"material-icons\">add_alert</i>
                    <span data-notify=\"message\">Kata Kunci yang Anda cari tidak tersedia.</span>    
                    </div>";
                }
            }

            // do something meaningful here about $model ...

            return $this->render('jeniskelaska', ['model' => $model,'charttelat' => $charttelat]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('jeniskelasentry', ['model' => $model]);
        }
        

    }

    public function actionPenyebabtelatka(){

        $model = new VPenyebabtelat();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model

            $query = VPenyebabtelat::find();
            $hasil = $query
                     ->filterWhere(['tgl_ka' => $model->tgl_ka])
                     ->andFilterWhere(['like','nama',$model->nama.'%',false])
                     ->andFilterWhere(['id_kelas' => $model->id_kelas])
                     ->asArray()
                     ->all();
            if(!empty($hasil)){

                $pia = array();
                $isi = array_count_values(array_column($hasil, 'm_penyebab'));
                foreach($isi as $key => $value){
                    array_push($pia,['name' => $key, 'y'=> (int)$value]);
                }
                $cia = array();
                $isia = array_count_values(array_column($hasil, 'akibat_nama'));
                foreach($isia as $key => $value){
                    array_push($cia,['name' => $key, 'y'=> (int)$value]);
                }
            }
            if(!empty($pia) && !empty($cia)){
                $charting1 = Highcharts::widget([
                    'options' => [
                        'title' => ['text' => ''],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [ // new opening bracket
                                'type' => 'pie',
                                'name' => 'Elements',
                                'data' => $cia
                            ] // new closing bracket
                        ],
                    ],
                ]);

                $charting2 =  Highcharts::widget([
                    'options' => [
                        'title' => ['text' => ''],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [ // new opening bracket
                                'type' => 'pie',
                                'name' => 'Elements',
                                'data' => $pia
                            ] // new closing bracket
                        ],
                    ],
                ]); 
            }else{
                $charting1 = 
                "<div class=\"alert alert-warning alert-with-icon\" data-notify=\"container\">
                <i data-notify=\"icon\" class=\"material-icons\">add_alert</i>
                <span data-notify=\"message\">Kata Kunci yang Anda cari tidak tersedia.</span>    
                </div>";
                $charting2 = 
                "<div class=\"alert alert-warning alert-with-icon\" data-notify=\"container\">
                <i data-notify=\"icon\" class=\"material-icons\">add_alert</i>
                <span data-notify=\"message\">Kata Kunci yang Anda cari tidak tersedia.</span>    
                </div>";
            }
            return $this->render('adsa', ['model' => $model,'charting2' => $charting2, 'charting1' => $charting1]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('sebabentry', ['model' => $model]);
        }


    }
}
