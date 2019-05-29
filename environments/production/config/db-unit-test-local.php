<?php
/**
 * Db local config
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
            'dsn' => 'mysql:host=localhost;dbname=dbname_unit_test',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'on afterOpen' => function ($event) {
                $event->sender->createCommand("SET time_zone = '+07:00'")->execute();
            }
        ]
    ]
];
