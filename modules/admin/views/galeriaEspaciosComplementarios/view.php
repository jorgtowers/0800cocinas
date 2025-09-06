<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $model GaleriaEspaciosComplementarios */

$this->breadcrumbs=array(
	'Galería Espacios Instalados'=>array('index'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaEspaciosComplementarios', 'url'=>array('index')),
	array('label'=>'Create GaleriaEspaciosComplementarios', 'url'=>array('create')),
	array('label'=>'Update GaleriaEspaciosComplementarios', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete GaleriaEspaciosComplementarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GaleriaEspaciosComplementarios', 'url'=>array('admin')),
);
?>

<h1>View GaleriaEspaciosComplementarios #<?php echo $model->idgaleria; ?></h1>

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
