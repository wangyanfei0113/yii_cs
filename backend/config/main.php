<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/params.php'
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            //'csrfParam' => '_csrf-backend',
            'enableCookieValidation' => false,
            'cookieValidationKey' => 'dK9jY-z1uUZsIGCXcVi9dDtuCfUJJcT2',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],

    ],
    'params' => $params,
];
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
return $config;
