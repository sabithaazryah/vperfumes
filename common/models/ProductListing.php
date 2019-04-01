<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_listing".
 *
 * @property int $id
 * @property string $title
 * @property string $product_id
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class ProductListing extends \yii\db\ActiveRecord {

    public $search_by_brand;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product_listing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU', 'product_id'], 'safe'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'product_id' => 'Products',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }

    public static function Products($id) {

        $designation = explode(',', $id);
        $designations = '';
        $i = 0;
        if (!empty($designation)) {
            foreach ($designation as $des) {

                if ($i > 1) {
                    $designations .= ',<br>';
                }
                $designation_name = Product::findOne($des);
                if (!empty($designation_name)) {
                    $designations .= $designation_name->product_name;
                }
                $i++;
            }
        }

        return $designations;
    }

}
