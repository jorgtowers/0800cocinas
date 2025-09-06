<?php
/* @var $this SeccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Secciones',
);

$this->menu=array(
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Secciones<?php echo CHtml::link('Nuevo',array('/admin/secciones/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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