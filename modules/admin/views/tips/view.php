<?php
/* @var $this TipsController */
/* @var $model Tips */

$this->breadcrumbs=array(
	'Tips'=>array('admin'),
	$model->idtip,
);

$this->menu=array(
	array('label'=>'List Tips', 'url'=>array('index')),
	array('label'=>'Create Tips', 'url'=>array('create')),
	array('label'=>'Update Tips', 'url'=>array('update', 'id'=>$model->idtip)),
	array('label'=>'Delete Tips', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtip),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Tip #<?php echo $model->idtip; ?>
	</h1>
</div><!--/.page-header-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtip',
		'contenido',
		'activo',
		'created',
		'modified',
	),
)); ?>
