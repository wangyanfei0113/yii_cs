<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_fans".
 *
 * @property int $id
 * @property string $wid 所属微信公众号ID
 * @property string $open_id 微信ID
 * @property int $status 关注状态
 * @property string $created_at 关注时间
 * @property string $updated_at 修改时间
 */
class Fans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_fans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['open_id'], 'string', 'max' => 50],
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
            'open_id' => 'Open ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
