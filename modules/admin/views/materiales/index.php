<?php
/* @var $this MaterialesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Materiales',
);

$this->menu=array(
	array('label'=>'Create Materiales', 'url'=>array('create')),
	array('label'=>'Manage Materiales', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Materiales<?php echo CHtml::link('Nuevo',array('/admin/materiales/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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