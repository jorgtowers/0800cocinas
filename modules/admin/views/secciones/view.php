<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('admin'),
	$model->idsecciones,
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'Update Secciones', 'url'=>array('update', 'id'=>$model->idsecciones)),
	array('label'=>'Delete Secciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsecciones),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Sección #<?php echo $model->idsecciones; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsecciones',
		'titulo',
		'url',
		'descripcion',
		'created',
		'modified',
	),
)); ?>
