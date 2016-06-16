<?php
/* @var \yii\web\View $this */
/* @var \app\models\User $model */

use yii\helpers\Html;

$this->title = $model->isNewRecord ? 'Новый пользователь' : 'Изменение '.$model->username;

$this->params['breadcrumbs'][] = ['label'=>'Пользователи', 'url'=>['user/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="form" style="width: 50%">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>
    <?php echo $form->field($model, 'username'); ?>
    <?php echo $form->field($model, 'password_new')->passwordInput(); ?>
    <?php echo $form->field($model, 'name'); ?>
    <?php echo $form->field($model, 'lname'); ?>
    <?php echo $form->field($model, 'male_female')->dropDownList($model::polValues(), ['prompt'=>'- выберите -']); ?>
    <?php echo $form->field($model, 'role')->dropDownList($model::roleValues(), ['prompt'=>'- выберите -']); ?>

    <div class="button-wrapper row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo Html::submitButton('Сохранить', ['class'=>'btn btn-primary']); ?>
            <?php echo Html::a('Назад', ['index'], ['class'=>'btn btn-default']); ?>
        </div>
    </div>

    <?php $form->end(); ?>
</div>
