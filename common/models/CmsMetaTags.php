<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cms_meta_tags".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property string $page_title
 */
class CmsMetaTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cms_meta_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'meta_keyword'], 'string'],
            [['CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['meta_title'], 'string', 'max' => 500],
            [['page_title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'CB' => 'C B',
            'UB' => 'U B',
            'DOC' => 'D O C',
            'DOU' => 'D O U',
            'page_title' => 'Page Title',
        ];
    }
}
