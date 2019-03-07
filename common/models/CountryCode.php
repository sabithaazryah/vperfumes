<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country_code".
 *
 * @property int $id
 * @property string $country_name
 * @property string $country_code
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class CountryCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['country_name'], 'string', 'max' => 100],
            [['country_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_name' => 'Country Name',
            'country_code' => 'Country Code',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
