<?php
/* @var $this MaterialesGaleriaController */
/* @var $model MaterialesGaleria */

$this->breadcrumbs=array(
	'Materiales'=>array('materiales/admin'),
	'Galería',
);

$this->menu=array(
	array('label'=>'List MaterialesGaleria', 'url'=>array('index')),
	array('label'=>'Create MaterialesGaleria', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#materiales-galeria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
	<h1>
		Galería<?php echo CHtml::link('Nuevo',array('/admin/materialesGaleria/create/material/'.$material),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'materiales-galeria-grid',
	'dataProvider'=>$model->search(array('condition'=>'idmaterial='.$material)),
	'columns'=>array(
		'titulo',
		array(
			'name'=>'prioridad',
			'htmlOptions'=>array('width'=>'50px'),
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{galeria}{galeria-selec}{view}{update}{delete}',
			'buttons' => array(
				'update' => array(
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/update", array("material"=>$data->idmaterial,"id"=>$data->idgaleria))',
				),
				'delete' => array(
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/delete", array("material"=>$data->idmaterial,"id"=>$data->idgaleria))',
				),
				'galeria' => array(
					'label'=> '',
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/galeria", array("material"=>$data->idmaterial,"id"=>$data->idgaleria))',
					'imageUrl' => Yii::app()->theme->baseUrl."/img/galeria.png",
					'options' => array('title' => 'Galeria'),
				),
				'galeria-selec' => array(
					'label'=> '',
					'url' => 'Yii::app()->createUrl("admin/'.Yii::app()->getController()->getId().'/galeriaseleccion", array("material"=>$data->idmaterial,"id"=>$data->idgaleria))',
					'imageUrl' => Yii::app()->theme->baseUrl."/img/galeria-selec.png",
					'options' => array('title' => 'Galeria Seleccion'),
				),
			),
			'htmlOptions'=>array('width'=>'80px'),
		),
	),
)); ?>
