<?php
/* @var $this MaterialesGaleriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Materiales Galerias',
);

$this->menu=array(
	array('label'=>'Create MaterialesGaleria', 'url'=>array('create')),
	array('label'=>'Manage MaterialesGaleria', 'url'=>array('admin')),
);
?>

<h1>Materiales Galerias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
