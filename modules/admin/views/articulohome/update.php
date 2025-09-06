<?php
/* @var $this ArticulohomeController */
/* @var $model Articulohome */

$this->breadcrumbs=array(
	'Artículos'=>array('admin'),
	'Actualizar',
	$model->idarticulo,
);

$this->menu=array(
	array('label'=>'List Articulohome', 'url'=>array('index')),
	array('label'=>'Create Articulohome', 'url'=>array('create')),
	array('label'=>'View Articulohome', 'url'=>array('view', 'id'=>$model->idarticulo)),
	array('label'=>'Manage Articulohome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Artículo #<?php echo $model->idarticulo; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>