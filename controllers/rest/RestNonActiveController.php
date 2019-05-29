<?php
/**
 * Base controller for non active rest controllers
 *
 * PHP version 5.5.9
 *
 * @category Command
 * @package  Command
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

namespace app\controllers\rest;

use yii\rest\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\VerbFilter;
use Yii;

/**
 * Base controller for non active rest controllers
 *
 * PHP version 5.5.9
 *
 * @category Command
 * @package  Command
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class RestNonActiveController extends Controller
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],
        ];
    }

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

        return true;
    }

    /**
     * FormatResponse
     *
     * @param array $data           data
     * @param bool  $success        success flag
     * @param int   $httpStatusCode httpStatusCode
     *
     * @return array
     */
    protected function formatResponse($data, $success = true, $httpStatusCode = 200)
    {
        Yii::$app->response->setStatusCode($httpStatusCode);
        return [
            'success' => $success,
            'message' => $success ? null : $data,
            'data' => $success ? $data: null
        ];
    }
}
