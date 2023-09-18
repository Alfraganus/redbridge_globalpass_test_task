<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Books;
use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
