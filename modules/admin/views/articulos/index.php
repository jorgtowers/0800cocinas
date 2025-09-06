<?php
/* @var $this ArticulosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artículos',
);

$this->menu=array(
	array('label'=>'Create Articulos', 'url'=>array('create')),
	array('label'=>'Manage Articulos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Artículos<?php echo CHtml::link('Nuevo',array('/admin/articulos/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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