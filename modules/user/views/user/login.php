<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->layout='//layouts/login';
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div id="breadcrumbs"></div>

<div id="page-content" class="clearfix">
	<div class="page-header position-relative">
		<h1>
			Iniciar Sesión
		</h1>
	</div><!--/.page-header-->
	<br/>
	<div class="row-fluid">
		<!--PAGE CONTENT BEGINS HERE-->
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions' => array(
				'class'=>'form-horizontal',
			)
		)); ?>

				<div class="control-group">
					<?php echo $form->label($model,'username',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'username'); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>
				</div>

				<div class="control-group">
					<?php echo $form->label($model,'password',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->passwordField($model,'password'); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->label($model,'rememberMe',array('class'=>'lbl')); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
								<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
					</div>
				</div>
			<div class="form-actions">
				
									
				<?php echo CHtml::submitButton('Aceptar',array('class'=>'button btn btn-primary')); ?>
				
			</div> <!-- .actions -->
			
		<?php $this->endWidget(); ?>
		
		<!--PAGE CONTENT ENDS HERE-->
	</div><!--/row-->
</div><!--/#page-content-->