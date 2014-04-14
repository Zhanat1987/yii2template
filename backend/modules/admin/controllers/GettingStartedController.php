<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;

class GettingStartedController extends Controller
{
    public function actionUpgradeFromV1()
    {
        return $this->render('upgrade-from-v1');
    }
}
