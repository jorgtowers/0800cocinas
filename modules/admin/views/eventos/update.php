<?php
/* @var $this EventosController */
/* @var $model Eventos */

$this->breadcrumbs=array(
	'Eventos'=>array('admin'),
	'Actualizar',
	$model->idevento,
);

$this->menu=array(
	array('label'=>'List Eventos', 'url'=>array('index')),
	array('label'=>'Create Eventos', 'url'=>array('create')),
	array('label'=>'View Eventos', 'url'=>array('view', 'id'=>$model->idevento)),
	array('label'=>'Manage Eventos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Evento #<?php echo $model->idevento; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>