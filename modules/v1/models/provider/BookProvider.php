<?php
namespace app\modules\v1\models\provider;

use app\modules\v1\models\Books;

class BookProvider extends Books
{
    public function fields()
    {
        return [
            'id',
            'title',
            'author_id' => function(Books $books) {
                return $books->author->name;
            },
            'book_page',
            'language' => function(Books $books) {
                return $books->language0->name;
            },
            'genre' => function(Books $books) {
                return $books->genre0->name;
            },
        ];
    }
}