<?php
/* @var $this GaleriaVideosController */
/* @var $model GaleriaVideos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'galeria-videos-form',
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
		<?php echo $form->label($model,'url',array('class'=>'control-label','label'=>'Id de Video <span class="required"> *</span>')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'url',array('class'=>'span3','maxlength'=>20)); ?>
			<br /><span style="font-size:12px;">https://www.youtube.com/watch?v=<b>VIDEO_ID</b></span>
			<?php echo $form->error($model,'url'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'autor',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'autor',array('class'=>'span3','maxlength'=>255)); ?>
			<?php echo $form->error($model,'autor'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'descripcion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('class'=>'span3','rows'=>6)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
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

	<div class="control-group">
		<?php echo $form->label($model,'home',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model,'home'); ?>
			<?php echo $form->label($model,'',array('class'=>'lbl')); ?>
			<?php echo $form->error($model,'home'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'button btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->