<?php
/* @var $this GaleriaVideosController */
/* @var $model GaleriaVideos */

$this->breadcrumbs=array(
	'Galeria Videos'=>array('index'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaVideos', 'url'=>array('index')),
	array('label'=>'Create GaleriaVideos', 'url'=>array('create')),
	array('label'=>'Update GaleriaVideos', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete GaleriaVideos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GaleriaVideos', 'url'=>array('admin')),
);
?>

<h1>View GaleriaVideos #<?php echo $model->idgaleria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idgaleria',
		'titulo',
		'url',
		'autor',
		'descripcion',
		'created',
		'modified',
	),
)); ?>
