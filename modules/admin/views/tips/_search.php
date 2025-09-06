<?php
/* @var $this TipsController */
/* @var $model Tips */
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
		<?php echo $form->label($model,'contenido',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'contenido',array('class'=>'span3','maxlength'=>45)); ?>
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