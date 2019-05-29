<?php
/**
 * Main configuration for the project
 *
 * @category Configuration
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'web-app',
    'name' => 'My Application',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'site/index',
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            // 'baseUrl' => '/basic/web',   //  php -S localhost:80 in web folder
        ],
        'helper' => [
            'class' => 'app\components\HelperComponent',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\User',
            'loginUrl' => null,
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        // YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js',
                        'jquery.min.js',
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        // YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                        'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        // YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                        'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
    ],
    'timeZone' => 'Asia/Saigon',
    'params' => $params,
];

return $config;
