<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer_reviews".
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $tittle
 * @property string $description
 * @property string $review_date
 * @property int $status '0'=>'Not Appoved' , '1' => 'Appoved,
 */
class CustomerReviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['review_date'], 'safe'],
            [['tittle'], 'string', 'max' => 100],
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
            'product_id' => 'Product ID',
            'tittle' => 'Tittle',
            'description' => 'Description',
            'review_date' => 'Review Date',
            'status' => 'Status',
        ];
    }
}
