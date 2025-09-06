<?php
/* @var $this BienvenidosController */
/* @var $model Bienvenidos */

$this->breadcrumbs=array(
	'Bienvenidos'=>array('admin'),
	$model->idbienvenido,
);

$this->menu=array(
	array('label'=>'List Bienvenidos', 'url'=>array('index')),
	array('label'=>'Create Bienvenidos', 'url'=>array('create')),
	array('label'=>'Update Bienvenidos', 'url'=>array('update', 'id'=>$model->idbienvenido)),
	array('label'=>'Delete Bienvenidos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idbienvenido),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bienvenidos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Bienvenido #<?php echo $model->idbienvenido; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idbienvenido',
		'titulo',
		'subtitulo',
		'contenido',
		'fuente',
		'fecha_publicacion',
		'activo',
		'created',
		'modified',
	),
)); ?>
