<?php
use backend\assets\CloudAsset;
use yii\helpers\Html;
use common\myhelpers\Debugger;
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
CloudAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="<?php echo Yii::$app->charset; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <title>
        <?php echo Html::encode($this->title); ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <!--[if lt IE 9]>
        <script src="http://yii2template.backend/cloud/js/flot/excanvas.min.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<?php echo \backend\widgets\Header::widget(); ?>
<!-- PAGE -->
<section id="page">
    <?php echo \backend\widgets\Sidebar::widget(); ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">
                    <!-- PAGE HEADER-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                <?php echo \backend\widgets\BreadCrumbs::widget(); ?>
                                <div class="clearfix">
                                    <h3 class="content-title pull-left">
                                        <?php echo Html::encode($this->title); ?>
                                    </h3>
                                </div>
                                <div class="description">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/PAGE -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>