<?php
/* @var $this SeccionesController */
/* @var $model Secciones */
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
		<?php echo $form->label($model,'url',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'url',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'descripcion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('class'=>'span3','maxlength'=>45)); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Buscar',array('class'=>'button btn btn-primary')); ?>
	</div> <!-- .actions -->

<?php $this->endWidget(); ?>

</div><!-- search-form -->