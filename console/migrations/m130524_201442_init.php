<?php

use yii\db\Migration;
use yii\db\Schema;

class m130524_201442_init extends Migration
{

    public function up()
    {
        $this->initUserInitTable();
        $this->initWechatTable();
        $this->initModuleTable();
        $this->initReplyRuleTable();
        $this->initFansTable();
        $this->initUserTable();
        $this->initMessageHistoryTable();
        $this->initMediaTable();
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%wechat}}');
        $this->dropTable('{{%module}}');
        $this->dropTable('{{%reply_rule}}');
        $this->dropTable('{{%reply_rule_keyword}}');
        $this->dropTable('{{%fans}}');
        $this->dropTable('{{%mpUser}}');
        $this->dropTable('{{%message_history}}');
    }

    /**
     * 用户初始化
     */
    public function initUserInitTable()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }
    
    

    /**
     * 公众号表
     */
    public function initWechatTable()
    {
        $tableName = '{{%wechat}}';//Wechat::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '公众号名称'",
            'token' => Schema::TYPE_STRING . "(32) NOT NULL DEFAULT '' COMMENT '微信服务访问验证token'",
            'access_token' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '访问微信服务验证token'",
            'account' => Schema::TYPE_STRING . "(30) NOT NULL DEFAULT '' COMMENT '微信号'",
            'original' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '原始ID'",
            'type' => Schema::TYPE_BOOLEAN . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '公众号类型'",
            'key' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '公众号的AppID'",
            'secret' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '公众号的AppSecret'",
            'encoding_aes_key' => Schema::TYPE_STRING . "(43) NOT NULL DEFAULT '' COMMENT '消息加密秘钥EncodingAesKey'",
            'avatar' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '头像地址'",
            'qrcode' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '二维码地址'",
            'address' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '所在地址'",
            'description' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '公众号简介'",
            'username' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '微信官网登录名'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '状态'",
            'password' => Schema::TYPE_STRING . "(32) NOT NULL DEFAULT '' COMMENT '微信官网登录密码'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->createIndex('key', $tableName, 'key');
    }

    /**
     * 扩展模块表
     */
    public function initModuleTable()
    {
        $tableName = '{{%module}}';//Module::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '模块ID'",
            'name' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '模块名称'",
            'type' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '模块类型'",
            'category' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '模块类型'",
            'version' => Schema::TYPE_STRING . "(10) NOT NULL DEFAULT '' COMMENT '模块版本'",
            'ability' => Schema::TYPE_STRING . "(100) NOT NULL DEFAULT '' COMMENT '模块功能简述'",
            'description' => Schema::TYPE_TEXT . " NOT NULL COMMENT '模块详细描述'",
            'author' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '模块作者'",
            'site' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '模块详情地址'",
            'admin' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '是否有后台界面'",
            'migration' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '是否有迁移数据'",
            'reply_rule' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '是否启用回复规则'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->addPrimaryKey('id', $tableName, 'id');
    }

    /**
     * 回复规则表
     */
    public function initReplyRuleTable()
    {
        $tableName = '{{%reply_rule}}';//ReplyRule::tablename();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'wid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属微信公众号ID'",
            'name' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '规则名称'",
            'mid' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '处理的插件模块'",
            'processor' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '处理类'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '状态'",
            'priority' => Schema::TYPE_BOOLEAN . "(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '优先级'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->createIndex('wid', $tableName, 'wid');
        $this->createIndex('mid', $tableName, 'mid');

        // 回复规则关键字表
        $tableName = '{{%reply_rule_keyword}}';//ReplyRuleKeyword::tablename();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'rid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属规则ID'",
            'keyword' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '规则关键字'",
            'type' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '关键字类型'",
            'priority' => Schema::TYPE_BOOLEAN . "(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '优先级'",
            'start_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '开始时间'",
            'end_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '结束时间'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->createIndex('rid', $tableName, 'rid');
        $this->createIndex('keyword', $tableName, 'keyword');
        $this->createIndex('type', $tableName, 'type');
        $this->createIndex('start_at', $tableName, 'start_at');
        $this->createIndex('end_at', $tableName, 'end_at');
    }

    /**
     * 粉丝表
     */
    public function initFansTable()
    {
        $tableName = '{{%fans}}';//Fans::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'wid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属微信公众号ID'",
            'open_id' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '微信ID'",
            'status' => Schema::TYPE_BOOLEAN . " NOT NULL DEFAULT '0' COMMENT '关注状态'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '关注时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->createIndex('wid', $tableName, 'wid');
        $this->createIndex('open_id', $tableName, 'open_id');
    }

    /**
     * 粉丝用户表
     */
    public function initUserTable()
    {
        // 公众号粉丝详情表
        $tableName = '{{%mpUser}}';//MpUser::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '粉丝ID'",
            'nickname' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '昵称'",
            'sex' => Schema::TYPE_BOOLEAN . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '性别'",
            'city' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '所在城市'",
            'country' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '所在省'",
            'province' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '微信ID'",
            'language' => Schema::TYPE_STRING . "(40) NOT NULL DEFAULT '' COMMENT '用户语言'",
            'avatar' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '用户头像'",
            'subscribe_time' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '关注时间'",
            'union_id' => Schema::TYPE_STRING . "(30) NOT NULL DEFAULT '' COMMENT '用户头像'",
            'remark' => Schema::TYPE_STRING . " NOT NULL DEFAULT '' COMMENT '备注'",
            'group_id' => Schema::TYPE_SMALLINT . " NOT NULL DEFAULT '0' COMMENT '分组ID'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
        $this->createIndex('id', $tableName, 'id', true);
    }

    /**
     * 消息记录表
     */
    public function initMessageHistoryTable()
    {
        $tableName = '{{%message_history}}';//MessageHistory::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'wid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属微信公众号ID'",
            'rid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '相应规则ID'",
            'kid' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属关键字ID'",
            'from' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '请求用户ID'",
            'to' => Schema::TYPE_STRING . "(50) NOT NULL DEFAULT '' COMMENT '相应用户ID'",
            'module' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '处理模块'",
            'message' => Schema::TYPE_TEXT . " NOT NULL COMMENT '消息体内容'",
            'type' => Schema::TYPE_STRING . "(10) NOT NULL DEFAULT '' COMMENT '发送类型'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'"
        ]);
        $this->createIndex('wid', $tableName, 'wid');
        $this->createIndex('module', $tableName, 'module');
    }

    /**
     * 素材表
     */
    public function initMediaTable()
    {
        $tableName = '{{%media}}';//Media::tableName();
        $this->createTable($tableName, [
            'id' => Schema::TYPE_PK,
            'mediaId' => Schema::TYPE_STRING . "(100) NOT NULL DEFAULT '' COMMENT '素材ID'",
            'filename' => Schema::TYPE_STRING . "(100) NOT NULL COMMENT '文件名'",
            'result' => Schema::TYPE_TEXT . " NOT NULL COMMENT '微信返回数据'",
            'type' => Schema::TYPE_STRING . "(10) NOT NULL DEFAULT '' COMMENT '素材类型'",
            'material' => Schema::TYPE_STRING . "(20) NOT NULL DEFAULT '' COMMENT '素材类别'",
            'created_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间'",
            'updated_at' => Schema::TYPE_INTEGER . " UNSIGNED NOT NULL DEFAULT '0' COMMENT '修改时间'"
        ]);
    }
}
