<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\ErrorException;
use common\myhelpers\Debugger;

/**
 * PthreadsOrg controller
 */
class PthreadsOrgController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLinks()
    {
        return $this->render('links');
    }

}
