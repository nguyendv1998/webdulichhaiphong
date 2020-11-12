<?php
namespace backend\controllers;

use common\models\DiaDanh;
use common\models\LangNghe;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index','map','google-map'],
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
                //'layout'=>'error',
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
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionMap()
    {
        $List_diadanh=DiaDanh::find()->all();
        $List_langnghe=LangNghe::find()->all();
        $list_result=["-1"=>"Vị trí của bạn"];

        if($List_diadanh!=null && count($List_diadanh)>0){
            foreach ($List_diadanh as $item){
                $list_result[$item->ToaDo]=$item->TenDiaDanh;
            }
        }
        if($List_langnghe!=null && count($List_langnghe)>0){
            foreach ($List_langnghe as $item){
                $list_result[$item->ToaDo]=$item->TenLangNghe;
            }
        }
        return $this->render('map', [
            'List_diadanh'=>$list_result
        ]);
    }
    public function actionGoogleMap()
    {
        $List_diadanh=DiaDanh::find()->all();
        $List_langnghe=LangNghe::find()->all();
        $list_result=["-1"=>"Vị trí của bạn"];

        if($List_diadanh!=null && count($List_diadanh)>0){
            foreach ($List_diadanh as $item){
                $list_result[$item->ToaDo]=$item->TenDiaDanh;
            }
        }
        if($List_langnghe!=null && count($List_langnghe)>0){
            foreach ($List_langnghe as $item){
                $list_result[$item->ToaDo]=$item->TenLangNghe;
            }
        }
        return $this->render('google-map', [
            'List_diadanh'=>$list_result
        ]);
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
