<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $contacto
 * @property string $nif
 *
 * @property Encomenda[] $encomendas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nif'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['contacto'], 'string', 'max' => 20],
            [['nif'], 'string', 'max' => 9],
            [['nif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'contacto' => 'Contacto',
            'nif' => 'Nif',
        ];
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomenda::className(), ['id_cliente' => 'id']);
    }
}
