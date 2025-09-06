<?php
/* @var $this ArticulohomeController */
/* @var $model Articulohome */

$this->breadcrumbs=array(
	'Artículos'=>array('admin'),
	$model->idarticulo,
);

$this->menu=array(
	array('label'=>'List Articulohome', 'url'=>array('index')),
	array('label'=>'Create Articulohome', 'url'=>array('create')),
	array('label'=>'Update Articulohome', 'url'=>array('update', 'id'=>$model->idarticulo)),
	array('label'=>'Delete Articulohome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idarticulo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Articulohome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Artículo #<?php echo $model->idarticulo; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idarticulo',
		'titulo',
		'url',
		'contenido',
		'activo',
		'created',
		'modified',
	),
)); ?>
