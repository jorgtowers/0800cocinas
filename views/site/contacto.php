<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLZJi0jfgnmb-rl-ttsJPRqBGO7vTNUtQ&sensor=FALSE"></script>
<script type="text/javascript">
	function initialize() {
		var myLatlng = new google.maps.LatLng(10.498783,-66.833696);
		var mapOptions = {
			center: myLatlng,
			zoom: 16,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		var map = new google.maps.Map(document.getElementById("map_canvas"),
			mapOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: '0800cocinas'
		});
	}
	$( document ).ready(function() {
		initialize();
	});
	
	$().ready(function() {
		// validate signup form on keyup and submit
		$("#contacto-form").validate({
			rules: {
				'Contacto[nombre]': "required",
				'Contacto[telefono]': "required",
				'Contacto[email]': {
					required: true,
					email: true
				},
				'Contacto[mensaje]': "required"
			},
			messages: {
				'Contacto[nombre]': "Por favor ingrese su nombre",
				'Contacto[telefono]': "Por favor ingrese su teléfono",
				'Contacto[email]': "Por favor ingrese un email válido",
				'Contacto[mensaje]': "Por favor ingrese su mensaje"
			}
		});
	});
		var onloadCallback = function() {
        grecaptcha.render('captcha_dark', {
          'sitekey' : '6LelPRwUAAAAAG06Cpr8uw3xdscOxjlszbn6rLK9',
          'theme' : 'dark'
        });
        grecaptcha.render('captcha_light', {
          'sitekey' : '6LelPRwUAAAAAG06Cpr8uw3xdscOxjlszbn6rLK9',
          'theme' : 'light'
        });
      };

</script>
<style>
	#contacto-form label.error {
		margin-left: 10px;
		width: auto;
		float: left;
	}
</style>
<div class="cont_der">
    
	<?php echo redes_sociales(); ?>
<div class="secciones_der">
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'recibenovedades-form',
		'enableAjaxValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'action'=>'/recibenovedades/create'
	)); ?>
    
	<div class="fondo_recibe_novedades">
    <div class="titulo_blanco">Recibe nuestras novedades</div>
    <div class="texto_blanco">regístrate y estarás al día con la información</div>
    <div class="fondo_blanco_registro"><?php echo $form->textField($recibenovedades,'email',array('style'=>'border:none;width:250px;height:21px;','maxlength'=>50)); ?><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/email2.png" border="0" style="vertical-align: middle;"/></div>
    <div class="contenedor-captcha">
        <div id="captcha_dark"></div>
	</div>
	<input type="submit" name="submit" value="registrar" class="btn_registro_blanco" style="float: right; background: transparent; border: none;" />
	<!--button
	class="g-recaptcha btn_registro_blanco"
	data-sitekey="6LdS7BsUAAAAAOTJbquvHSXCumrte4EQjCh7KI66"
	data-callback="SubmitForm" style="float: right; background: transparent; border: none;">
	registrar
	</button-->
	<!--div class="btn_registro_blanco" style="cursor: pointer;" onclick="document.getElementById('recibenovedades-form').submit();">registrar</div-->
    </div>
    <?php $this->endWidget(); ?>
</div>
<div class="secciones_der">
<h2 class="titulo_der">Mapa de ubicación</h2>
<div class="mapa" id="map_canvas"></div>
</div>
</div>


	<div class="cont_izq">
    
    <div class="linea_cn_izq"></div>
	<h1 class="titulo">Teléfonos</h1>

<div class="texto_izq_contacto">
  <div class="telefonos0800">0800 cocinas</div>
  <div class="telefonos">0212 286 9550</div>
  <div class="telefonos">0212 285 5501</div>
  <div class="telefonos">0800 262 4627</div>
  <div class="telefonos">0212 286 4255</div>
  <div class="telefonos">0212 286 2758</div>
</div>

	</div>
	
<div class="cont_izq">
    
    <div class="linea_cn_izq"></div>
	<h1 class="titulo">Dirección</h1>

<div class="texto_izq_contacto">
  <div class="direccion">Los Dos Caminos<br />
Av. Sucre con 3ra y 4ta transversal<br />
Quinta la Cuisine - Caracas - Venezuela</div>

</div>

	</div>
    <div class="cont_izq">
    
    <div class="linea_cn_izq"></div>
	<h2 class="titulo">Redes sociales</h2>

<div class="texto_izq_contacto">
  <div class="redessociales_btn_izq"><div class="redessociales_imagen_f1"></div></div><div class="redes">0800 cocinas</div>
  <div class="redessociales_btn_izq"><div class="redessociales_imagen_t1"></div></div><div class="redes">@ 0800cocinas</div>
  <div class="redessociales_btn_izq"><div class="redessociales_imagen_i1"></div></div><div class="redes">0800 cocinas</div>
  <div class="redessociales_btn_izq"><div class="redessociales_imagen_y1"></div></div><div class="redes">0800 cocinas</div>
    
    
    

</div>

	</div>
<div class="cont_izq">
    
    <div class="linea_cn_izq"></div>
	<h3 class="titulo" id="titulo_formulario">Formulario de contacto</h3>
	<div class="texto_izq_contacto">
	<?php if ((int)$enviado === 1) { ?>
	<div style="background-color: #BEF781; border:1px solid #ACFA58; width:551px; margin: 10px 0; padding: 10px;">
		Su mensaje ha sido enviado con éxito. 
	</div>
	<?php } elseif ((int)$enviado === 2) { ?>
	
	<div style="background-color: #cc0000; border:1px solid #cc0000; width:551px; margin: 10px 0; padding: 10px;">
		Hubo un error enviando su mensaje.
	</div>
	<?php } ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'contacto-form',
		'enableAjaxValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

  <div style="float:left;"><?php echo $form->textField($contactoForm,'nombre',array('class'=>'formilario_nombre','style'=>'width:560px;height:32px;','maxlength'=>50, 'placeholder'=>'nombre')); ?></div>
  <div style="float:left;"><?php echo $form->textField($contactoForm,'telefono',array('class'=>'formilario_nombre','style'=>'width:560px;height:32px;','maxlength'=>50, 'placeholder'=>'teléfono')); ?></div>
  <div style="float:left;"><?php echo $form->textField($contactoForm,'email',array('class'=>'formilario_nombre','style'=>'width:560px;height:32px;','maxlength'=>50, 'placeholder'=>'email')); ?></div>
  <div style="float:left;"><?php echo $form->textArea($contactoForm,'mensaje',array('class'=>'formilario_nombre','style'=>'width:560px;height:200px;', 'placeholder'=>'mensaje')); ?></div>
    <div class="contenedor-captcha" style="float:left;width:100%;">
        <div id="captcha_light" style="float:right;"></div>
	</div>
	<div style="float:right;"><input type="submit" value="enviar" class="bn_vermas" /></div>
    <?php $this->endWidget(); ?>
</div>

	</div>