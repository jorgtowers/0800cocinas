<?php
/* @var $this MaterialesGaleriaController */
/* @var $data MaterialesGaleria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idgaleria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idgaleria), array('view', 'id'=>$data->idgaleria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('materiales')); ?>:</b>
	<?php echo CHtml::encode($data->materiales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmaterial')); ?>:</b>
	<?php echo CHtml::encode($data->idmaterial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>