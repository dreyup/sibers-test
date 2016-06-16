<?php
/* @var $this yii\web\View */
$this->title = 'Добро Пожаловать!';

$user = \app\models\User::find(Yii::$app->user->id);
?>

<div class="site-index">
 <h1> Вы вошли как <?= Yii::$app->user->can('admin') ? 'администратор ' : 'пользователь ';?> </h1>
</div>
