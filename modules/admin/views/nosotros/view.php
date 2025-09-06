<?php
/* @var $this NosotrosController */
/* @var $model Nosotros */

$this->breadcrumbs=array(
	'Nosotros'=>array('admin'),
	$model->idnosotros,
);

$this->menu=array(
	array('label'=>'List Nosotros', 'url'=>array('index')),
	array('label'=>'Create Nosotros', 'url'=>array('create')),
	array('label'=>'Update Nosotros', 'url'=>array('update', 'id'=>$model->idnosotros)),
	array('label'=>'Delete Nosotros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnosotros),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nosotros', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nosotros #<?php echo $model->idnosotros; ?>
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
