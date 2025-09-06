<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Publicidad Inicio',
);

$this->menu=array(
	array('label'=>'Create GaleriaEspaciosComplementarios', 'url'=>array('create')),
	array('label'=>'Manage GaleriaEspaciosComplementarios', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Publicidad Inicio<?php echo CHtml::link('Nuevo',array('/admin/Publicidadinicio/create'),array('class'=>'button btn btn-primary','style'=>'float:right')); ?>
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