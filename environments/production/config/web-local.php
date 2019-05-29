<?php
/**
 * Web local config
 *
 * @category Config
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

return [
    'bootstrap' => ['debug', 'gii'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];