<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Artículos'=>array('admin'),
	$model->idarticulo,
);

$this->menu=array(
	array('label'=>'List Articulos', 'url'=>array('index')),
	array('label'=>'Create Articulos', 'url'=>array('create')),
	array('label'=>'Update Articulos', 'url'=>array('update', 'id'=>$model->idarticulo)),
	array('label'=>'Delete Articulos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idarticulo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Articulos', 'url'=>array('admin')),
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
		'subtitulo',
		'contenido',
		'fuente',
		'fecha_publicacion',
		'activo',
		'created',
		'modified',
	),
)); ?>
