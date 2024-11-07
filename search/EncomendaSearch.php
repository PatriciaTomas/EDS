<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Encomenda;

/**
 * EncomendaSearch represents the model behind the search form of `app\models\Encomenda`.
 */
class EncomendaSearch extends Encomenda
{

    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_encomenda', 'id_cliente'], 'integer'],
            [['data_entrega', 'estado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Encomenda::find()->where(['estado' => 'por entregar']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_encomenda' => $this->id_encomenda,
            'id_cliente' => $this->id_cliente,
            'data_entrega' => $this->data_entrega,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
