<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_reply_rule_keyword".
 *
 * @property int $id
 * @property string $rid 所属规则ID
 * @property string $keyword 规则关键字
 * @property string $type 关键字类型
 * @property int $priority 优先级
 * @property string $start_at 开始时间
 * @property string $end_at 结束时间
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class ReplyKeyword extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_reply_rule_keyword';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rid', 'priority', 'start_at', 'end_at', 'created_at', 'updated_at'], 'integer'],
            [['keyword'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rid' => 'Rid',
            'keyword' => 'Keyword',
            'type' => 'Type',
            'priority' => 'Priority',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
