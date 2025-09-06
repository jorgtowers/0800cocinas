<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array(
		'class'=>'form-horizontal',
	)
)); ?>

	<div class="control-group">
		<?php echo $form->label($model,'titulo',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'titulo',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'subtitulo',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'subtitulo',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'contenido',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'contenido',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'fuente',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fuente',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'fecha_publicacion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'fecha_publicacion',array('class'=>'span3' ,'maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'activo',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->checkBox($model,'activo'); ?>
			<?php echo $form->label($model,'',array('class'=>'lbl')); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'button btn btn-primary')); ?>
	</div> <!-- .actions -->

<?php $this->endWidget(); ?>

</div><!-- search-form -->