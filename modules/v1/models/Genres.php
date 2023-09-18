<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "genres".
 *
 * @property int $id
 * @property string $name
 *
 * @property Books[] $books
 */
class Genres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres';
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
        return $this->hasMany(Books::class, ['genre' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\repository\GenresRepository the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\repository\GenresRepository(get_called_class());
    }
}
