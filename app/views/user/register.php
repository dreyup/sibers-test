<?php
/* @var \yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';
?>

<div class="form" style="width: 50%">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>

    <?php echo $form->field($model, 'username'); ?>
    <?php echo $form->field($model, 'password_new')->passwordInput(); ?>

    <div class="button-wrapper row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo Html::submitButton('Зарегистрироваться', ['class'=>'btn btn-primary']); ?>
            <?php echo Html::a('Назад', Url::home(), ['class'=>'btn btn-default']); ?>
        </div>
    </div>

    <?php $form->end(); ?>
</div>
