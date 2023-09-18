<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property int|null $author_id
 * @property int|null $book_page
 * @property int|null $language
 * @property int|null $genre
 *
 * @property Authors $author
 * @property Genres $genre0
 * @property Languages $language0
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['author_id', 'book_page', 'language', 'genre'], 'default', 'value' => null],
            [['author_id', 'book_page', 'language', 'genre'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::class, 'targetAttribute' => ['author_id' => 'id']],
            [['genre'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::class, 'targetAttribute' => ['genre' => 'id']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::class, 'targetAttribute' => ['language' => 'id']],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'author_id' => Yii::t('app', 'Author ID'),
            'book_page' => Yii::t('app', 'Book Page'),
            'language' => Yii::t('app', 'Language'),
            'genre' => Yii::t('app', 'Genre'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\repository\AuthorsQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Genre0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\repository\GenresQuery
     */
    public function getGenre0()
    {
        return $this->hasOne(Genres::class, ['id' => 'genre']);
    }

    /**
     * Gets query for [[Language0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\repository\LanguagesQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(Languages::class, ['id' => 'language']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\repository\BooksRepository the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\repository\BooksRepository(get_called_class());
    }
}
