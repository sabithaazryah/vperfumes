<?php

namespace common\models;

use Yii;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $main_category
 * @property int $category
 * @property int $subcategory
 * @property string $product_name
 * @property string $canonical_name
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $search_tag
 * @property string $item_ean
 * @property int $brand
 * @property int $ean_type 1 - EAN 2 - UPC
 * @property string $ean_value
 * @property int $gender_type 0=>men 1=>women 2=>unisex 3=>oriental
 * @property string $price
 * @property string $offer_price
 * @property int $discount
 * @property int $currency
 * @property int $stock
 * @property int $stock_unit
 * @property int $stock_availability
 * @property int $tax
 * @property int $free_shipping "1"=>"Yes", "0"=>"No"
 * @property int $product_type
 * @property int $size
 * @property int $size_unit
 * @property string $main_description
 * @property string $product_detail
 * @property int $condition "1"=>"New", "0"=>"refurbished"
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 * @property string $profile
 * @property string $profile_alt
 * @property string $gallery_alt
 * @property string $other_image
 * @property string $related_product
 * @property int $featured_product
 * @property double $sort
 */
class Product extends \yii\db\ActiveRecord {

    public $search_by_brand;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['main_category', 'category', 'subcategory', 'brand', 'ean_type', 'gender_type', 'discount', 'currency', 'stock', 'stock_unit', 'stock_availability', 'tax', 'free_shipping', 'product_type', 'size', 'size_unit', 'condition', 'CB', 'UB', 'status', 'featured_product'], 'integer'],
            [['main_category', 'product_name', 'canonical_name', 'item_ean', 'price', 'stock', 'product_detail', 'brand', 'size'], 'required'],
            [['meta_description', 'meta_keywords', 'main_description', 'product_detail'], 'string'],
            [['price', 'offer_price', 'sort'], 'number'],
            [['DOC', 'DOU', 'search_tag', 'other_image', 'product_name_ar', 'canonical_name_ar', 'product_detail_ar', 'barcode', 'type', 'barcode_price', 'offer_price_expiry_date', 'vmiles', 'related_product'], 'safe'],
            [['product_name', 'canonical_name'], 'string', 'max' => 100],
            [['meta_title'], 'string', 'max' => 200],
            [['ean_value', 'profile_alt', 'gallery_alt'], 'string', 'max' => 250],
            [['item_ean', 'profile'], 'string', 'max' => 255],
            [['canonical_name', 'canonical_name_ar'], 'unique'],
            [['item_ean'], 'unique'],
            [['other_image'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 3],
            [['profile'], 'file', 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'main_category' => 'Main Category',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'product_name' => 'Product Name',
            'product_name_ar' => 'Product Name (Arabic)',
            'canonical_name' => 'Canonical Name',
            'canonical_name_ar' => 'Canonical Name (Arabic)',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'search_tag' => 'Search Tag',
            'item_ean' => 'Item Ean',
            'brand' => 'Brand',
            'ean_type' => 'Ean Type',
            'ean_value' => 'Product Code',
            'gender_type' => 'Gender',
            'price' => 'MSP',
            'offer_price' => 'Offer Price',
            'discount' => 'Discount',
            'currency' => 'Currency',
            'stock' => 'Stock',
            'stock_unit' => 'Stock Unit',
            'stock_availability' => 'Stock Availability',
            'tax' => 'Tax',
            'free_shipping' => 'Free Shipping',
            'product_type' => 'Product Type',
            'size' => 'Size',
            'size_unit' => 'Size Unit',
            'main_description' => 'Main Description',
            'product_detail' => 'Product Detail',
            'product_detail_ar' => 'Product Detail (Arabic)',
            'condition' => 'Condition',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
            'profile' => 'Profile',
            'profile_alt' => 'Profile Alt',
            'gallery_alt' => 'Gallery Alt',
            'other_image' => 'Other Image',
            'related_product' => 'Related Product',
            'featured_product' => 'Featured Product',
            'sort' => 'Sort',
        ];
    }

    public function upload($file, $model) {
        if (\yii::$app->basePath . '/../uploads') {
            $path = yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_big.' . $file->extension;
            $main_path = yii::$app->basePath . '/../uploads/product/' . $model->id;
            $name = $model->canonical_name . '.' . $file->extension;
            Image::thumbnail($path, 600, 600)
                    ->save($main_path . '/profile/' . $name, ['quality' => 80]);
            Image::thumbnail($path, 1080, 1080)
                    ->save(\yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_big.' . $file->extension, ['quality' => 50]);
            Image::thumbnail($path, 250, 250)
                    ->save(\yii::$app->basePath . '/../uploads/product/' . $model->id . '/profile/' . $model->canonical_name . '_thumb.' . $file->extension, ['quality' => 50]);
            return true;
        }
    }

    public function uploadMultiple($file, $product_id, $canname, $i) {
        if (\yii::$app->basePath . '/../uploads') {
            chmod(\yii::$app->basePath . '/../uploads', 0777);

            if (!is_dir(\yii::$app->basePath . '/../uploads/product/')) {
                mkdir(\yii::$app->basePath . '/../uploads/product/');
                chmod(\yii::$app->basePath . '/../uploads/product/', 0777);
            }
            if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id)) {
                mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id);
                chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id, 0777);
            }
            if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery')) {
                mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery');
                chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery', 0777);
            }
            $path = yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery';
            $main_path = yii::$app->basePath . '/../uploads/product/' . $product_id;
            $name = $this->fileExists($path, $canname, $image_name = $canname, $file->extension, 1);
            if ($file->saveAs($path . '/' . $name)) {
                chmod($path . '/' . $name, 0777);
                if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_thumb/')) {
                    mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_thumb/');
                    chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_thumb/', 0777);
                }
                if (!is_dir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_profile/')) {
                    mkdir(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_profile/');
                    chmod(\yii::$app->basePath . '/../uploads/product/' . $product_id . '/gallery_profile/', 0777);
                }
                Image::thumbnail($path . '/' . $name, 250, 250)
                        ->save($main_path . '/gallery_thumb/' . $name, ['quality' => 80]);
                Image::thumbnail($path . '/' . $name, 1080, 1080)
                        ->save($main_path . '/gallery/' . $name, ['quality' => 80]);
                Image::thumbnail($path . '/' . $name, 600, 600)
                        ->save($main_path . '/gallery_profile/' . $name, ['quality' => 80]);
            }
            return true;
        }
    }

    public function fileExists($path, $canname, $image_name, $extension, $sufix) {
        if (file_exists($path . '/' . $image_name . '.' . $extension)) {
            $image_name = basename($path . '/' . $canname . '_' . $sufix);
            return $this->fileExists($path, $canname, $image_name, $extension, $sufix + 1);
        } else {
            return $image_name . '.' . $extension;
        }
    }

}
