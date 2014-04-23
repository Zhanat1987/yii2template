<?php

namespace backend\modules\php54\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJsonSerializable()
    {
        return $this->render('json-serializable');
    }

}
