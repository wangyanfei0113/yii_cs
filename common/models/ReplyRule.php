<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_reply_rule".
 *
 * @property int $id
 * @property string $wid 所属微信公众号ID
 * @property string $name 规则名称
 * @property string $mid 处理的插件模块
 * @property string $processor 处理类
 * @property int $status 状态
 * @property int $priority 优先级
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class ReplyRule extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_reply_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wid', 'status', 'priority', 'created_at', 'updated_at'], 'integer'],
            [['name', 'processor'], 'string', 'max' => 40],
            [['mid'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wid' => 'Wid',
            'name' => 'Name',
            'mid' => 'Mid',
            'processor' => 'Processor',
            'status' => 'Status',
            'priority' => 'Priority',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
