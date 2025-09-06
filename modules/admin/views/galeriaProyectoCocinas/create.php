<?php
/* @var $this GaleriaProyectoCocinasController */
/* @var $model GaleriaProyectoCocinas */

$this->breadcrumbs=array(
	'Galería Proyectos Cocinas'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List GaleriaProyectoCocinas', 'url'=>array('index')),
	array('label'=>'Manage GaleriaProyectoCocinas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nueva Galería Proyectos Cocinas <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>