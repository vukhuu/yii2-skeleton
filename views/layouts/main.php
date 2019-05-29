<?php
/**
 * Main Layout
 *
 * @category Layout
 * @package  Application
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

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use yii\widgets\Breadcrumbs;

use app\components\Helper;

use app\assets\MainAsset;

MainAsset::register($this);

?>

<?php

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

if (isset($this->params['jsMessages'])) {
    $this->registerJs('var jsMessages = ' . json_encode($this->params['jsMessages']) . ';', \yii\web\View::POS_BEGIN, 'jsMessages');
}

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title.' | '.Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php echo $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>