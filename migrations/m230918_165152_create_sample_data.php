<?php

use yii\db\Migration;

/**
 * Class m230918_165152_create_sample_data
 */
class m230918_165152_create_sample_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authorNames = [
            'John Smith',
            'Mary Johnson',
            'Robert Brown',
            'Jennifer Lee',
            'Michael Davis',
            'Linda Wilson',
            'David Evans',
            'Patricia White',
            'William Turner',
            'Elizabeth Martinez',
        ];

        foreach ($authorNames as $name) {
            $authorModel = new \app\modules\v1\models\Authors();
            $authorModel->name = $name;
            $authorModel->save();
        }

        $genres = ['Science Fiction', 'Fantasy', 'Mystery', 'Romance', 'Thriller'];
        foreach ($genres as $genre) {
            $GenresModel = new \app\modules\v1\models\Genres();
            $GenresModel->name = $genre;
            $GenresModel->save();
        }

        $languages = ['English', 'Russian', 'French', 'Spanish'];
        foreach ($languages as $language) {
            $LanguageModel = new \app\modules\v1\models\Languages();
            $LanguageModel->name = $language;
            $LanguageModel->save();
        }

        $bookTitles = [
            'To Kill a Mockingbird',
            'The Great Gatsby',
            '1984',
            'Pride and Prejudice',
            'The Catcher in the Rye',
            'Brave New World',
            'The Lord of the Rings',
            'The Hobbit',
            'Moby-Dick',
            'The Chronicles of Narnia',
            'Harry Potter and the Sorcerer\'s Stone',
            'The Hunger Games',
            'The Da Vinci Code',
            'The Shining',
            'The Hitchhiker\'s Guide to the Galaxy',
            'The Grapes of Wrath',
            'The Road',
            'The Alchemist',
            'To the Lighthouse',
            'War and Peace',
            'The Sun Also Rises',
            'Gone with the Wind',
            'The Color Purple',
            'Wuthering Heights',
            'Frankenstein',
            'The Odyssey',
            'Fahrenheit 451',
            'The Old Man and the Sea',
            'One Hundred Years of Solitude',
            'Crime and Punishment',
            'The Picture of Dorian Gray',
            'Anna Karenina',
            'The Bell Jar',
            'The Divine Comedy',
            'The Sound and the Fury',
            'The Road Less Traveled',
            'The Girl with the Dragon Tattoo',
            'The Name of the Wind',
            'The Kite Runner',
            'The Secret Garden',
            'The Art of War',
            'The Handmaid\'s Tale',
            'The Wind in the Willows',
            'The Stand',
            'The Giver',
            'The Scarlet Letter',
            'The Jungle Book',
            'The Little Prince',
            'The Count of Monte Cristo',
        ];
        foreach ($bookTitles as $title) {
            $LanguageModel = new \app\modules\v1\models\Books();
            $LanguageModel->title = $title;
            $LanguageModel->author_id = rand(1,10);
            $LanguageModel->genre = rand(1,5);
            $LanguageModel->language = rand(1,5);
            $LanguageModel->book_page = rand(111,555);
            $LanguageModel->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
