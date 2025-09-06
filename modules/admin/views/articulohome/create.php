<?php
/* @var $this ArticulohomeController */
/* @var $model Articulohome */

$this->breadcrumbs=array(
	'Artículos'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Articulohome', 'url'=>array('index')),
	array('label'=>'Manage Articulohome', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Artículo <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>