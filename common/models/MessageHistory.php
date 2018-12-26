<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_message_history".
 *
 * @property int $id
 * @property string $wid 所属微信公众号ID
 * @property string $rid 相应规则ID
 * @property string $kid 所属关键字ID
 * @property string $from 请求用户ID
 * @property string $to 相应用户ID
 * @property string $module 处理模块
 * @property string $message 消息体内容
 * @property string $type 发送类型
 * @property string $created_at 创建时间
 */
class MessageHistory extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_message_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wid', 'rid', 'kid', 'created_at'], 'integer'],
            [['message'], 'required'],
            [['message'], 'string'],
            [['from', 'to'], 'string', 'max' => 50],
            [['module'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 10],
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
            'rid' => 'Rid',
            'kid' => 'Kid',
            'from' => 'From',
            'to' => 'To',
            'module' => 'Module',
            'message' => 'Message',
            'type' => 'Type',
            'created_at' => 'Created At',
        ];
    }
}
