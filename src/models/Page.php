<?php

namespace nickdenry\cmf\pages\basic\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $alias
 * @property boolean $is_published
 * @property string $created_at
 * @property string $updated_at
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simple_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['teaser', 'body', 'alias'], 'string'],
            ['is_published', 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['title', 'teaser', 'body', 'alias',], 'trim'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cmfBasicPage', 'ID'),
            'title' => Yii::t('cmfBasicPage', 'Title'),
            'teaser' => Yii::t('cmfBasicPage', 'Teaser'),
            'body' => Yii::t('cmfBasicPage', 'Body'),
            'alias' => Yii::t('cmfBasicPage', 'Alias'),
            'is_published' => Yii::t('cmfBasicPage', 'Is published'),
            'created_at' => Yii::t('cmfBasicPage', 'Created at'),
            'updated_at' => Yii::t('cmfBasicPage', 'Updated at'),
        ];
    }

    /**
     * Set behaviors.
     * Set TimestampBehavior for created_at, updated_at.
     * @see http://yiiframework.ru/forum/viewtopic.php?f=19&t=33865
     */
    public function behaviors()
    {
        return [
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'alias',
                'ensureUnique' => true,
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
