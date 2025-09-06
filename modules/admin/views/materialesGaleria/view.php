<?php
/* @var $this MaterialesGaleriaController */
/* @var $model MaterialesGaleria */

$this->breadcrumbs=array(
	'Materiales'=>array('materiales/admin'),
	'Galería'=>array('admin','material'=>$material),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List MaterialesGaleria', 'url'=>array('index')),
	array('label'=>'Create MaterialesGaleria', 'url'=>array('create')),
	array('label'=>'Update MaterialesGaleria', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete MaterialesGaleria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaterialesGaleria', 'url'=>array('admin')),
);
?>

<h1>View MaterialesGaleria #<?php echo $model->idgaleria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idgaleria',
		'titulo',
		'descripcion',
		'materiales',
		'idmaterial',
		'created',
		'modified',
	),
)); ?>
