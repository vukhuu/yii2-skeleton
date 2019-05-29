<?php
/**
 * BaseActiveRecord
 *
 * @category ActiveRecord
 * @package  Skeleton
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */

namespace app\models;

use \yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
use \yii\db\Expression;

/**
 * Class BaseActiveRecord
 *
 * @category Controller
 * @package  Application
 * @author   Vu Khuu <vu.khuu@gmail.com>
 * @license  BSD <http://www.bsd.org/>
 * @link     https://
 */
class BaseActiveRecord extends ActiveRecord
{
    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * Inspired by Symphony's EntityRepository, complex|helper queries should be implemented in a separate class instead of in the model itself.
     * The model should be responsible for simple stuff like validation rules, define public constants only.
     * The repository is actually a behavior which expose all of its methods to the owner model.
     *
     * @return null|string Full name of the repository class
     */
    public function repositoryClass()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $repoClass = $this->repositoryClass();
        if (!empty($repoClass)) {
            $this->attachBehavior('repo', $repoClass);
        }
    }
}