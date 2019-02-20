<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $brand
 * @property string $brand_ar
 * @property string $image
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 * @property int $show_menu
 * @property int $favourite_brand
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand', 'brand_ar',], 'required'],
            [['CB', 'UB', 'status', 'show_menu', 'favourite_brand'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['brand', 'brand_ar'], 'string', 'max' => 200],
            [['image'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'brand_ar' => 'Brand (Arabic)',
            'image' => 'Image',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
            'show_menu' => 'Show Menu',
            'favourite_brand' => 'Favourite Brand',
        ];
    }
}
