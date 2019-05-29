<?php
/**
 * Db config
 *
 * @category Config
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=dbname',
            'username' => 'username',
            'password' => '',
            'charset' => 'utf8',
            'on afterOpen' => function ($event) {
                $event->sender->createCommand("SET time_zone = '+07:00'")->execute();
            }
        ]
    ]
];
