<?php

namespace app\modules\v1\repository;

/**
 * This is the ActiveQuery class for [[\app\modules\v1\models\Books]].
 *
 * @see \app\modules\v1\models\Books
 */
class BooksRepository extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Books[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Books|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
