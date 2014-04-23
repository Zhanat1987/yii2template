<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;

class SecurityAndAccessController extends Controller
{
    public function actionAuthorization()
    {
        return $this->render('authorization');
    }
}
