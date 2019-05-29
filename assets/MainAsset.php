<?php

/**
 * MainAsset for main layout
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
 * Class MainAsset
 *
 * @category Asset
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class MainAsset extends AssetBundle
{
    public $sourcePath = '@webroot/html/_main';
    public $css = [
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\BasicAsset',
    ];
}
