<?php
/* @var $this yii\web\View */
$this->title = 'Главная';

$user = \app\models\User::findOne(Yii::$app->user->id);


?>

<div class="site-index">
 <h2>Добро пожаловать, <?php if ($user->name != '' && $user->lname != '') echo $user->name.' '.$user->lname; else echo $user->username;?>!</h2>
 <h2> Вы вошли как <?= Yii::$app->user->can('admin') ? 'администратор' : 'пользователь';?>.</h2>
</div>
