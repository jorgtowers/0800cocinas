<?php
/* @var $this GaleriaCocinasInstaladasController */
/* @var $model GaleriaCocinasInstaladas */

$this->breadcrumbs=array(
	'Bienvenidos'=>array('admin'),
	ucwords($model->titulo),
);

$this->menu=array(
	array('label'=>'List GaleriaCocinasInstaladas', 'url'=>array('index')),
	array('label'=>'Manage GaleriaCocinasInstaladas', 'url'=>array('admin')),
);
?>

<div class="page-header position-relative">
	<h1>
		Bienvenido - <?php echo ucwords($model->titulo); ?>
	</h1>
</div><!--/.page-header-->

            <?php
            $this->widget( 'xupload.XUpload', array(
                'url' => Yii::app( )->createUrl( "admin/".Yii::app()->getController()->getId()."/upload", array("id"=>$id)),
            	'url_fotos' => Yii::app( )->createUrl( "admin/".Yii::app()->getController()->getId()."/subidas", array("id"=>$id)),
                //our XUploadForm
                'model' => $photos,
                //We set this for the widget to be able to target our own form
                'htmlOptions' => array('id'=>'photos-form'),
                'attribute' => 'file',
                'multiple' => true,
				'options' => array(
					//'maxNumberOfFiles'=>8,
					//'maxFileSize' => 3000000,
					'acceptFileTypes' => "js:/(\.|\/)(jpe?g|png|gif|bmp)$/i",
				),
                //Note that we are using a custom view for our widget
                //Thats becase the default widget includes the 'form' 
                //which we don't want here
                //'formView' => 'application.views.somemodel._form',
			)    
            );
            ?>
