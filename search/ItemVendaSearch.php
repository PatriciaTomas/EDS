<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemVenda;

/**
 * ItemVendaSearch represents the model behind the search form of `app\models\ItemVenda`.
 */
class ItemVendaSearch extends ItemVenda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_venda', 'quantidade'], 'integer'],
            [['id_produto'], 'safe'],
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
        $query = ItemVenda::find();

        // add conditions that should always apply here

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
            'id' => $this->id,
            'id_venda' => $this->id_venda,
            'quantidade' => $this->quantidade,
        ]);

        $query->andFilterWhere(['like', 'id_produto', $this->id_produto]);

        return $dataProvider;
    }
}
