<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand_category".
 *
 * @property int $id
 * @property string $category
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class BrandCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['category'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
