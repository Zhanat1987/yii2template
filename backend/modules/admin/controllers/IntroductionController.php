<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;

class IntroductionController extends Controller
{
    public function actionWhatIsYii()
    {
        return $this->render('what-is-yii');
    }
}
