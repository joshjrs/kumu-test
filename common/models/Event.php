<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%event}}".
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $country
 * @property int $zip
 * @property string $date
 * @property string $time
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventGuest[] $eventGuests
 */
class Event extends \yii\db\ActiveRecord
{
    public $pageSize;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%event}}';
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
            [['name', 'street', 'city', 'country', 'zip', 'date', 'time'], 'required'],
            [['street', 'city', 'country'], 'string'],
            [['zip', 'created_at', 'updated_at'], 'integer'],
            ['date', 'date', 'format' => 'yyyy-mm-dd'],
            ['time', 'time', 'format' => 'hh:mm:ss'],
            [['name'], 'string', 'max' => 512],
            ['pageSize', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'street' => 'Street',
            'city' => 'City',
            'country' => 'Country',
            'zip' => 'Zip',
            'date' => 'Date',
            'time' => 'Time',
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
        return $this->hasMany(EventGuest::className(), ['event_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EventQuery(get_called_class());
    }

    public function getAddress()
    {
        return $this->street . ', ' . $this->city . ', ' . $this->zip . ', ' . $this->country;
    }
}
