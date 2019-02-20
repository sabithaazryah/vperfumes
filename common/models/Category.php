<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $main_category
 * @property string $category
 * @property string $category_ar
 * @property string $category_code
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['main_category', 'CB', 'UB', 'status'], 'integer'],
            [['category', 'category_code','category_ar'], 'required'],
            [['DOC', 'DOU'], 'safe'],
            [['category', 'category_ar'], 'string', 'max' => 255],
            [['category_code'], 'string', 'max' => 100],
            [['category'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_category' => 'Main Category',
            'category' => 'Category',
            'category_ar' => 'Category (Arabic)',
            'category_code' => 'Category Code',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }
}
