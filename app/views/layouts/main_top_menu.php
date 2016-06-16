
<?php echo \yii\bootstrap\Nav::widget([
    'options' => ['class' =>'navbar-right top-nav'],
    'items'=>[
        [
            'label'=>'Выход',
            'url'=>['site/logout'],
            'visible'=>!Yii::$app->user->isGuest, // only authorize users
        ],
        [
            'label'=>'Войти',
            'url'=>['site/login'],
            'visible'=>Yii::$app->user->isGuest, // only guests
        ],
    ],


]);
