<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="cont_centro">

    <div class="2_secciones_izq">
        <div class="cont_der">

            <?php echo redes_sociales(); ?>
        </div>
        <div class="linea_cn_izq"></div>
        <div class="titulo_gal" id="titulo"><span class="tex_gal_secciones1">galería / </span><span class="tex_gal_secciones2">cocinas a la medida</span></div>
        <div class="texto_izq_gal">

            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_proyecto">proyectos de cocina</h1>
            <div class="cuadro_transparente_gal">
                <h2 class="texto3">Los mejores profesionales especializados en el diseño, le darán el soporte a su espacio culinario en base a la medida de sus necesidades.</h2>
            </div>
            <div class="cuadro_transparente_gal">
                <div class="fondo_galeria" id="imagen_ejem_gal2">
                    <?php echo $galeriapc; ?>
                </div>

            </div>
            <div class="cuadro_transparente_gal_selec">
                <?php
                $this->widget('ext.JCarousel.JCarousel', array(
                    'dataProvider' => $dataProviderpc,
                    'thumbUrl' => '$data["thumb_name"]',
                    'imageUrl' => '$data["file_name"]',
                    'linkClass' => '"normal"',
                    'linkId' => '$data["link_id"]',
                    'target' => 'imagen_ejem_gal2',
                    'cssFile' => Yii::app()->theme->baseUrl . '/css/skin2.css',
                    'skin' => 'jcarousel-skin2-tango',
                    'clickCallback' => '
			variable = $(this);
			$.ajax({
			  url: $(this).attr("id"),
			}).done(function(text) {
			  $("#imagen_ejem_gal2").html(text);
			  variable.parent().parent().children("li").children("a").removeClass("done");
			  variable.addClass("done");
			});		
		',
                ));
                ?>
            </div>
            <div class="compartir_gal"></div>

        </div>
        <div class="texto_izq_gal">

            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_cocina">cocinas instaladas</h1>
            <div class="cuadro_transparente_gal">
                <h2 class="texto3">Las mejores soluciones, combinando estilo y funcionalidad en el diseño de su espacio.</h2>
            </div>
            <div class="cuadro_transparente_gal">
                <div class="fondo_galeria" id="imagen_ejem_gal1">
                    <?php echo $galeriaci; ?>
                </div>
            </div>
            <div class="cuadro_transparente_gal_selec">
                <?php
                $this->widget('ext.JCarousel.JCarousel', array(
                    'dataProvider' => $dataProviderci,
                    'thumbUrl' => '$data["thumb_name"]',
                    'imageUrl' => '$data["file_name"]',
                    'linkClass' => '"normal"',
                    'linkId' => '$data["link_id"]',
                    'target' => 'imagen_ejem_gal1',
                    'clickCallback' => '
			variable = $(this);
			$.ajax({
			  url: $(this).attr("id"),
			}).done(function(text) {
			  $("#imagen_ejem_gal1").html(text); 
			  variable.parent().parent().children("li").children("a").removeClass("done");
			  variable.addClass("done");
			});		
		',
                ));
                ?>
            </div>
            <div class="compartir_gal"></div>

        </div>
        <div class="texto_izq_gal">

            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_espacio">closets, baños y espacios complementarios</h1>
            <div class="cuadro_transparente_gal">
                <h2 class="texto3">A nuestros clientes les ofrecemos la posibilidad de diseñar y complementar sus espacios con muebles que se ajustan a sus necesidades específicas.</h2>
            </div>
            <div class="cuadro_transparente_gal">
                <div class="fondo_galeria" id="imagen_ejem_gal3">
                    <?php echo $galeriaec; ?>
                </div>
            </div>
            <div class="cuadro_transparente_gal_selec">
                <?php
                $this->widget('ext.JCarousel.JCarousel', array(
                    'dataProvider' => $dataProviderec,
                    'thumbUrl' => '$data["thumb_name"]',
                    'imageUrl' => '$data["file_name"]',
                    'linkId' => '$data["link_id"]',
                    'target' => 'imagen_ejem_gal3',
                    'clickCallback' => '
			variable = $(this);
			$.ajax({
			  url: $(this).attr("id"),
			}).done(function(text) {
			  $("#imagen_ejem_gal3").html(text); 
			  variable.parent().parent().children("li").children("a").removeClass("done");
			  variable.addClass("done");
			});		
		',
                ));
                ?>
            </div>
            <div class="compartir_gal"></div>

        </div>

        <?php if (!empty($vid)) { ?>
            <div class="texto_izq_gal">
                <div class="secciones_der_gal">
                    <div class="titulo_publicidad_youtube">videos youtube</div>
                    <div class="redessociales_youtube"><div class="redessociales_imagen_y1"></div>
                    </div>
                    <div class="subtitulo_publicidad_youtube">siempre en vanguardia</div>
                    <div class="linea_hor_youtube"></div>
                    <div style="width:100%" id="caja_videos">
                    <?php
                    foreach ($vid as $videos) {
                        echo '<a class="nombres_publicidad_youtube" style="text-decoration: none;width:100%;" href="' . "/galeria/index/video/" . $videos['url'] . "#titulo_video" . '">';
                        if ($videos['imagen']) {
                            echo '<div class="ejemplo_y2_imagen">' . CHtml::image($videos['imagen']) . '</div>';
                        } else {
                            echo '<div class="ejemplo_y1_imagen"></div>';
                        }
                        echo '<h3 class="nombres_publicidad_youtube">' . $videos['titulo'] . '</h3>
				    <div class="descripcion_0800_youtube">' . $videos['autor'] . '</div>
				    <div class="descripcion_publicidad_youtube">' . (strlen($videos['descripcion']) <= 50 ? $videos['descripcion'] : substr($videos['descripcion'], 0, strrpos(substr($videos['descripcion'], 0, 50), ' ')) . '...') . '</div>
				    <div class="linea_hor_youtube"></div>';
                        echo '</a>';
                    }
                    ?>
                    </div>
                    <div style="width:100%;">
                        <div style="margin: 0;float: left; cursor: pointer;font-family: Verdana, Geneva, sans-serif;font-size: 13px;color: #777;font-weight: bold;" id="ant_videos" class="texto_titulo_nov">&lt; Anterior</div><input type="hidden" id="valor_ant_videos" value="<?php echo $page_ant_vid ?>" /><input type="hidden" id="valor_act_videos" value="<?php echo $page_act_vid ?>" /><input type="hidden" id="valor_sig_videos" value="<?php echo $page_sig_vid ?>" /><div style="text-align: right;float: right; cursor: pointer; margin: 0;font-family: Verdana, Geneva, sans-serif;font-size: 13px;color: #777;font-weight: bold;" id="sig_videos" class="texto_titulo_nov">Siguiente &gt;</div>
                    </div>
                </div>
                <div class="secciones_izq_gal">
                    <div class="cuadrado_cn"></div>
                    <h1 class="titulo_gal_secciones" id="titulo_video">videos</h1>
                    <div class="cuadro_transparente_gal_videos">
                        <h2 class="texto3">Cuidamos los detalles en todo el proceso. En el diseño, la elaboración e instalación, nos preocupamos por “lograr” su cocina ideal.</h2>
                    </div>
                </div>
                <div class="cuadro_transparente_gal_videos">
                    <div class="fondo_galeria">
                        <div class="imagen_izq_gal">

    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
                            <div id="player"></div>

                            <script>
                                // 2. This code loads the IFrame Player API code asynchronously.
                                var tag = document.createElement('script');

                                tag.src = "https://www.youtube.com/iframe_api";
                                var firstScriptTag = document.getElementsByTagName('script')[0];
                                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                                // 3. This function creates an <iframe> (and YouTube player)
                                //    after the API code downloads.
                                var player;
                                function onYouTubeIframeAPIReady() {
                                    player = new YT.Player('player', {
                                        height: '385',
                                        width: '580',
                                        videoId: '<?php echo ($video ? $video : $vid[0]['url']); ?>',
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="compartir_gal_videos"></div>
            </div>
        <?php } ?>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        function validar_ant_sig() {
            var valor_ant_videos = parseInt($('#valor_ant_videos').val());
            var valor_sig_videos = parseInt($('#valor_sig_videos').val());
            var valor_act_videos = parseInt($('#valor_act_videos').val());
            if (valor_sig_videos <= 1) {
                $("#sig_videos").css('display','none');
            } else {
                $("#sig_videos").css('display','block');
            }
            if (valor_act_videos === 1) {
                $("#ant_videos").css('display','none');
            } else {
                $("#ant_videos").css('display','block');
            }
        }

        $("#sig_videos").click(function () {
            var valor_sig = parseInt($('#valor_sig_videos').val());
            if (valor_sig > 1) {
                $.ajax({
                    url: "/galeria/loadvideos/page/" + valor_sig
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_videos").html(salida.contenido);
                    $('#valor_ant_videos').val(salida.page_ant);
                    $('#valor_act_videos').val(salida.page_act);
                    $('#valor_sig_videos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });

        $("#ant_videos").click(function () {
            var valor_ant = parseInt($('#valor_ant_videos').val());
            if (valor_ant >= 1) {
                $.ajax({
                    url: "/galeria/loadvideos/page/" + valor_ant
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_videos").html(salida.contenido);
                    $('#valor_ant_videos').val(salida.page_ant);
                    $('#valor_act_videos').val(salida.page_act);
                    $('#valor_sig_videos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });
        
        validar_ant_sig();
    });
</script>