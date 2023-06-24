<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $fio
 * @property string $phone_number
 * @property string $email
 * @property string $company
 *
 * @property Meeting[] $meetings
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'phone_number', 'email', 'company'], 'required'],
            [['fio', 'email', 'company'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'phone_number' => 'Телефон',
            'email' => 'Email',
            'company' => 'Компания',
        ];
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::class, ['id_contact' => 'id']);
    }
}
