<?php
/* @var $this NewsletterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Newsletter',
);

$this->menu=array(
	array('label'=>'Create Newsletter', 'url'=>array('create')),
	array('label'=>'Manage Newsletter', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Newsletter<?php echo CHtml::link('Nuevo',array('/admin/newsletter/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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