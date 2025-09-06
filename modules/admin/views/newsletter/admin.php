<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */

$this->breadcrumbs = array(
    'Newsletter',
);

$this->menu = array(
    array('label' => 'List Newsletter', 'url' => array('index')),
    array('label' => 'Create Newsletter', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#newsletter-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header position-relative">
    <h1>
        Newsletter<?php echo CHtml::link('Nuevo', array('/admin/newsletter/create'), array('class' => 'button btn btn-primary', 'style' => 'float:right')); ?>
    </h1>

</div><!--/.page-header-->

<?php echo CHtml::link('Búsqueda Avanzada', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'newsletter-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        'titulo',
        'activo',
        array(
            'class' => 'CButtonColumn',
            'template' => '{prueba}{enviar}{galeria}{view}{update}{delete}',
            //'template' => '{enviar}{galeria}{view}{update}{delete}',
            'buttons' => array(
                'enviar' => array(
                    'label' => '',
                    'url' => 'Yii::app()->createUrl("admin/' . Yii::app()->getController()->getId() . '/enviar", array("id"=>$data->idnewsletter))',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/img/email.png",
                    'options' => array('title' => 'Enviar Newsletter'),
                ),
                'prueba' => array(
                    'label' => '',
                    'url' => 'Yii::app()->createUrl("admin/' . Yii::app()->getController()->getId() . '/prueba", array("id"=>$data->idnewsletter))',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/img/email-test.png",
                    'options' => array('title' => 'Probar Newsletter'),
                ),
                'galeria' => array(
                    'label' => '',
                    'url' => 'Yii::app()->createUrl("admin/' . Yii::app()->getController()->getId() . '/galeria", array("id"=>$data->idnewsletter))',
                    'imageUrl' => Yii::app()->theme->baseUrl . "/img/galeria.png",
                    'options' => array('title' => 'Galeria'),
                ),
            ),
            'htmlOptions' => array('width' => '110px'),
        ),
    ),
));
?>
