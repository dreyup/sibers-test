<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">
    <div class="alert alert-danger">
        <?php echo nl2br(Html::encode($message));//Print Error ?>
    </div>

    <p>Все сломалось! Help me!</p>
</div>
