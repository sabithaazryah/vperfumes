<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $ean_value
 * @property string $barcode
 * @property string $product_name
 * @property int $main_category
 * @property string $size
 * @property string $size_unit
 * @property string $gender_type
 * @property string $brand
 * @property string $price
 * @property string $barcode_price
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['main_category'], 'integer'],
            [['price'], 'number'],
            [['ean_value'], 'string', 'max' => 250],
            [['barcode'], 'string', 'max' => 255],
            [['product_name', 'size', 'size_unit', 'gender_type', 'brand', 'barcode_price'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ean_value' => 'Ean Value',
            'barcode' => 'Barcode',
            'product_name' => 'Product Name',
            'main_category' => 'Main Category',
            'size' => 'Size',
            'size_unit' => 'Size Unit',
            'gender_type' => 'Gender Type',
            'brand' => 'Brand',
            'price' => 'Price',
            'barcode_price' => 'Barcode Price',
        ];
    }
}
