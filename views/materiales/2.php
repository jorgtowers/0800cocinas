<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="cont_centro">

	<div class="2_secciones_izq">
    <div class="cont_der">
    
	<?php echo redes_sociales(); ?>
    </div>
    <div class="linea_cn_izq"></div>
	<div class="titulo_gal"><span class="tex_gal_secciones1">materiales / </span><span class="tex_gal_secciones2">tradición y tecnología</span></div>
	<div class="texto_izq_gal">

    
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
			'cssFile'=> Yii::app()->theme->baseUrl.'/css/materiales.css',
			'skin'=> 'jcarousel-skin3-tango',
			'clickCallback' => '
				$.ajax({
				  url: $(this).attr("id"),
				}).done(function(text) {
				  $("#imagen_ejem_gal'.$i.'").html(text); 
				  $( this ).addClass( "done" );
				});		
			',
		));
	    ?>
	    </div>
		<div class="compartir_mat_videos">
		  <div class="compartir_btn">
	    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_p2"></div></div>
	    <div class="compartir_texto">print</div>
	    </div>
	    <div class="compartir_btn">
	    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_c2"></div></div>
	    <div class="compartir_texto">enviar</div>
	    </div>
	    <div class="compartir_btn">
	    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_f2"></div></div>
	    <div class="compartir_texto">like</div>
	    <div class="compartir_numero">33</div>
	    </div>
	    <div class="compartir_btn">
	    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_t2"></div></div>
	    <div class="compartir_texto">tweet</div>
	    <div class="compartir_numero">33</div>
	    </div>
	  </div>
    <?php } ?>
	</div>
    
<div class="texto_izq_gal">
	<div class="secciones_der_gal">
    <div class="titulo_publicidad_youtube">videos youtube</div>
    <div class="redessociales_youtube"><div class="redessociales_imagen_y1"></div>
    </div>
    <div class="subtitulo_publicidad_youtube">siempre en vanguardia</div>
    <div class="linea_hor_youtube"></div>
    <div class="ejemplo_y1_imagen"></div>
    <h3 class="nombres_publicidad_youtube">Cocinas Instaladas</h3>
    <div class="descripcion_0800_youtube">0800cocinas</div>
    <div class="descripcion_publicidad_youtube">Pequeña descripción ...</div>
    <div class="linea_hor_youtube"></div>
    <div class="ejemplo_y2_imagen"></div>
    <h3 class="nombres_publicidad_youtube">Iluminación al tacto</h3>
    <div class="descripcion_0800_youtube">0800cocinas</div>
    <div class="descripcion_publicidad_youtube">Pequeña descripción ...</div>
    <div class="linea_hor_youtube"></div>
    <div class="ejemplo_y3_imagen"></div>
    <h3 class="nombres_publicidad_youtube">Proceso de Instalación</h3>
    <div class="descripcion_0800_youtube">0800cocinas</div>
    <div class="descripcion_publicidad_youtube">Pequeña descripción ...</div>
    <div class="linea_hor_youtube"></div>
    <div class="ejemplo_y4_imagen"></div>
    <h3 class="nombres_publicidad_youtube">Puertas automáticas</h3>
    <div class="descripcion_0800_youtube">0800cocinas</div>
    <div class="descripcion_publicidad_youtube">Pequeña descripción ...</div>
    <div class="linea_hor_youtube"></div>
    </div>
    <div class="secciones_izq_gal">
    <div class="cuadrado_cn"></div>
    <h1 class="titulo_gal_secciones">videos</h1>
	<div class="cuadro_transparente_gal_videos">
    <h2 class="texto3">La fruta puede definirse como la parte comestible de una planta o árbol compuesto por su semilla y envoltura. Es también el ovario maduro y en algunas plantas de semilla incluye...</h2>
    </div>
    </div>
	<div class="cuadro_transparente_gal_videos">
    <div class="fondo_galeria">
    <div class="imagen_izq_gal"></div>
    </div>
	</div>
	<div class="compartir_gal_videos">
	  <div class="compartir_btn">
    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_p2"></div></div>
    <div class="compartir_texto">print</div>
    </div>
    <div class="compartir_btn">
    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_c2"></div></div>
    <div class="compartir_texto">enviar</div>
    </div>
    <div class="compartir_btn">
    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_f2"></div></div>
    <div class="compartir_texto">like</div>
    <div class="compartir_numero">33</div>
    </div>
    <div class="compartir_btn">
    <div class="compartir_redessociales_btn"><div class="compartir_redessociales_imagen_t2"></div></div>
    <div class="compartir_texto">tweet</div>
    <div class="compartir_numero">33</div>
    </div>
  </div>
    
	</div>
	</div>
	
</div>