<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */

$this->breadcrumbs=array(
	'Newsletter'=>array('admin'),
	'Actualizar',
	$model->idnewsletter,
);

$this->menu=array(
	array('label'=>'List Newsletter', 'url'=>array('index')),
	array('label'=>'Create Newsletter', 'url'=>array('create')),
	array('label'=>'View Newsletter', 'url'=>array('view', 'id'=>$model->idnewsletter)),
	array('label'=>'Manage Newsletter', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Actualizar Newsletter #<?php echo $model->idnewsletter; ?><small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>