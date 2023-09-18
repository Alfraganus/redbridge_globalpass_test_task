<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\provider\BookProvider;
use yii\rest\ActiveController;

/**
 * @OA\Info(title="GLOBALPAS API-list", version="1.0")
 * @OA\Get(
 *     path="/v1/get-books/",
 *     tags={"books"},
 *     operationId="get-all-books",
 *    @OA\Response(
 *        response=200,
 *        description="get-all-books",
 *    ),
 * )
 * @OA\POST(
 *     path="/v1/create-books/",
 *     tags={"books"},
 *     operationId="create-new-books",
 *    @OA\Response(
 *        response=200,
 *        description="create a new book",
 *    ),
 * )
 */


class GetBooksController extends ActiveController {

    public $modelClass = BookProvider::class;

}