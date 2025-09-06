<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones',
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#secciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Secciones<?php echo CHtml::link('Nuevo',array('/admin/secciones/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'secciones-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'titulo',
		'activo',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'htmlOptions'=>array('width'=>'70px'),
		),
	),
)); ?>
