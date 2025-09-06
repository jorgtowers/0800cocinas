<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */

$this->breadcrumbs=array(
	'Newsletter'=>array('admin'),
	$model->idnewsletter,
);

$this->menu=array(
	array('label'=>'List Newsletter', 'url'=>array('index')),
	array('label'=>'Create Newsletter', 'url'=>array('create')),
	array('label'=>'Update Newsletter', 'url'=>array('update', 'id'=>$model->idnewsletter)),
	array('label'=>'Delete Newsletter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnewsletter),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Newsletter', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Newsletter #<?php echo $model->idnewsletter; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnewsletter',
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
