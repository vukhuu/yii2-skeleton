<?php

/**
 * Console config
 *
 * PHP version 5.5.9
 *
 * @category Config
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'name' => 'App Console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'viewPath' => '@app/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host'       => 'smtp.mandrillapp.com',
                'username'   => 'username',
                'password'   => '***',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'mailService' => [
            'class' => 'app\models\MailService'
        ],
    ],
    'params' => $params,
];
