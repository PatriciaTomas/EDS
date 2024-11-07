<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $id_produto
 * @property int $quantidade
 * @property string $data_registo
 *
 * @property Produto $produto
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'quantidade', 'data_registo'], 'required'],
            [['quantidade'], 'integer'],
            [['data_registo'], 'safe'],
            [['id_produto'], 'string', 'max' => 100],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
            'data_registo' => 'Data Registo',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['codigo' => 'id_produto']);
    }
}
