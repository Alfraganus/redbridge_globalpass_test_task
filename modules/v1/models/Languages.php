<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $name
 *
 * @property Books[] $books
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languages';
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
        return $this->hasMany(Books::class, ['language' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\repository\LanguagesRepository the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\repository\LanguagesRepository(get_called_class());
    }
}
