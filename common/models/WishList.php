<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wish_list".
 *
 * @property int $id
 * @property int $user_id
 * @property string $session_id
 * @property int $product
 * @property string $date
 */
class WishList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wish_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product'], 'integer'],
            [['date'], 'safe'],
            [['session_id'], 'string', 'max' => 100],
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
            'session_id' => 'Session ID',
            'product' => 'Product',
            'date' => 'Date',
        ];
    }
}
