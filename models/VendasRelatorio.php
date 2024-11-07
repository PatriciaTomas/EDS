<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


class VendasRelatorio extends Model
{
    public $dataInicio;
    public $dataFim;

    public function rules()
    {
        return [
            [['dataInicio', 'dataFim'], 'required'],
            [['dataInicio', 'dataFim'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function search()
    { 
        $query = Venda::find(); // Substitua "Vendas" pelo nome da sua classe de modelo

        // Configurar os critérios de pesquisa, filtros, classificação, etc.
        // ...
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    
        return $dataProvider;
        // Lógica para buscar as vendas no período especificado
        // Retorne os dados necessários para a exibição no relatório
        // Exemplo de retorno:
        return [
            ['id' => 1, 'data' => '2023-05-01', 'valorTotal' => 100.50],
            ['id' => 2, 'data' => '2023-05-02', 'valorTotal' => 75.20],
            ['id' => 3, 'data' => '2023-05-03', 'valorTotal' => 120.75],
        ];
    }
}
