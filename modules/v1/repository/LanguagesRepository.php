<?php

namespace app\modules\v1\repository;

/**
 * This is the ActiveQuery class for [[\app\modules\v1\models\Languages]].
 *
 * @see \app\modules\v1\models\Languages
 */
class LanguagesRepository extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Languages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Languages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
