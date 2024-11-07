<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\VendasRelatorio;
use app\models\StockRelatorio;
use yii\data\ActiveDataProvider;
use app\models\Produto;

class GestaoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRelatorioVendas()
    {
        $model = new VendasRelatorio();

        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $dataProvider = $model->search();

            return $this->render('relatorio-vendas', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->render('relatorio-vendas', [
            'model' => $model,
            'dataProvider' => null, // Certifique-se de atribuir null ou um provedor de dados válido aqui, se necessário
        ]);
    }


    public function actionRelatorioStock()
{
    // Crie o modelo de produto
    $model = new Produto();

    // Verifique se o formulário foi enviado
    if ($model->load(Yii::$app->request->post())) {
        // Aplicar os critérios de pesquisa
        // ...

        // Crie o provedor de dados com base nos critérios de pesquisa
        $dataProvider = new ActiveDataProvider([
            'query' => $model->find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        // Renderize a visualização do relatório de estoque com o provedor de dados
        return $this->render('relatorio-stock', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    // Renderize a visualização do formulário de pesquisa de estoque
    return $this->render('relatorio-stock', [
        'model' => $model,
        'dataProvider' => new ActiveDataProvider(), // Defina um provedor de dados vazio
    ]);
}




}
?>
