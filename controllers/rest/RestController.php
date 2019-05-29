<?php
/**
 * Base controller for all rest controllers
 *
 * @category Controller
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
namespace app\controllers\rest;

use Yii;
use yii\rest\ActiveController;
use yii\db\ActiveRecordInterface;

/**
 * Base controller for all rest controllers
 *
 * @category Controller
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class RestController extends ActiveController
{
    /**
     * Returns the data model based on the primary key given.
     * If the data model is not found, a 404 HTTP exception will be raised.
     *
     * @param string $id         the ID of the model to be loaded. If the model has a composite primary key,
     * the ID must be a string of the primary key values separated by commas.
     * The order of the primary key values should follow that returned by the `primaryKey()` method
     * of the model.
     * @param string $modelClass The model class name
     *
     * @return ActiveRecordInterface the model found
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id, $modelClass = null)
    {
        if (empty($modelClass)) {
            $modelClass = $this->modelClass;
        }
        /* @var $modelClass ActiveRecordInterface */
        $keys = $modelClass::primaryKey();
        if (count($keys) > 1) {
            $values = explode(',', $id);
            if (count($keys) === count($values)) {
                $model = $modelClass::findOne(array_combine($keys, $values));
            }
        } elseif ($id !== null) {
            $model = $modelClass::findOne($id);
        }

        if (isset($model)) {
            return $model;
        } else {
            throw new NotFoundHttpException("Object not found: $id");
        }
    }
}