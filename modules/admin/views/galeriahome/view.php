<?php
/* @var $this GaleriahomeController */
/* @var $model Galeriahome */

$this->breadcrumbs=array(
	'Galería'=>array('admin'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List Galeriahome', 'url'=>array('index')),
	array('label'=>'Create Galeriahome', 'url'=>array('create')),
	array('label'=>'Update Galeriahome', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete Galeriahome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Galeriahome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Galería #<?php echo $model->idgaleria; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idgaleria',
		'titulo',
		'contenido',
		'activo',
		'created',
		'modified',
	),
)); ?>
