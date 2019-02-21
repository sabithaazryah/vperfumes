<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $address
 * @property string $landmark
 * @property string $location
 * @property int $emirate
 * @property int $post_code
 * @property string $country_code
 * @property string $mobile_number
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'address', 'landmark', 'location', 'emirate', 'mobile_number'], 'required'],
            [['user_id', 'emirate', 'post_code', 'mobile_number', 'status', 'CB', 'UB'], 'integer'],
            [['address'], 'string'],
            [['DOC', 'DOU'], 'safe'],
            [['name', 'location'], 'string', 'max' => 100],
            [['landmark'], 'string', 'max' => 250],
            [['country_code'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'address' => 'Address',
            'landmark' => 'Landmark',
            'location' => 'Location',
            'emirate' => 'Emirate',
            'post_code' => 'Post Code',
            'country_code' => 'Country Code',
            'mobile_number' => 'Mobile Number',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
