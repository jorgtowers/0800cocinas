<?php
/* @var $this GaleriaProyectoCocinasController */
/* @var $model GaleriaProyectoCocinas */

$this->breadcrumbs=array(
	'Galería Proyectos Cocinas'=>array('admin'),
	'Actualizar',
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaProyectoCocinas', 'url'=>array('index')),
	array('label'=>'Create GaleriaProyectoCocinas', 'url'=>array('create')),
	array('label'=>'View GaleriaProyectoCocinas', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage GaleriaProyectoCocinas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Galería Proyectos Cocinas #<?php echo $model->idgaleria; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>