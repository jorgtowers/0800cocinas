<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $model GaleriaCocinasInstaladas */

$this->breadcrumbs=array(
	'Galería Cocinas Instaladases'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List GaleriaCocinasInstaladas', 'url'=>array('index')),
	array('label'=>'Manage GaleriaCocinasInstaladas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nueva Galería Cocinas Instaladas <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>