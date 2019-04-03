<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_search_tag".
 *
 * @property int $id
 * @property string $tag_name
 * @property string $tag_name_ar
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class MasterSearchTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_search_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['CB', 'UB', 'status'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['tag_name', 'tag_name_ar'], 'string', 'max' => 255],
            [['tag_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
            'tag_name_ar' => 'Tag Name (Arabic)',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'status' => 'Status',
        ];
    }
}
