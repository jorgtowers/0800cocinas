<?php
/* @var $this GaleriahomeController */
/* @var $model Galeriahome */

$this->breadcrumbs=array(
	'Galería'=>array('admin'),
	'Actualizar',
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List Galeriahome', 'url'=>array('index')),
	array('label'=>'Create Galeriahome', 'url'=>array('create')),
	array('label'=>'View Galeriahome', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage Galeriahome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Galería #<?php echo $model->idgaleria; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>