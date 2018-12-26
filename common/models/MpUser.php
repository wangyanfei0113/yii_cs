<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_mpUser".
 *
 * @property string $id 粉丝ID
 * @property string $nickname 昵称
 * @property int $sex 性别
 * @property string $city 所在城市
 * @property string $country 所在省
 * @property string $province 微信ID
 * @property string $language 用户语言
 * @property string $avatar 用户头像
 * @property string $subscribe_time 关注时间
 * @property string $union_id 用户头像
 * @property string $remark 备注
 * @property int $group_id 分组ID
 * @property string $updated_at 修改时间
 */
class MpUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_mpUser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sex', 'subscribe_time', 'group_id', 'updated_at'], 'integer'],
            [['nickname'], 'string', 'max' => 20],
            [['city', 'country', 'province', 'language'], 'string', 'max' => 40],
            [['avatar', 'remark'], 'string', 'max' => 255],
            [['union_id'], 'string', 'max' => 30],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'sex' => 'Sex',
            'city' => 'City',
            'country' => 'Country',
            'province' => 'Province',
            'language' => 'Language',
            'avatar' => 'Avatar',
            'subscribe_time' => 'Subscribe Time',
            'union_id' => 'Union ID',
            'remark' => 'Remark',
            'group_id' => 'Group ID',
            'updated_at' => 'Updated At',
        ];
    }
}
