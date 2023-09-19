<?php

namespace Unit;

use app\modules\v1\authors\models\Authors;
use app\modules\v1\books\models\Books;
use \UnitTester;

class RedbridgeTest extends \Codeception\Test\Unit
{
    protected UnitTester $tester;

    protected function _before()
    {
        $this->createBook();
        $this->createAuthor();

    }
    public function testSomeFeature()
    {
        $this->updateAuthor();
        $this->updateBook();
    }
    public function createBook(): void
    {
        $bookModel = new Books();
        $bookModel->title = 'testBook';
        $bookModel->save();
        $book = Books::find()->where(['title' => 'testBook'])->one();
        $this->tester->assertEquals('testBook', $book->title);
    }
    public function updateBook()
    {
        $bookModel = Books::findOne(['title'=>'testBook']);
        $bookModel->title = 'changedToDoubleTestedBook';
        $bookModel->save();
        $this->tester->assertEquals('changedToDoubleTestedBook',$bookModel->title);
    }
    public function updateAuthor()
    {
        $authorModel = Authors::findOne(['name'=>'testAuthor']);
        $authorModel->name = 'changedAuthor';
        $authorModel->save();
        $this->tester->assertEquals('changedAuthor',$authorModel->name);
    }
    public function createAuthor(): void
    {
        $authorModel = new Authors();
        $authorModel->name = 'testAuthor';
        $authorModel->save();
        $this->tester->assertEquals('testAuthor', $authorModel->name);
    }
}
