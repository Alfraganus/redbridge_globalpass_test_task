<?php

namespace app\modules\v1\controllers;

use app\modules\v1\authors\models\Authors;
use app\modules\v1\books\models\provider\BookProvider;
use app\modules\v1\books\models\search\BooksSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * @OA\Get(
 *     path="/v1/author/",
 *     tags={"author"},
 *     operationId="get-all-authors",
 *    @OA\Response(
 *        response=200,
 *        description="get-all-books",
 *    ),
 * )
 * @OA\POST(
 *     path="/v1/author/create",
 *     tags={"author"},
 *     operationId="create-new-author",
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
 *                     property="name",
 *                     type="string",
 *                     description="Name of the Author",
 *                 ),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Put(
 *     path="/v1/author/update",
 *     summary="Update author information",
 *     tags={"author"},
 *     operationId="updateAuthor",
 *     @OA\Parameter(
 *         name="id",
 *         in="query",
 *         required=true,
 *         description="ID of the author to be updated",
 *         @OA\Schema(type="integer"),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Author updated successfully",
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Author not found",
 *     ),
 *     @OA\RequestBody(
 *         description="Author data in form-data format",
 *         required=true,
 *         @OA\MediaType(
 *          mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Updated name of the author",
 *                 ),
 *             ),
 *         ),
 *     ),
 * )
 */

class AuthorController extends ActiveController {
    public $modelClass = Authors::class;

    public function actionSearchBooks()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider;
    }
}