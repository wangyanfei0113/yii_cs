对于Apache，使用如下配置:
-------------------
````
 <VirtualHost *:80>
        ServerName frontend.test
        DocumentRoot "/path/to/yii-application/frontend/web/"
        
        <Directory "/path/to/yii-application/frontend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
        </Directory>
    </VirtualHost>
    
    <VirtualHost *:80>
        ServerName backend.test
        DocumentRoot "/path/to/yii-application/backend/web/"
        
        <Directory "/path/to/yii-application/backend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
        </Directory>
    </VirtualHost>
````
nginx使用如下配置:
-------------------
````
server {
        charset utf-8;
        client_max_body_size 128M;

        listen 80; ## listen for ipv4
        #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

        server_name frontend.test;
        root        /path/to/yii-application/frontend/web/;
        index       index.php;

        access_log  /path/to/yii-application/log/frontend-access.log;
        error_log   /path/to/yii-application/log/frontend-error.log;

        location / {
            # Redirect everything that isn't a real file to index.php
            try_files $uri $uri/ /index.php$is_args$args;
        }

        # uncomment to avoid processing of calls to non-existing static files by Yii
        #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        #    try_files $uri =404;
        #}
        #error_page 404 /404.html;

        # deny accessing php files for the /assets directory
        location ~ ^/assets/.*\.php$ {
            deny all;
        }

        location ~ \.php$ {
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_pass 127.0.0.1:9000;
            #fastcgi_pass unix:/var/run/php5-fpm.sock;
            try_files $uri =404;
        }
    
        location ~* /\. {
            deny all;
        }
    }
     
    server {
        charset utf-8;
        client_max_body_size 128M;
    
        listen 80; ## listen for ipv4
        #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
    
        server_name backend.test;
        root        /path/to/yii-application/backend/web/;
        index       index.php;
    
        access_log  /path/to/yii-application/log/backend-access.log;
        error_log   /path/to/yii-application/log/backend-error.log;
    
        location / {
            # Redirect everything that isn't a real file to index.php
            try_files $uri $uri/ /index.php$is_args$args;
        }
    
        # uncomment to avoid processing of calls to non-existing static files by Yii
        #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
        #    try_files $uri =404;
        #}
        #error_page 404 /404.html;

        # deny accessing php files for the /assets directory
        location ~ ^/assets/.*\.php$ {
            deny all;
        }

        location ~ \.php$ {
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_pass 127.0.0.1:9000;
            #fastcgi_pass unix:/var/run/php5-fpm.sock;
            try_files $uri =404;
        }
    
        location ~* /\. {
            deny all;
        }
    }
````
--------------
````
1.添加model
php yii gii/model --ns=common\models --tableName=pro_user --modelClass=User
php yii gii/model --ns=common\models --tableName=pro_wechat --modelClass=Wechat
php yii gii/model --ns=common\models --tableName=pro_mpUser --modelClass=MpUser
php yii gii/model --ns=common\models --tableName=pro_fans --modelClass=Fans
php yii gii/model --ns=common\models --tableName=pro_media --modelClass=Media
php yii gii/model --ns=common\models --tableName=pro_module --modelClass=Module
php yii gii/model --ns=common\models --tableName=pro_reply_rule --modelClass=ReplyRule
php yii gii/model --ns=common\models --tableName=pro_reply_rule_keyword --modelClass=ReplyKeyword
php yii gii/model --ns=common\models --tableName=pro_message_history --modelClass=MessageHistory



2.添加crud
php yii gii/crud --modelClass=common\models\User --controllerClass=backend\controllers\UserController --viewPath=backend\views\user
php yii gii/crud --modelClass=common\models\Wechat --controllerClass=backend\controllers\WechatController --viewPath=backend\views\wechat
php yii gii/crud --modelClass=common\models\MpUser --controllerClass=backend\controllers\MpUserController --viewPath=backend\views\mpuser
php yii gii/crud --modelClass=common\models\Fans --controllerClass=backend\controllers\FansController --viewPath=backend\views\fans
php yii gii/crud --modelClass=common\models\Media --controllerClass=backend\controllers\MediaController --viewPath=backend\views\media
php yii gii/crud --modelClass=common\models\Module --controllerClass=backend\controllers\ModuleController --viewPath=backend\views\module
php yii gii/crud --modelClass=common\models\ReplyRule --controllerClass=backend\controllers\ReplyRuleController --viewPath=backend\views\replyrule
php yii gii/crud --modelClass=common\models\ReplyKeyword --controllerClass=backend\controllers\ReplyController --viewPath=backend\views\reply
php yii gii/crud --modelClass=common\models\MessageHistory --controllerClass=backend\controllers\MessageController --viewPath=backend\views\message

3.crud使用adminlte模板
console->config->main.php 添加以下代码
if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ // HERE
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@vendor/dmstr/yii2-adminlte-asset/gii/templates/crud/simple',
                ]
            ]
        ],
    ];
}