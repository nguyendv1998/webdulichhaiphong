<?php
namespace frontend\controllers;

use app\models\ViewBaiVietChiTiet;
use common\models\AnhLienQuan;
use common\models\BaiViet;
use common\models\BaiVietDanhMuc;
use common\models\DanhMuc;
use common\models\Faq;
use common\models\LeHoi;
use common\models\TuKhoa;
use common\models\User;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
     * @return mixed
     */
    public function actionIndex()
    {
        //$topbaiviet=BaiViet::find()->
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    public function  actionDanhMuc($path){
//        $Danhmuccha=DanhMuc::find()->where(['code'=>$path])->one();
//        $danhmuccons=DanhMuc::find()->where(['DanhMucCha_ID'=>$Danhmuccha->id])->all();
//        $baiviets=[];
//        if($danhmuccons!=null && count($danhmuccons)>0){
//            foreach ($danhmuccons as $danhmuccon){
//                $baivietdanhmucs=BaiVietDanhMuc::findAll(['DanhMuc_id'=>$danhmuccon->id]);
//                if($baivietdanhmucs!=null && count($baivietdanhmucs)>0){
//                    foreach ($baivietdanhmucs as $baivietdanhmuc){
//                        $baiviets[]=BaiViet::findOne($baivietdanhmuc->id);
//                    }
//                }
//            }
//        }
//        echo count($baiviets);
////        return $this->render('danh-muc', [
////
////        ]);
        if($path=="le-hoi"){
            $lehois=LeHoi::find()->all();
            return $this->render('le-hoi', [
                'lehois'=>$lehois
            ]);
        }
    }
    public function actionBaiViet($path){
        $baivietchitiet=ViewBaiVietChiTiet::find()->where(['code'=>$path])->one();
        $nguoidang=User::find()->where(['id'=>$baivietchitiet->NguoiDang_id])->one();
        $anhlienquans=AnhLienQuan::find()->where(['BaiViet_ID'=>$baivietchitiet->id])->all();
        return $this->render('bai-viet', [
            'baivietchitiet'=>$baivietchitiet,
            'nguoidang'=>$nguoidang,
            'anhlienquans'=>$anhlienquans
        ]);
    }
    public function actionFaq(){
        $faqs=Faq::find()->orderBy(['Uutien'=>SORT_DESC])->all();
        $baiviets=BaiViet::find()->orderBy(['ThoiGianDang'=>SORT_DESC])->limit(3)->all();
        $tukhoas=TuKhoa::find()->all();
        $count_baiviet=count(BaiViet::find()->all());

        return $this->render('faq', [
            'faqs'=>$faqs,
            'baiviets'=>$baiviets,
            'tukhoas'=>$tukhoas,
            'count_baiviet'=>$count_baiviet
        ]);
    }
    public function actionTuKhoa($path){


        return $this->render('tu-khoa', [

        ]);
    }
}
