<?php

namespace app\modules\v1\authors\repository;

/**
 * This is the ActiveQuery class for [[\app\modules\v1\models\Authors]].
 *
 * @see \app\modules\v1\models\Authors
 */
class AuthorsRepository extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Authors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Authors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
