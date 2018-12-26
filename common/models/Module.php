<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pro_module".
 *
 * @property string $id 模块ID
 * @property string $name 模块名称
 * @property string $type 模块类型
 * @property string $category 模块类型
 * @property string $version 模块版本
 * @property string $ability 模块功能简述
 * @property string $description 模块详细描述
 * @property string $author 模块作者
 * @property string $site 模块详情地址
 * @property int $admin 是否有后台界面
 * @property int $migration 是否有迁移数据
 * @property int $reply_rule 是否启用回复规则
 * @property string $created_at 创建时间
 * @property string $updated_at 修改时间
 */
class Module extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pro_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'description'], 'required'],
            [['description'], 'string'],
            [['admin', 'migration', 'reply_rule', 'created_at', 'updated_at'], 'integer'],
            [['id', 'type', 'category'], 'string', 'max' => 20],
            [['name', 'author'], 'string', 'max' => 50],
            [['version'], 'string', 'max' => 10],
            [['ability'], 'string', 'max' => 100],
            [['site'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'type' => 'Type',
            'category' => 'Category',
            'version' => 'Version',
            'ability' => 'Ability',
            'description' => 'Description',
            'author' => 'Author',
            'site' => 'Site',
            'admin' => 'Admin',
            'migration' => 'Migration',
            'reply_rule' => 'Reply Rule',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
