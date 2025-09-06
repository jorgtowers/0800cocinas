<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $model GaleriaEspaciosComplementarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'galeria-espacios-complementarios-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	)
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'titulo'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'titulo',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'descripcion'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('class'=>'span3','rows'=>6)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'materiales'.'<span class="required"> *</span>',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'materiales',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'materiales'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'prioridad',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'prioridad',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'prioridad'); ?>
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
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->