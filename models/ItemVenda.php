<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_venda".
 *
 * @property int $id
 * @property int|null $id_venda
 * @property string|null $id_produto
 * @property int $quantidade
 *
 * @property Produto $produto
 * @property Venda $venda
 */
class ItemVenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_venda', 'quantidade'], 'integer'],
            [['quantidade'], 'required'],
            [['id_produto'], 'string', 'max' => 10],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'codigo']],
            [['id_venda'], 'exist', 'skipOnError' => true, 'targetClass' => Venda::className(), 'targetAttribute' => ['id_venda' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_venda' => 'Id Venda',
            'id_produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
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

    /**
     * Gets query for [[Venda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenda()
    {
        return $this->hasOne(Venda::className(), ['id' => 'id_venda']);
    }
}
