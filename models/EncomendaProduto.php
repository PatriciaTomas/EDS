<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encomenda_produto".
 *
 * @property int $id_encomenda
 * @property string $codigo_produto
 * @property int $quantidade
 *
 * @property Produto $codigoProduto
 * @property Encomenda $encomenda
 */
class EncomendaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomenda_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_encomenda', 'codigo_produto', 'quantidade'], 'required'],
            [['id_encomenda', 'quantidade'], 'integer'],
            [['codigo_produto'], 'string', 'max' => 100],
            [['codigo_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['codigo_produto' => 'codigo']],
            [['id_encomenda'], 'exist', 'skipOnError' => true, 'targetClass' => Encomenda::className(), 'targetAttribute' => ['id_encomenda' => 'id_encomenda']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_encomenda' => 'Id Encomenda',
            'codigo_produto' => 'Codigo Produto',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[CodigoProduto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoProduto()
    {
        return $this->hasOne(Produto::className(), ['codigo' => 'codigo_produto']);
    }

    /**
     * Gets query for [[Encomenda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomenda()
    {
        return $this->hasOne(Encomenda::className(), ['id_encomenda' => 'id_encomenda']);
    }
}
