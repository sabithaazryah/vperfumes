<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $img
 * @property string $img_ar
 * @property string $slider_link
 * @property string $alt_tag_content
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['img'], 'string', 'max' => 100],
            [['img_ar'], 'string', 'max' => 255],
            [['slider_link'], 'string', 'max' => 500],
            [['alt_tag_content'], 'string', 'max' => 200],
            [['img','img_ar'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['img','img_ar'],'required','on' => 'create']
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Image',
            'img_ar' => 'Image (Arabic)',
            'slider_link' => 'Slider Link',
            'alt_tag_content' => 'Alt Tag',
            'status' => 'Status',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
        ];
    }
}
