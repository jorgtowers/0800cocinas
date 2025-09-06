<?php
/* @var $this EventosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eventos',
);

$this->menu=array(
	array('label'=>'Create Eventos', 'url'=>array('create')),
	array('label'=>'Manage Eventos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Eventos<?php echo CHtml::link('Nuevo',array('/admin/eventos/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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