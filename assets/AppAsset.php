<?php

/**
 * AppAsset for cloning layout asset
 *
 * PHP version 5.5.9
 *
 * @category Asset
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 *
 * @category Asset
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',  // without bootrap.js
        'yii\bootstrap\BootstrapPluginAsset',   // full css & js
    ];
}
