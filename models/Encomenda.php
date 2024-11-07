<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encomenda".
 *
 * @property int $id_encomenda
 * @property int|null $id_cliente
 * @property string|null $data_entrega
 * @property string $estado
 * @property array $produtos
 *
 * @property Cliente $cliente
 * @property EncomendaProduto[] $encomendaProdutos
 */
class Encomenda extends \yii\db\ActiveRecord
{
    public $produtos; // definir a propriedade "produtos"
    public $quantidade;
    public $index;
    public $codigo_produto; // Adicione essa propriedade ao modelo



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'integer'],
            [['data_entrega'], 'safe'],
            [['estado'], 'required'],
            [['estado'], 'string', 'max' => 20],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_encomenda' => 'Id Encomenda',
            'id_cliente' => 'Id Cliente',
            'data_entrega' => 'Data Entrega',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * Gets query for [[EncomendaProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendaProdutos()
    {
        return $this->hasMany(EncomendaProduto::className(), ['id_encomenda' => 'id_encomenda']);
    }
}
