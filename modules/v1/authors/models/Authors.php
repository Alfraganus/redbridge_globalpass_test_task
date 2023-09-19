<?php

namespace app\modules\v1\authors\models;

use app\modules\v1\authors\repository\AuthorsRepository;
use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\repository\BooksQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['author_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AuthorsRepository the active query used by this AR class.
     */
    public static function find()
    {
        return new AuthorsRepository(get_called_class());
    }
}
