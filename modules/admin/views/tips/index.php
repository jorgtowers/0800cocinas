<?php
/* @var $this TipsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tips',
);

$this->menu=array(
	array('label'=>'Create Tips', 'url'=>array('create')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Tips<?php echo CHtml::link('Nuevo',array('/admin/tips/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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