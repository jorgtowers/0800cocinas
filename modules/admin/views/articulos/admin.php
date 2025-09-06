<?php
/* @var $this ArticulosController */
/* @var $model Articulos */

$this->breadcrumbs=array(
	'Artículos',
);

$this->menu=array(
	array('label'=>'List Articulos', 'url'=>array('index')),
	array('label'=>'Create Articulos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#articulos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Artículos<?php echo CHtml::link('Nuevo',array('/admin/articulos/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articulos-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'titulo',
		'activo',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{galeria}{view}{update}{delete}',
			'buttons' => array(
				'galeria' => array(
					'label'=> '',
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/galeria", array("id"=>$data->idarticulo))',
					'imageUrl' => Yii::app()->theme->baseUrl."/img/galeria.png",
					'options' => array('title' => 'Galeria'),
					
				),
			),
			'htmlOptions'=>array('width'=>'70px'),
		),
	),
)); ?>
