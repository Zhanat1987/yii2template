<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.04.14
 * Time: 16:08
 */

namespace backend\widgets;

use yii\base\Widget;

class BreadCrumbs extends Widget
{

    public function run()
    {
        return $this->render('breadcrumbs');
    }

} 