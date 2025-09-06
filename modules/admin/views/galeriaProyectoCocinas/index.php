<?php
/* @var $this GaleriaProyectoCocinasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Galería Proyectos Cocinas',
);

$this->menu=array(
	array('label'=>'Create GaleriaProyectoCocinas', 'url'=>array('create')),
	array('label'=>'Manage GaleriaProyectoCocinas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Galería Proyectos Cocinas<?php echo CHtml::link('Nuevo',array('/admin/galeriaProyectoCocinas/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
	</h1>
	
</div><!--/.page-header-->

<div class="row-fluid">
	<!--PAGE CONTENT BEGINS HERE-->
	
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	
	<!--PAGE CONTENT ENDS HERE-->
</div><!--/row-->