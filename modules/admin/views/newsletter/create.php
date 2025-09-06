<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */

$this->breadcrumbs=array(
	'Newsletter'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Newsletter', 'url'=>array('index')),
	array('label'=>'Manage Newsletter', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Newsletter <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>