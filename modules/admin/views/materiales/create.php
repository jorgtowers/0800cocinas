<?php
/* @var $this MaterialesController */
/* @var $model Materiales */

$this->breadcrumbs=array(
	'Materiales'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Materiales', 'url'=>array('index')),
	array('label'=>'Manage Materiales', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Material <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>