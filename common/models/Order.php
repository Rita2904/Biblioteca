<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $descricao
 * @property string $data
 * @property int $quantidade
 * @property int $idbook
 * @property int $iduser
 * @property int $nome
 * @property int $email
 * @property string $prazo
 * @property Book $idbook0
 * @property User $iduser0
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'data', 'idbook'], 'required'],
            [['data'], 'safe'],
            [['quantidade', 'idbook', 'iduser'], 'integer'],
            [['descricao', 'nome', 'email', 'prazo'], 'string', 'max' => 256],
            [['idbook'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['idbook' => 'id']],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descrição',
            'data' => 'Data',
            'quantidade' => 'Duração (dias)',
            'idbook' => 'Idbook',
            'iduser' => 'Iduser',
        ];
    }

    /**
     * Gets query for [[Idbook0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdbook0()
    {
        return $this->hasOne(Book::className(), ['id' => 'idbook']);
    }

    /**
     * Gets query for [[Iduser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }
}
