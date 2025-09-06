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
	<div class="titulo_gal" id="titulo"><span class="tex_gal_secciones1">materiales / </span><span class="tex_gal_secciones2">tradición y tecnología</span></div>

<div class="texto_izq_mat">
    <?php for ($i=0;$i<count($dataProvider);$i++){ ?>
	    <div class="secciones_izq_mat">
		    <div class="cuadrado_cn"></div>
		    <h1 class="titulo_gal_secciones"><?php echo $datosMaterial[$i]['titulo']; ?></h1>
			<div class="cuadro_transparente_mat">
		    	<h2 class="texto4"><?php echo $datosMaterial[$i]['descripcion']; ?></h2>
		    </div>
	    </div>
		<div class="cuadro_transparente_mat">
	    <div class="fondo_mat" id="imagen_ejem_gal<?php echo $i; ?>">
	    <?php echo $primeraGaleria[$i]; ?>
	    </div>
		</div>
	    <div class="cuadro_transparente_mat_selec">
	    <?php 
		$this->widget('ext.JCarousel.JCarousel', array(
		    'dataProvider' => $dataProvider[$i],
		    'thumbUrl' => '$data["thumb_name"]',
		    'imageUrl' => '$data["file_name"]',
			'linkId' => '$data["link_id"]',
		    'target' => 'imagen_ejem_gal'.$i,
			'cssFile'=> Yii::app()->theme->baseUrl.'/css/skin3.css',
			'skin'=> 'jcarousel-skin3-tango',
			'clickCallback' => '
				variable = $(this);
				$.ajax({
				  url: $(this).attr("id"),
				}).done(function(text) {
				  $("#imagen_ejem_gal'.$i.'").html(text); 
				  variable.parent().parent().children("li").children("a").children("img").removeClass("done");
			  	  variable.children("img").addClass("done");
				});		
			',
		));
	    ?>
	    </div>
		<div class="compartir_mat_videos"></div>
    <?php } ?>
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
    <div class="titulo_blanco2">Recibe nuestras novedades</div>
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
    <?php if (!empty($vid)){ ?>
    <div class="secciones_der">
    <div class="titulo_publicidad_youtube">videos youtube</div>
    <div class="redessociales_youtube"><div class="redessociales_imagen_y1"></div>
    </div>
    <div class="subtitulo_publicidad_youtube">siempre en vanguardia</div>
    <div class="linea_hor_youtube"></div>
    <?php 
    	foreach ($vid as $video){
    		echo '<a class="nombres_publicidad_youtube" style="text-decoration: none;width:100%;" href="'."/galeria/index/video/".$video['url']."#titulo_video".'">';
    		if ($video['imagen']){
    			echo '<div class="ejemplo_y2_imagen">'.CHtml::image($video['imagen']).'</div>';
    		} else {
    			echo '<div class="ejemplo_y1_imagen"></div>';
    		}
				echo '<h3 class="nombres_publicidad_youtube">'.$video['titulo'].'</h3>
				    <div class="descripcion_0800_youtube">'.$video['autor'].'</div>
				    <div class="descripcion_publicidad_youtube">'.(strlen($video['descripcion']) <= 50 ? $video['descripcion']:substr($video['descripcion'], 0, strrpos(substr($video['descripcion'],0,50), ' ')).'...').'</div>
				    <div class="linea_hor_youtube"></div>';
				echo '</a>';
    	}
    ?>
    </div>
    <?php } ?>

    <?php foreach ($publicidad as $pub){ ?>
	    <div class="secciones_der">
			<?php echo CHtml::link(CHtml::image($pub['img'],$pub['titulo'],array('border'=>'0')),$pub['url'],array('title'=>$pub['titulo'])); ?>
	    </div>
    <?php } ?>

    <?php if (!empty($rawDataTips)) {?>
    <div class="secciones_der">
	    <div class="caja_tips">
		    <div class="titulo1_tips">TIPS<span class="titulo2_tips"> 0800cocinas</span></div>
		    <div class="linea_gris_tips"></div>
		    <?php foreach ($rawDataTips as $tip){ ?>
		    	<?php echo CHtml::link('<div class="texto_tips">'.(strlen($tip['contenido']) <= 120 ? $tip['contenido']:substr($tip['contenido'], 0, strrpos(substr($tip['contenido'],0,120), ' ')).'...').'</div>','/tips/',array('style'=>'text-decoration:none;')); ?>
		    	<div class="linea_gris_tips"></div>
		    <?php } ?>
	    </div>
    </div>
    <?php } ?>
</div>