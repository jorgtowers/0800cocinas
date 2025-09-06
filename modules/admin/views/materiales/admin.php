<?php
/* @var $this MaterialesController */
/* @var $model Materiales */

$this->breadcrumbs=array(
	'Materiales',
);

$this->menu=array(
	array('label'=>'List Materiales', 'url'=>array('index')),
	array('label'=>'Create Materiales', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#materiales-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Materiales<?php echo CHtml::link('Nuevo',array('/admin/materiales/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'materiales-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'value'=>'CHtml::link($data->titulo, Yii::app()->createUrl("admin/materialesGaleria/admin",array("material"=>$data->idmaterial)))',
			'name'=>'titulo',
		),
		'activo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
