<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $currency_value
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_name', 'currency_symbol'], 'required'],
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['currency_name', 'currency_symbol', 'currency_value'], 'string', 'max' => 255],
            [['currency_name'], 'unique'],
            [['currency_symbol'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_name' => 'Currency Name',
            'currency_symbol' => 'Currency Symbol',
            'currency_value' => 'Currency Value',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }
}
