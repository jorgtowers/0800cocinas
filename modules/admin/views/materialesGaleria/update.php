<?php
/* @var $this MaterialesGaleriaController */
/* @var $model MaterialesGaleria */

$this->breadcrumbs=array(
	'Materiales Galerías'=>array('index'),
	$model->idgaleria=>array('view','id'=>$model->idgaleria),
	'Update',
);

$this->menu=array(
	array('label'=>'List MaterialesGaleria', 'url'=>array('index')),
	array('label'=>'Create MaterialesGaleria', 'url'=>array('create')),
	array('label'=>'View MaterialesGaleria', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage MaterialesGaleria', 'url'=>array('admin')),
);
?>

<h1>Actualizar Galería <?php echo $model->idgaleria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>