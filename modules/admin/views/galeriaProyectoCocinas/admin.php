<?php
/* @var $this GaleriaProyectoCocinasController */
/* @var $model GaleriaProyectoCocinas */

$this->breadcrumbs=array(
	'Galería Proyectos Cocinas',
);

$this->menu=array(
	array('label'=>'List GaleriaProyectoCocinas', 'url'=>array('index')),
	array('label'=>'Create GaleriaProyectoCocinas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#galeria-proyecto-cocinas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Galería Proyectos Cocinas<?php echo CHtml::link('Nuevo',array('/admin/galeriaProyectoCocinas/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'galeria-proyecto-cocinas-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'titulo',
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
