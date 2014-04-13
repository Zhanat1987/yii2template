<?php
namespace backend\controllers;

use Yii;
use yii\base\ErrorException;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\myhelpers\Debugger;
use common\models\PasswordResetRequestForm;
use common\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
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
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
//        throw new \yii\web\HttpException(404, 'Такой страницы не существует!!!');
//        throw new \yii\web\ForbiddenHttpException('Не хватает прав!!!', 403);
//        throw new \yii\web\HttpException(500, 'Не хватает прав!!!');
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = false;
//        Debugger::stop(Yii::$app->request->post());
        $model = new LoginForm();
        if (isset($_POST['login-button'])) {
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
        }

        $modelPRRF = new PasswordResetRequestForm();
        if (isset($_POST['prrf-button'])) {
            if ($modelPRRF->load(Yii::$app->request->post()) && $modelPRRF->validate()) {
                if ($modelPRRF->sendEmail()) {
                    Yii::$app->getSession()->setFlash('successPRRF',
                        'Проверьте Ваш email для дальнейших инструкций.');
                } else {
                    Yii::$app->getSession()->setFlash('errorPRRF',
                        "Извините, мы не смогли сбросить пароль для указанного email'а.");
                }
            }
        }

        $modelSF = new SignupForm();
        if (isset($_POST['signup-button'])) {
            if ($modelSF->load(Yii::$app->request->post())) {
                $user = $modelSF->signup();
                if ($user) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
            }
        }

        return $this->render('login', [
            'model' => $model,
            'modelPRRF' => $modelPRRF,
            'modelSF' => $modelSF,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
