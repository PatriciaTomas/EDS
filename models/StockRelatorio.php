<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class StockRelatorio extends Model
{
    public function search()
    {
        // Substitua este exemplo com a sua consulta correta para recuperar os dados dos produtos
        $query = Produto::find()->where(['status' => 'ativo']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // outras configurações do ActiveDataProvider, se necessário
        ]);

        return $dataProvider;
    }
}
