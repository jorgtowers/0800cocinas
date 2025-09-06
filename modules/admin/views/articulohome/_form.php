<?php
/* @var $this ArticulohomeController */
/* @var $model Articulohome */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulohome-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	)
)); ?>
<?php echo $form->errorSummary($model); ?>
	<div class="control-group">
		<?php echo $form->label($model,'titulo'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'titulo',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'url'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'url',array('class'=>'span3','maxlength'=>255)); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'contenido'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'contenido',array('rows'=>6, 'class'=>'span3')); ?>
			<?php echo $form->error($model,'contenido'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'activo',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model,'activo'); ?>
			<?php echo $form->label($model,'',array('class'=>'lbl')); ?>
			<?php echo $form->error($model,'activo'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'button btn btn-primary')); ?>
	</div> <!-- .actions -->

<?php $this->endWidget(); ?>

</div><!-- form -->