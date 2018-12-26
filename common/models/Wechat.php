<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_wechat".
 *
 * @property int $id
 * @property string $name 公众号名称
 * @property string $token 微信服务访问验证token
 * @property string $access_token 访问微信服务验证token
 * @property string $account 微信号
 * @property string $original 原始ID
 * @property int $type 公众号类型
 * @property string $key 公众号的AppID
 * @property string $secret 公众号的AppSecret
 * @property string $encoding_aes_key 消息加密秘钥EncodingAesKey
 * @property string $avatar 头像地址
 * @property string $qrcode 二维码地址
 * @property string $address 所在地址
 * @property string $description 公众号简介
 * @property string $username 微信官网登录名
 * @property int $status 状态
 * @property string $password 微信官网登录密码
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class Wechat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_wechat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'original', 'username'], 'string', 'max' => 40],
            [['token', 'password'], 'string', 'max' => 32],
            [['access_token', 'avatar', 'qrcode', 'address', 'description'], 'string', 'max' => 255],
            [['account'], 'string', 'max' => 30],
            [['key', 'secret'], 'string', 'max' => 50],
            [['encoding_aes_key'], 'string', 'max' => 43],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'token' => 'Token',
            'access_token' => 'Access Token',
            'account' => 'Account',
            'original' => 'Original',
            'type' => 'Type',
            'key' => 'Key',
            'secret' => 'Secret',
            'encoding_aes_key' => 'Encoding Aes Key',
            'avatar' => 'Avatar',
            'qrcode' => 'Qrcode',
            'address' => 'Address',
            'description' => 'Description',
            'username' => 'Username',
            'status' => 'Status',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
