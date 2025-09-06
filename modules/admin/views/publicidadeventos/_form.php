<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $model GaleriaEspaciosComplementarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'publicidadeventos-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	)
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'titulo',array('class'=>'control-label','label'=>'Título <span class="required"> *</span>')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'titulo',array('class'=>'span3','maxlength'=>45)); ?>
			<?php echo $form->error($model,'titulo'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'descripcion',array('class'=>'control-label','label'=>'Descripción')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('class'=>'span3','rows'=>6)); ?>
			<?php echo $form->error($model,'descripcion'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'url',array('class'=>'control-label','label'=>'Url <span class="required"> *</span>')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'url',array('class'=>'span3','maxlength'=>255)); ?>
			<?php echo $form->error($model,'url'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'fecha_inicio',array('class'=>'control-label','label'=>'Fecha Inicio')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fecha_inicio',array('class'=>'span3','maxlength'=>10)); ?>
			<?php echo $form->error($model,'fecha_inicio'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->label($model,'fecha_fin',array('class'=>'control-label','label'=>'Fecha Fin')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fecha_fin',array('class'=>'span3','maxlength'=>10)); ?>
			<?php echo $form->error($model,'fecha_fin'); ?>
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