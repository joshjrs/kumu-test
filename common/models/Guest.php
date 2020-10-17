<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%guest}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone_number
 * @property string $gender
 * @property string $street
 * @property string $city
 * @property string $country
 * @property int $zip
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventGuest[] $eventGuests
 */
class Guest extends \yii\db\ActiveRecord
{
    // public $fullname;
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guest}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'gender', 'street', 'city', 'country', 'zip'], 'required'],
            [['street', 'city', 'country'], 'string'],
            [['zip', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 512],
            [['phone_number', 'gender'], 'string', 'max' => 20],
            ['email', 'email'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'gender' => 'Gender',
            'street' => 'Street',
            'city' => 'City',
            'country' => 'Country',
            'zip' => 'Zip',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[EventGuests]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EventGuestQuery
     */
    public function getEventGuests()
    {
        return $this->hasMany(EventGuest::className(), ['guest_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GuestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuestQuery(get_called_class());
    }

    public function getGenderLabels()
    {
        return [
            self::GENDER_MALE => 'Male',
            self::GENDER_FEMALE => 'Female',
        ];
    }

    public function getAddress()
    {
        return $this->street . ', ' . $this->city . ', ' . $this->zip . ', ' . $this->country;
    }
}
