<?php
namespace app\modules\v1\books\models\search;

use app\modules\v1\books\models\Books;
use app\modules\v1\books\models\provider\BookProvider;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class BooksSearch extends Books
{
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['author_id', 'book_page', 'language', 'genre'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = BookProvider::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query
            ->andFilterWhere(['between', 'book_page', $params['minPage'], $params['maxPage']])
            ->andFilterWhere(['in', 'language',$params['language_id']])
            ->andFilterWhere(['in', 'author_id', $params['author_id']])
            ->andFilterWhere(['genre'=>$params['genre']]);

        $query->andFilterWhere(['like', 'title',$params['title']]);

        return $dataProvider;
    }
}
