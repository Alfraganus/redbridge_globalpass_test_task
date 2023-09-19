<?php

namespace app\modules\v1\controllers;

use app\modules\v1\books\models\provider\BookProvider;
use app\modules\v1\books\models\search\BooksSearch;
use Yii;
use yii\rest\ActiveController;

/**
 * @OA\Info(title="GLOBALPAS API-list", version="1.0")
 * @OA\Get(
 *     path="/v1/books/",
 *     tags={"books"},
 *     operationId="get-all-books",
 *    @OA\Response(
 *        response=200,
 *        description="get-all-books",
 *    ),
 * )
 * @OA\POST(
 *     path="/v1/books/create",
 *     tags={"books"},
 *     operationId="create-new-books",
 *     @OA\Response(
 *         response=200,
 *         description="Create a new book",
 *     ),
 *     @OA\RequestBody(
 *         description="Book data in form-data format",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="title",
 *                     type="string",
 *                     description="Title of the book",
 *                 ),
 *                 @OA\Property(
 *                     property="author_id",
 *                     type="integer",
 *                     description="ID of the author",
 *                 ),
 *                 @OA\Property(
 *                     property="book_page",
 *                     type="integer",
 *                     description="Number of pages in the book",
 *                 ),
 *                 @OA\Property(
 *                     property="language",
 *                     type="integer",
 *                     description="ID of the language",
 *                 ),
 *                 @OA\Property(
 *                     property="genre",
 *                     type="integer",
 *                     description="ID of the genre",
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Get(
 *     path="/v1/books/search-books",
 *     tags={"books"},
 *     operationId="SearchBooks",
 *     @OA\Parameter(
 *         name="title",
 *         description="Book title",
 *         @OA\Schema(
 *             type="string",
 *         ),
 *         in="query",
 *         required=false,
 *    ),
 *     @OA\Parameter(
 *         name="minPage",
 *         description="Minimum book page",
 *         @OA\Schema(
 *             type="integer",
 *         minimum=111,
 *         maximum=555
 *         ),
 *         in="query",
 *         required=false,
 *    ),
 *     @OA\Parameter(
 *         name="maxPage",
 *         description="Maximum book page",
 *         @OA\Schema(
 *             type="integer",
 *         minimum=111,
 *         maximum=555
 *         ),
 *         in="query",
 *         required=false,
 *    ),
 *     @OA\Parameter(
 *          name="author_id[]",
 *          description="array of authors",
 *          @OA\Schema(
 *              type="array",
 *              @OA\Items(type="integer"),
 *          ),
 *          in="query",
 *          required=false,
 *          style="form"
 *      ),
 *     @OA\Parameter(
 *          name="language_id[]",
 *          description="array of languages",
 *          @OA\Schema(
 *              type="array",
 *              @OA\Items(type="integer"),
 *          ),
 *          in="query",
 *          required=false,
 *          style="form"
 *      ),
 *     @OA\Parameter(
 *         name="genre",
 *         description="genre",
 *         @OA\Schema(
 *             type="string",
 *             enum={1, 2, 3,4,5}
 *         ),
 *         in="query",
 *         required=false,
 *    ),
 *    @OA\Response(
 *        response=200,
 *        description="",
 *    ),
 * )
 */

class BooksController extends ActiveController {
    public $modelClass = BookProvider::class;

    public function actionSearchBooks()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider;
    }
}