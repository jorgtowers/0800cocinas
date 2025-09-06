<?php
/* @var $this BienvenidosController */
/* @var $model Bienvenidos */

$this->breadcrumbs=array(
	'Bienvenidos'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Bienvenidos', 'url'=>array('index')),
	array('label'=>'Manage Bienvenidos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Bienvenido <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>