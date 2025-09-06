<?php
/* @var $this SeccionesController */
/* @var $model Secciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'secciones-form',
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
		<?php echo $form->label($model,'descripcion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'class'=>'span3')); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'button btn btn-primary')); ?>
	</div> <!-- .actions -->

<?php $this->endWidget(); ?>

</div><!-- form -->