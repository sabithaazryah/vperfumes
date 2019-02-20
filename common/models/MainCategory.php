<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main_category".
 *
 * @property int $id
 * @property string $main_category
 * @property string $canonical_name
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 * @property int $sort_order
 */
class MainCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CB', 'UB', 'status', 'sort_order'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['main_category'], 'string', 'max' => 200],
            [['canonical_name'], 'string', 'max' => 255],
            [['main_category'], 'unique'],
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
            'canonical_name' => 'Canonical Name',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
            'sort_order' => 'Sort Order',
        ];
    }
}
