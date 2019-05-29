<?php
/**
 * Site Controller
 *
 * @category Controller
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Class SiteController
 *
 * @category Controller
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Index action
     *
     * @return void
     */
    public function actionIndex()
    {
        return $this->render("index");
    }
}
