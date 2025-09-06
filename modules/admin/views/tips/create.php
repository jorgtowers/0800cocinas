<?php
/* @var $this TipsController */
/* @var $model Tips */

$this->breadcrumbs=array(
	'Tips'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Tips', 'url'=>array('index')),
	array('label'=>'Manage Tips', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nuevo Tip <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>