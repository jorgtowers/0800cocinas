<?php
/* @var $this NosotrosController */
/* @var $model Nosotros */

$this->breadcrumbs=array(
	'Nosotros',
);

$this->menu=array(
	array('label'=>'List Nosotros', 'url'=>array('index')),
	array('label'=>'Create Nosotros', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#nosotros-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Nosotros<?php echo CHtml::link('Nuevo',array('/admin/nosotros/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'nosotros-grid',
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
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/galeria", array("id"=>$data->idnosotros))',
					'imageUrl' => Yii::app()->theme->baseUrl."/img/galeria.png",
					'options' => array('title' => 'Galeria'),
					
				),
			),
			'htmlOptions'=>array('width'=>'70px'),
		),
	),
)); ?>
