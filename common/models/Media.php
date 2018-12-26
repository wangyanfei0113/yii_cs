<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_media".
 *
 * @property int $id
 * @property string $mediaId 素材ID
 * @property string $filename 文件名
 * @property string $result 微信返回数据
 * @property string $type 素材类型
 * @property string $material 素材类别
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'result'], 'required'],
            [['result'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['mediaId', 'filename'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 10],
            [['material'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mediaId' => 'Media ID',
            'filename' => 'Filename',
            'result' => 'Result',
            'type' => 'Type',
            'material' => 'Material',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
