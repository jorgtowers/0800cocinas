<?php
/* @var $this NosotrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nosotros',
);

$this->menu=array(
	array('label'=>'Create Nosotros', 'url'=>array('create')),
	array('label'=>'Manage Nosotros', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nosotros<?php echo CHtml::link('Nuevo',array('/admin/nosotros/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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