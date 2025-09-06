<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript">
	var onloadCallback = function() {
        grecaptcha.render('captcha_dark', {
          'sitekey' : '6LelPRwUAAAAAG06Cpr8uw3xdscOxjlszbn6rLK9',
          'theme' : 'dark'
        });
      };

</script>


	<div class="cont_izq">
    
    <div class="linea_cn_izq"></div>
	<h3 class="titulo_gal" id="titulo"><span class="tex_gal_secciones1"><?php echo CHtml::link('novedades','/novedades/index',array('class'=>'tex_gal_secciones1', 'style'=>'text-decoration:none')); ?> / <?php echo CHtml::link('tips','/novedades/index#titulo_tips',array('class'=>'tex_gal_secciones1', 'style'=>'text-decoration:none')); ?></span></h3>

<div class="texto_izq_nov">
  <h1 class="titulo1_tips_seccion">TIPS<span class="titulo2_tips_seccion"> 0800cocinas</span></h1>
	<div class="caja_gris_nov_tips">
		<?php 
			foreach ($rawDataTips as $tips){
				echo '<div class="texto_tips_nov">'.$tips['contenido'].'</div>';
			}
		?>
    </div>
    <div class="compartir_mat_videos">
    <div class="compartir_btn" style="border: none;"><div class="fb-like" data-href="<?php echo $_SERVER["SERVER_NAME"].Yii::app()->request->url; ?>" data-width="74" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </div>
    <div class="compartir_btn" style="border: none;width: 80px;">
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://bit.ly/1xolGXt" data-text="Tips http://bit.ly/1xolGXt"; ?>">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
</div>
    <div class="caja_secciones_ir">
    <h3 class="texto_secciones1_nov">/ <?php echo CHtml::link('artículos','/novedades/index#titulo_articulos',array('class'=>'texto_secciones1_nov', 'style'=>'text-decoration:none')); ?> / <?php echo CHtml::link('eventos','/novedades/index#titulo_eventos',array('class'=>'texto_secciones1_nov', 'style'=>'text-decoration:none')); ?> / <?php echo CHtml::link('nosotros','/novedades/index#titulo_nosotros',array('class'=>'texto_secciones1_nov', 'style'=>'text-decoration:none')); ?> / <?php echo CHtml::link('<span class="texto_secciones1_nov_on">tips</span>','/novedades/index#titulo_tips',array('class'=>'texto_secciones1_nov', 'style'=>'text-decoration:none')); ?> / </h3>
    </div>
</div>
	</div>
	
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
    <div class="texto_blanco">escriba su dirección de correo</div>
    <div class="fondo_blanco_registro"><?php echo $form->textField($recibenovedades,'email',array('style'=>'border:none;width:250px;height:21px;','maxlength'=>50)); ?></div>
	<div class="contenedor-captcha">
        <div id="captcha_dark"></div>
    </div>
    <input type="submit" name="submit" value="pulse para registrarse" class="btn_registro_blanco" style="float: right; background: transparent; border: none;" />
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

	<?php foreach ($publicidad as $pub){ ?>
	    <div class="secciones_der">
			<?php echo CHtml::link(CHtml::image($pub['img'],$pub['titulo'],array('border'=>'0')),$pub['url'],array('title'=>$pub['titulo'])); ?>
	    </div>
    <?php } ?>
</div>
	