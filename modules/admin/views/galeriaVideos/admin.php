<?php
/* @var $this GaleriaVideosController */
/* @var $model GaleriaVideos */

$this->breadcrumbs=array(
	'Galería Videos',
);

$this->menu=array(
	array('label'=>'List GaleriaVideos', 'url'=>array('index')),
	array('label'=>'Create GaleriaVideos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#galeria-videos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Galería Videos<?php echo CHtml::link('Nuevo',array('/admin/galeriaVideos/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'galeria-videos-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'titulo',
		array(
			'name'=>'home',
			'htmlOptions'=>array('width'=>'50px','align'=>'center'),
		),
		array(
			'name'=>'activo',
			'htmlOptions'=>array('width'=>'50px','align'=>'center'),
		),
		array(
			'name'=>'prioridad',
			'htmlOptions'=>array('width'=>'50px'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{galeria}{view}{update}{delete}',
			'buttons' => array(
				'galeria' => array(
					'label'=> '',
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/galeria", array("id"=>$data->idgaleria))',
					'imageUrl' => Yii::app()->theme->baseUrl."/img/galeria.png",
					'options' => array('title' => 'Galeria'),
					
				),
			),
			'htmlOptions'=>array('width'=>'70px'),
		),
	),
)); ?>
