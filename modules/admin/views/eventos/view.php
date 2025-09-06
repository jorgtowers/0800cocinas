<?php
/* @var $this EventosController */
/* @var $model Eventos */

$this->breadcrumbs=array(
	'Eventos'=>array('admin'),
	$model->idevento,
);

$this->menu=array(
	array('label'=>'List Eventos', 'url'=>array('index')),
	array('label'=>'Create Eventos', 'url'=>array('create')),
	array('label'=>'Update Eventos', 'url'=>array('update', 'id'=>$model->idevento)),
	array('label'=>'Delete Eventos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idevento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Eventos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Evento #<?php echo $model->idevento; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idevento',
		'titulo',
		'subtitulo',
		'contenido',
		'fecha_evento',
		'fuente',
		'fecha_publicacion',
		'activo',
		'created',
		'modified',
	),
)); ?>
