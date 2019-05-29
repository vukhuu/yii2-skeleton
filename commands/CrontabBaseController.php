<?php
/**
 * Base command from crontab
 *
 * PHP version 5.5.9
 *
 * @category Command
 * @package  Command
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

namespace app\commands;

use yii\console\Controller;
use \Yii;

/**
 * Base command from crontab
 *
 * PHP version 5.5.9
 *
 * @category Command
 * @package  Command
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class CrontabBaseController extends Controller
{
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
        
        $fileName = $this->_getLockFileName($action->id);

        if (file_exists($fileName)) {
            // If this file exists for more than 30 mins, delete it, maybe the action that ran it got exceptions thrown
            $lastModified = filemtime($fileName);
            $now = time();
            if (($now-$lastModified) >= (30*60)) {
                unlink($fileName);
                $this->_generateLockFile($action->id);
                return true;
            }
            return false;
        } else {
            $this->_generateLockFile($fileName);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @param Action $action the action just executed.
     * @param mixed  $result the action return result.
     *
     * @return mixed the processed action result.
     */
    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        
        $fileName = $this->_getLockFileName($action->id);
        if (file_exists($fileName)) {
            unlink($fileName);
        }

        return $result;
    }

    /**
     * Get lock file name
     *
     * @param string $actionId Id of current action
     *
     * @return string
     */
    private function _getLockFileName($actionId)
    {
        $controllerName = $this->id;
        $fileName = Yii::getAlias('@app')."/runtime/{$controllerName}_{$actionId}.lock";
        return $fileName;
    }

    /**
     * Get lock file name
     *
     * @param string $fileName Name of lock file
     *
     * @return void
     */
    private function _generateLockFile($fileName)
    {
        file_put_contents($fileName, 'locking');
    }
}
