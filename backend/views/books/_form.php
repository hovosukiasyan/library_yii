<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="author-block-textarea">
        <div class="search-author">
            <?php
            $author_ids = '';
            if(!empty($authors)){
                foreach ($authors as $author){
                    $author_ids .= ','.$author['id'];
                    ?>
                    <div class='aItem' data-id='<?= $author['id'];?>'><?= $author['firstName'].' '.$author['lastName'] ;?><span onclick='removeOption(this)'>&#10006;</span></div>
                    <?php
                }

            }
            ?>
            <div class="clearfix"></div>
        </div>
        <div class="author-list-text-inside">
            <input type="text" value="" id="search" >
            <div class="author-items-list-block">

            </div>
        </div>
        <input name="author_id" value="<?= (!empty($author_ids)? $author_ids :'');  ?>" type="hidden" id="author_id" >
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
