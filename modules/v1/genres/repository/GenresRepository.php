<?php
namespace app\modules\v1\genres\repository;
/**
 * This is the ActiveQuery class for [[\app\modules\v1\models\Genres]].
 *
 * @see \app\modules\v1\models\Genres
 */
class GenresRepository extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Genres[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\Genres|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
