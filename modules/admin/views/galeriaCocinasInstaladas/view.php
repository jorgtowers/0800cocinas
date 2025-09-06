<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $model GaleriaCocinasInstaladas */

$this->breadcrumbs=array(
	'Galeria Cocinas Instaladases'=>array('index'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaCocinasInstaladas', 'url'=>array('index')),
	array('label'=>'Create GaleriaCocinasInstaladas', 'url'=>array('create')),
	array('label'=>'Update GaleriaCocinasInstaladas', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete GaleriaCocinasInstaladas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GaleriaCocinasInstaladas', 'url'=>array('admin')),
);
?>

<h1>View GaleriaCocinasInstaladas #<?php echo $model->idgaleria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idgaleria',
		'titulo',
		'descripcion',
		'materiales',
		'created',
		'modified',
	),
)); ?>
