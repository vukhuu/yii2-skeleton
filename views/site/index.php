<?php
/**
 * Error view
 *
 * @category View
 * @package  BaseSkeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Hello world";

?>

<style type="text/css">
    html, body {
        height: 100vh;
        /*background-color: #666666;*/
        /*color: #ffffff;*/
        text-align: center;
    }
    .error-wrapper {
        display: table;
        width: 100%;
        height: 100%;
        min-height: 100%;
        -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
        box-shadow: inset 0 0 100px rgba(0,0,0,.5);
    }
    .error-wrapper-inner {
        margin: 50px;
        display: table-cell;
        vertical-align: middle;
    }

</style>

<div class="error-wrapper">
    <div class="error-wrapper-inner">
        <h1>
            <?php echo Html::encode($this->title); ?>
        </h1>
        
        <p class="lead">
            Welcome to <?php echo Yii::$app->name; ?>
        </p>

    </div>
</div>
