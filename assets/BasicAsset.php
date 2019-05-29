<?php

/**
 * BasicAsset is basic wireframe asset
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
 * Class BasicAsset
 *
 * @category Asset
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class BasicAsset extends AssetBundle
{
    public $sourcePath = '@webroot/html/_basic';
    public $css = [
        'font-awesome-4.6.3/css/font-awesome.min.css',
        'css/basic.css',
    ];
    public $js = [
        'js/basic.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
    
}
