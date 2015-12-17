<?php

use common\models\User;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model User */
/* @var $form ActiveForm */

?>

<div class="user-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php if($model->isNewRecord): ?>
    <?php echo $form->field($model, 'username')->textInput(['maxlength'=>32]); ?>
    <?php else : ?>
    <?php echo $form->field($model, 'username')->textInput(['maxlength'=>32,'readonly'=>'']); ?>
    <?php endif; ?>
    <?php echo $form->field($model, 'nickname')->textInput(['maxlength'=>32]); ?>
    <?php echo $form->field($model, 'password')->passwordInput(['minlength'=>6,'maxlength'=>20]); ?>
    <?php echo $form->field($model, 'password2')->passwordInput(['minlength'=>6,'maxlength'=>20]); ?>
    <?php echo $form->field($model, 'sex')->radioList([User::SEX_MALE => '男',  User::SEX_WOMAN => '女']); ?>
    <?php echo $form->field($model, 'ee')->textInput(['minlength'=>6,'maxlength'=>20]); ?>
    <?php echo $form->field($model, 'phone')->textInput(['minlength'=>6,'maxlength'=>20]); ?>
    <?php echo $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>
    <?php echo $form->field($model, 'avatar')->fileInput() ?>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '增加用户' : '编辑用户', 
            ['class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> 
    </div>
    <?= $form->errorSummary($model) ?>
    <?php $form->end(); ?>
</div>

