<?php

/**
 * Environment config
 *
 * PHP version 5.5.9
 *
 * @category Config
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */


/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'skipFiles'  => [
 *             // list of files that should only copied once and skipped if they already exist
 *         ],
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */
$config = [
    'path' => '',
    'setWritable' => [
        'runtime',
        'web/assets',
    ],
    'setExecutable' => [
        'yii',
        'tests/codeception/bin/yii',
    ],
    'setCookieValidationKey' => [
        'config/web-local.php',
    ],
];

return [
    'development' => call_user_func(
        function () use ($config) {
            $config['path'] = 'development';
            return $config;
        }
    ),
    'production' => call_user_func(
        function () use ($config) {
            $config['path'] = 'production';
            return $config;
        }
    ),
    'staging' => call_user_func(
        function () use ($config) {
            $config['path'] = 'staging';
            return $config;
        }
    ),
    'testing' => call_user_func(
        function () use ($config) {
            $config['path'] = 'testing';
            return $config;
        }
    ),
];
