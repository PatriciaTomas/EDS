<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $id
 * @property string $data_venda
 * @property float $valorTotal
 * @property int|null $id_vendedor
 * @property int|null $cliente_id
 * @property string|null $tipo
 *
 * @property ItemVenda[] $itemVendas
 * @property Usuario $vendedor
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_venda', 'valorTotal'], 'required'],
            [['data_venda'], 'safe'],
            [['valorTotal'], 'number'],
            [['id_vendedor', 'cliente_id'], 'integer'],
            [['tipo'], 'string', 'max' => 20],
            [['id_vendedor'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_vendedor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_venda' => 'Data Venda',
            'valorTotal' => 'Valor Total',
            'id_vendedor' => 'Id Vendedor',
            'cliente_id' => 'Cliente ID',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[ItemVendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemVendas()
    {
        return $this->hasMany(ItemVenda::className(), ['id_venda' => 'id']);
    }

    /**
     * Gets query for [[Vendedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendedor()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_vendedor']);
    }
}
