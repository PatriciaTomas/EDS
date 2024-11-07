<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
  

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $tipo
 * @property string $nome
 * @property string $contacto
 * @property string $senha
 * @property string $username
 * @property string $authKey
 *
 * @property Venda[] $vendas
 */

class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'nome', 'contacto', 'senha', 'username'], 'required'],
            [['tipo', 'nome', 'senha', 'username', ], 'string', 'max' => 50],
            [['contacto'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'nome' => 'Nome',
            'contacto' => 'Contacto',
            'senha' => 'Senha',
            'username' => 'Username',
        ];
    }

    /**
     * Gets query for [[Vendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['id_vendedor' => 'id']);
    }

    
/**
 * {@inheritdoc}
 */
public static function findIdentity($id)
{
    return static::findOne($id);
}

/**
 * {@inheritdoc}
 */
public static function findIdentityByAccessToken($token, $type = null)
{
    // Implemente a lógica para encontrar um usuário com base no token de acesso, se aplicável
    return static::findOne(['accessToken' => $token]);
}


/**
 * {@inheritdoc}
 */
public function getAuthKey()
{
    return $this->authKey;
}


   

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === $password;
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }
}
