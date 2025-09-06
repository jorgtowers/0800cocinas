<?php
/* @var $this BienvenidosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bienvenidos',
);

$this->menu=array(
	array('label'=>'Create Bienvenidos', 'url'=>array('create')),
	array('label'=>'Manage Bienvenidos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Bienvenidos<?php echo CHtml::link('Nuevo',array('/admin/bienvenidos/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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