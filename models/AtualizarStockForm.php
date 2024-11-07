<?php

namespace app\models;

use yii\base\Model;

class AtualizarStockForm extends Model
{
    public $codigo;
    public $quantidade;

    public function rules()
    {
        return [
            [['codigo', 'quantidade'], 'required'],
            ['quantidade', 'integer', 'min' => 0],
        ];
    }

    public function atualizarStock()
    {
        if ($this->validate()) {
            $produto = Produto::findOne(['codigo' => $this->codigo]);

            if ($produto) {
                $produto->quantidade_disponivel = $this->quantidade;
                $produto->save();

                return true;
            }
        }

        return false;
    }
}
