<?php
/* @var $this NosotrosController */
/* @var $model Nosotros */

$this->breadcrumbs=array(
	'Nosotros'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Nosotros', 'url'=>array('index')),
	array('label'=>'Manage Nosotros', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Nosotros <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>