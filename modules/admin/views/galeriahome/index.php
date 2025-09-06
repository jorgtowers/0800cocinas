<?php
/* @var $this GaleriahomeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Galería',
);

$this->menu=array(
	array('label'=>'Create Galeriahome', 'url'=>array('create')),
	array('label'=>'Manage Galeriahome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Galerías <?php echo CHtml::link('Nuevo',array('/admin/galeriahome/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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