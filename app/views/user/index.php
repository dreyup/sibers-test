<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

?>

<p><?php echo Html::a('Добавить', ['create'], ['class'=>'btn btn-primary']); ?></p>

<?php echo \yii\grid\GridView::widget([
    'dataProvider'=>$dataProvider,
    'summary'=>false,
    'columns'=>[
        'id',
        'username',
        'name',
        'lname',
        'male_female',
        'role',
        'created',
        [
            'class'=>\yii\grid\ActionColumn::className(),
            'options'=>['style'=>'width:50px;'],
            'template'=>'{update} {delete}',
        ]
    ]
]); ?>
