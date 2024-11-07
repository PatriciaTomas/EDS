<?php

namespace app\controllers;
use Yii;
use app\models\Encomenda;
use app\search\EncomendaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * EncomendaController implements the CRUD actions for Encomenda model.
 */
class EncomendaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Encomenda models.
     *
     * @return string
     */
    public function actionIndex()
    { 
        $searchModel = new EncomendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    

    /**
     * Displays a single Encomenda model.
     * @param int $id_encomenda Id Encomenda
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_encomenda)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_encomenda),
        ]);
    }

    /**
     * Creates a new Encomenda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Encomenda();
        $produtos = Produto::find()->all();
        $index = 0; // Defina a variável $index antes do loop foreach
    
        if (Yii::$app->user->identity->tipo !== 'vendedor') {
            throw new \yii\web\ForbiddenHttpException('Você não tem permissão para criar encomendas.');
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach ($model->produtos as $codigo) {
                $encomendaProduto = new EncomendaProduto();
                $encomendaProduto->id_encomenda = $model->id;
                $encomendaProduto->codigo_produto = $codigo;
                $encomendaProduto->quantidade = $model->quantidade[$codigo];
                $encomendaProduto->save();
            }
    
            return $this->redirect(['view', 'id' => $model->id]);
        }
    
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $produtos,
        ]);
    
        return $this->render('create', [
            'model' => $model,
            'produtos' => $produtos,
            'dataProvider' => $dataProvider,
            'index' => $index, // Passe o valor de $index para a view
        ]);
    }
    

    /**
     * Updates an existing Encomenda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_encomenda Id Encomenda
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_encomenda)
    {
        $model = $this->findModel($id_encomenda);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_encomenda' => $model->id_encomenda]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Encomenda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_encomenda Id Encomenda
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_encomenda)
    {
        $this->findModel($id_encomenda)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encomenda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_encomenda Id Encomenda
     * @return Encomenda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_encomenda)
    {
        if (($model = Encomenda::findOne(['id_encomenda' => $id_encomenda])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
