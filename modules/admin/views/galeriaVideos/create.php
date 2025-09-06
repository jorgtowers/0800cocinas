<?php
/* @var $this GaleriaVideosController */
/* @var $model GaleriaVideos */

$this->breadcrumbs=array(
	'Galería Videos'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List GaleriaVideos', 'url'=>array('index')),
	array('label'=>'Manage GaleriaVideos', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Nueva Galería Videos <small class="note">Los campos con <span class="required">*</span> son requeridos.</small>
	</h1>
</div><!--/.page-header-->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>