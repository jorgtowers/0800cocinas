<?php
/* @var $this ArticulosController */
/* @var $model Articulos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulos-form',
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
		<?php echo $form->label($model,'subtitulo',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'subtitulo',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'subtitulo'); ?>
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
		<?php echo $form->label($model,'fuente',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fuente',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'fuente'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'fecha_publicacion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fecha_publicacion',array('class'=>'span3' ,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'fecha_publicacion'); ?>
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