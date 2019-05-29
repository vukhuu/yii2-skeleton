<?php
/**
 * Index file
 *
 * @category Web
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'production');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../config/web.php',
    require __DIR__ . '/../config/web-local.php',
    require __DIR__ . '/../config/db-local.php'
);

(new yii\web\Application($config))->run();