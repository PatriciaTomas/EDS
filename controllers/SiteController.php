<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use yii\web\ForbiddenHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
    { // Verificar se o usuário é um produtor (você pode ajustar a condição de acordo com a sua lógica de verificação)
        if (Yii::$app->user->isGuest) {
            // O usuário é um convidado, redirecione para a página de login ou realize outra ação adequada
            return $this->redirect(['site/login']);
        }
        if (Yii::$app->user->identity->tipo === 'produtor') {
            return $this->redirect(['site/index-produtor']);
        }
        if (Yii::$app->user->identity->tipo === 'vendedor') {
            return $this->redirect(['site/index-vendedor']);
        }
        if (Yii::$app->user->identity->tipo === 'administrador') {
            return $this->redirect(['site/index-admin']);
        }
    
        throw new ForbiddenHttpException('Acesso não permitido');
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
            // Obtenha o tipo de usuário selecionado no formulário de login
            $userType = Yii::$app->request->post('user_type');

            // Redirecione para a página correta com base no tipo de usuário
            switch ($userType) {
                case 'produtor':
                    return $this->redirect(['site/index-produtor']);
                case 'vendedor':
                    return $this->redirect(['site/index-vendedor']);
                case 'administrador':
                    return $this->redirect(['site/index-admin']);
                default:
                    return $this->redirect(['site/index']);
            }
        }

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

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model

            // do something meaningful here about $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionIndexProdutor()
{
    // Lógica específica para o índice do produtor
    return $this->render('index-produtor');
}

public function actionIndexVendedor()
{
    // Lógica específica para o índice do vendedor
    return $this->render('index-vendedor');
}

public function actionIndexAdmin()
{
    // Lógica específica para o índice do administrador
    return $this->render('index-admin');
}
}
