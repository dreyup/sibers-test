<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\forms\LoginForm */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <?php $form = ActiveForm::begin([ // Begin login form
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'layout'=>'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'horizontalCssClasses'=>[
                'offset'=>'col-sm-offset-1'
            ],
        ],
    ]); ?>

    <?php echo $form->field($model, 'username'); ?>
    <?php echo $form->field($model, 'password')->passwordInput(); ?>
    <?php echo $form->field($model, 'rememberMe')->checkbox();?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?php echo Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            &nbsp;
            <?php echo Html::a('Регистрация', ['user/register'], ['class'=>'btn btn-success']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
