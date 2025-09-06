<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $model GaleriaCocinasInstaladas */

$this->breadcrumbs=array(
	'Galería Cocinas Instaladases'=>array('admin'),
	'Actualizar',
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaCocinasInstaladas', 'url'=>array('index')),
	array('label'=>'Create GaleriaCocinasInstaladas', 'url'=>array('create')),
	array('label'=>'View GaleriaCocinasInstaladas', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage GaleriaCocinasInstaladas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Galería Cocinas Instaladas #<?php echo $model->idgaleria; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>