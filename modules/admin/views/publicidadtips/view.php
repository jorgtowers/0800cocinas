<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $model GaleriaEspaciosComplementarios */

$this->breadcrumbs=array(
	'Publicidad Tips'=>array('index'),
	$model->idpublicidad,
);

$this->menu=array(
	array('label'=>'List GaleriaEspaciosComplementarios', 'url'=>array('index')),
	array('label'=>'Create GaleriaEspaciosComplementarios', 'url'=>array('create')),
	array('label'=>'Update GaleriaEspaciosComplementarios', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete GaleriaEspaciosComplementarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GaleriaEspaciosComplementarios', 'url'=>array('admin')),
);
?>

<h1>Publicidad Tips #<?php echo $model->idgaleria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpublicidad',
		'titulo',
		'descripcion',
		'url',
 		'fecha_inicio',
 		'fecha_fin',
		'activo',
		'created',
		'modified',
	),
)); ?>
