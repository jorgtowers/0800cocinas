<?php
/* @var $this TipsController */
/* @var $data Tips */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtip')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtip), array('view', 'id'=>$data->idtip)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>