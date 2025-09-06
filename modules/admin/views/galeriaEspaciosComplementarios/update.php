<?php
/* @var $this GaleriaEspaciosComplementariosController */
/* @var $model GaleriaEspaciosComplementarios */

$this->breadcrumbs=array(
	'Galería Espacios Complemantarios'=>array('admin'),
	'Actualizar',
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List GaleriaEspaciosComplementarios', 'url'=>array('index')),
	array('label'=>'Create GaleriaEspaciosComplementarios', 'url'=>array('create')),
	array('label'=>'View GaleriaEspaciosComplementarios', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage GaleriaEspaciosComplementarios', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Galería Espacios Complementarios #<?php echo $model->idgaleria; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>