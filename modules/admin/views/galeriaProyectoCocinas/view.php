<?php
/* @var $this GaleriaProyectoCocinasController */
/* @var $model GaleriaProyectoCocinas */

$this->breadcrumbs=array(
	'Galeria Proyectos Cocinas'=>array('index'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaProyectoCocinas', 'url'=>array('index')),
	array('label'=>'Create GaleriaProyectoCocinas', 'url'=>array('create')),
	array('label'=>'Update GaleriaProyectoCocinas', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete GaleriaProyectoCocinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GaleriaProyectoCocinas', 'url'=>array('admin')),
);
?>

<h1>View GaleriaProyectoCocinas #<?php echo $model->idgaleria; ?></h1>

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
