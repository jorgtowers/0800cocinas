<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $model GaleriaCocinasInstaladas */
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
		<?php echo $form->label($model,'descripcion',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'class'=>'span3')); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->label($model,'materiales',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'materiales',array('class'=>'span3','maxlength'=>45)); ?>
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
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->