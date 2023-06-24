<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $date
 * @property int|null $id_contact
 *
 * @property Contact $contact
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'date'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['id_contact'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_contact'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::class, 'targetAttribute' => ['id_contact' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'date' => 'Дата',
            'id_contact' => 'Контакт',
        ];
    }

    /**
     * Gets query for [[Contact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'id_contact']);
    }
}
