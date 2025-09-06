<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Galería Cocinas Instaladases',
);

$this->menu=array(
	array('label'=>'Create GaleriaCocinasInstaladas', 'url'=>array('create')),
	array('label'=>'Manage GaleriaCocinasInstaladas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Galería Cocinas Instaladas<?php echo CHtml::link('Nuevo',array('/admin/galeriaCocinasInstaladas/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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