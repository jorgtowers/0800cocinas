<?php
/* @var $this MaterialesController */
/* @var $model Materiales */

$this->breadcrumbs=array(
	'Materiales'=>array('admin'),
	$model->idmaterial,
);

$this->menu=array(
	array('label'=>'List Materiales', 'url'=>array('index')),
	array('label'=>'Create Materiales', 'url'=>array('create')),
	array('label'=>'Update Materiales', 'url'=>array('update', 'id'=>$model->idmaterial)),
	array('label'=>'Delete Materiales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmaterial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Materiales', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Material #<?php echo $model->idmaterial; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmaterial',
		'titulo',
		'descripcion',
		'activo',
		'created',
		'modified',
	),
)); ?>
