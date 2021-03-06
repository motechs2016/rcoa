<?php

use common\models\teamwork\CourseManage;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
    
/* @var $model CourseManage */

?>

<div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">移交其它部门</h4>
            </div>
            <div class="modal-body">

                <?php $form = ActiveForm::begin([
                    'options'=>[
                        'id' => 'form-change', 
                        'class'=>'form-horizontal',
                    ],
                    'action'=>'change?id='.$model->id,
                    'fieldConfig' => [  
                        'template' => "{label}\n<div class=\"col-lg-10 col-md-10\">{input}</div>\n<div class=\"col-lg-10 col-md-10\">{error}</div>",  
                        'labelOptions' => [
                            'class' => 'col-lg-2 col-md-2 control-label',
                            'style'=>[
                                'color'=>'#999999',
                                'font-weight'=>'normal',
                                'padding-right' => '0'
                            ]
                        ],  
                    ], 
                ]); ?>
                
                <?= $form->field($model, 'team_id')->widget(Select2::classname(), [
                    'data' => $team, 'hideSearch'=>false, 'options' => ['placeholder' => '请选择...'],
                ])?>
                
                <?= $form->field($model, 'course_principal')->widget(Select2::classname(), [
                    'data' => $coursePrincipal, 'hideSearch'=>false, 'options' => ['placeholder' => '请选择...'],
                ])?>
                
                <?php ActiveForm::end(); ?>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save">确认</button>
            </div>
        </div>
    </div>
</div>