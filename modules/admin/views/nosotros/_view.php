<?php
/* @var $this NosotrosController */
/* @var $data Nosotros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnosotros')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnosotros), array('view', 'id'=>$data->idnosotros)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subtitulo')); ?>:</b>
	<?php echo CHtml::encode($data->subtitulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuente')); ?>:</b>
	<?php echo CHtml::encode($data->fuente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_publicacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_publicacion); ?>
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