<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('admin'),
	'Actualizar',
	$model->idsecciones,
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'View Secciones', 'url'=>array('view', 'id'=>$model->idsecciones)),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Sección #<?php echo $model->idsecciones; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>