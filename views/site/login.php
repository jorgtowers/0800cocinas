<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/pages/signin.css" rel="stylesheet" type="text/css">
<div class="account-container">
	
	<div class="content clearfix">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

			<h1>Iniciar Sesión</h1>		
			
			<div class="login-fields">
				
				<p>Complete los campos</p>
				
				<div class="field">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username',array('placeholder'=>'Usuario','class'=>'login username-field')); ?>
					<?php echo $form->error($model,'username'); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña','class'=>'login password-field')); ?>
					<?php echo $form->error($model,'password'); ?>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<?php echo $form->checkBox($model,'rememberMe',array('class'=>'field login-checkbox', 'value'=>'First Choice', 'tabindex'=>'4')); ?>
					<?php echo $form->label($model,'rememberMe',array('class'=>'choice')); ?>
					<?php echo $form->error($model,'rememberMe'); ?>
				</span>
									
				<?php echo CHtml::submitButton('Aceptar',array('class'=>'button btn btn-primary btn-large')); ?>
				
			</div> <!-- .actions -->
			
		<?php $this->endWidget(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="#">Olvidó su contraseña</a>
</div> <!-- /login-extra -->


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/signin.js"></script>