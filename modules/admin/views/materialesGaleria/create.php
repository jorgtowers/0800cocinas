<?php
/* @var $this MaterialesGaleriaController */
/* @var $model MaterialesGaleria */

$this->breadcrumbs=array(
	'Materiales'=>array('materiales/admin'),
	'Galería'=>array('admin','material'=>$material),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List MaterialesGaleria', 'url'=>array('index')),
	array('label'=>'Manage MaterialesGaleria', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nueva Galería <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>