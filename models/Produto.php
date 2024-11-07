<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property string $codigo
 * @property string|null $nome
 * @property float|null $preco
 * @property int|null $quantidade_disponivel
 * @property string|null $descricao
 *
 * @property ItemVenda[] $itemVendas
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['codigo'], 'required'],
            [['preco'], 'number'],
            [['quantidade_disponivel'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['nome'], 'string', 'max' => 100],
            [['descricao'], 'string', 'max' => 255],
            [['codigo'], 'unique'],
            [['estado'], 'in', 'range' => ['disponivel', 'indisponivel']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'nome' => 'Nome',
            'preco' => 'Preco',
            'quantidade_disponivel' => 'Quantidade Disponivel',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::className(), ['id_produto' => 'codigo']);
    }

    public function getEncomendaProdutos()
    {
        return $this->hasMany(EncomendaProduto::className(), ['codigo_produto' => 'codigo']);
    }
    
}
