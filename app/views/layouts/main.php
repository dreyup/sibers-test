<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this->title); ?> | Sibers-test</title>
    <?php $this->head() ?>

    <link href="/fonts/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/sb-admin.css" rel="stylesheet" />
    <link href="/css/project.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Url::home(); ?>"> Sibers-test</a>
        </div>

        <?php echo $this->render('main_top_menu'); ?>

        <?php echo Nav::widget([ // Begin top menu
            'items'=>[
                [
                    'label'=>'<i class="fa fa-fw fa-desktop"></i> Главная',
                    'url'=>['site/index'],
                    'visible'=>!Yii::$app->user->isGuest
                ],
                [
                    'label'=>'<i class="fa fa-fw fa-edit"></i> Пользователи',
                    'url'=>['user/index'],
                    'visible'=>Yii::$app->user->can('admin')
                ],
            ],
            'encodeLabels'=>false,
            'options'=>['class'=>'navbar-nav'],
        ]); ?>
    </div>
</nav>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $this->title; ?></h1>

                <?php echo Breadcrumbs::widget([  // create flash messages
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]); ?>

                <?php if (Yii::$app->session->hasFlash('success')) {
                    echo \yii\bootstrap\Alert::widget([
                        'body'=>Yii::$app->session->getFlash('success'),
                        'options'=>[
                            'class'=>'alert-success'
                        ]
                    ]);
                } ?>

                <?php if (Yii::$app->session->hasFlash('error')) {
                    echo \yii\bootstrap\Alert::widget([
                        'body'=>Yii::$app->session->getFlash('error'),
                        'options'=>[
                            'class'=>'alert-danger'
                        ]
                    ]);
                } ?>

                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
