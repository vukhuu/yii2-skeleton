<?php
/**
 * Base class for all controllers
 *
 * @category Model
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

namespace app\controllers;

use \yii\web\Controller as YiiBaseController;

/**
 * Base class for all controllers
 *
 * @category Model
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class Controller extends YiiBaseController
{
    /**
     * Yii::t messages for javascript
     */
    public $jsMessages = [];

    /**
     * {@inheritdoc}
     *
     * @param Action $action the action to be executed.
     *
     * @return boolean whether the action should continue to run.
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->view->params['jsMessages'] = &$this->jsMessages;

        return true;
    }
}