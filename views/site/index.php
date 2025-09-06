<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
<script type="text/javascript">
	var onloadCallback = function() {
        grecaptcha.render('captcha_dark', {
          'sitekey' : '6LelPRwUAAAAAG06Cpr8uw3xdscOxjlszbn6rLK9',
          'theme' : 'dark'
        });
      };

</script>

<div class="cont_izq">

    <?php if (!empty($bienvenido)) { ?>
        <div class="secciones_izq">
            <div class="linea_cn_izq"></div>
            <h1 class="titulo"><?php echo $bienvenido[0]->titulo; ?></h1>
            <div class="texto_izq">
                <div class="texto"><?php echo $bienvenido[0]->contenido; ?></div>
                <div class="linea_gr_btn"></div>
            </div>    
        </div>
    <?php } ?>
    <?php if (!empty($secciones)) { ?>
        <div class="secciones_izq">
            <div class="texto_izq">
                <h3 class="texto_secciones1">/ <?php
                    foreach ($secciones as $seccion) {
                        echo CHtml::link($seccion->titulo, $seccion->url, array('class' => 'texto_secciones1', 'style' => 'text-decoration:none;')) . ' / ';
                    }
                    ?> </h3>
                <div class="linea_gr_btn"></div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($video)) { ?>
        <div class="secciones_izq">
            <div class="linea_cn_izq"></div>
            <h1 class="titulo"><?php echo CHtml::link("Videos", "/galeria/index/#titulo_video", array('class' => 'titulo', 'style' => 'text-decoration:none;')); ?><span class="sub_titulo"> / <?php echo CHtml::link($video[0]->titulo, "/galeria/index/video/" . $video[0]->url . "#titulo_video", array('class' => 'sub_titulo', 'style' => 'text-decoration:none;')); ?></span></h1>
            <div class="texto_izq">
                <div class="cuadro_transparente_gal_videos">
                    <div class="imagen_izq">
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
                                    height: '374',
                                    width: '565',
                                    videoId: '<?php echo $video[0]->url; ?>',
                                });
                            }
                        </script>
                    </div>
                    <div class="texto2"><?php echo $video[0]->descripcion; ?></div>
                    <div class="bn_vermas"><?php echo CHtml::link('ver más...', "/galeria/index/#titulo_video", array('class' => 'bn_vermas', 'style' => 'text-decoration:none;')); ?></div>
                </div>
                <div class="linea_gr_btn"></div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($articulohome)) { ?>
        <div class="secciones_izq">
            <div class="linea_cn_izq"></div>
            <h1 class="titulo"><?php echo CHtml::link($articulohome[0]->titulo, $articulohome[0]->url, array('class' => 'titulo', 'style' => 'text-decoration:none;')); ?></h1>
            <div class="texto_izq">
                <?php
                if ($imagenarticulohome !== '') {
                    list($ancho, $alto, $tipo, $atributos) = getimagesize(substr($imagenarticulohome, 1));
                    ?>
                    <div class="imagen_izq">
                        <div class="ejemplo1_imagen" id="imagen_1"><?php echo CHtml::image($imagenarticulohome, '', array('width' => '565')); ?></div>
                    </div>
                <?php } ?>
                <h3 class="texto2"><?php echo strlen($articulohome[0]->contenido) <= 320 ? $articulohome[0]->contenido : substr($articulohome[0]->contenido, 0, strrpos(substr($articulohome[0]->contenido, 0, 320), ' ')) . '...'; ?>
                </h3>
                <div class="bn_vermas"><?php echo CHtml::link('ver más...', $articulohome[0]->url . "#titulo", array('class' => 'bn_vermas', 'style' => 'text-decoration:none;')); ?></div>
                <div class="compartir">
                    <div class="compartir_btn" style="border: none;"><div class="fb-like" data-href="<?php echo $_SERVER["SERVER_NAME"] . $articulohome[0]->url; ?>" data-width="74" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
                    <div class="compartir_btn" style="border: none;width: 80px;">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $articulohome[0]->short_url; ?>" data-text="<?php echo $articulohome[0]->titulo . " " . $articulohome[0]->short_url; ?>">Tweet</a>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + '://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, 'script', 'twitter-wjs');</script>
                    </div>
                </div>
                <div class="linea_gr_btn"></div>
            </div>
        </div>
    <?php } ?>

    <div class="secciones_izq">
        <div class="linea_cn_izq"></div>
        <h1 class="titulo"><?php echo CHtml::link("Artículos", "/novedades/index#titulo", array('class' => 'titulo', 'style' => 'text-decoration:none;')); ?></h1>
        <div class="texto_izq">
            <?php foreach ($articulos as $articulo) { ?>
                <div class="cuadro_transparente">
                    <div class="cuadrado_cn"></div>
                    <h2 class="titulo_articulos"><?php echo CHtml::link($articulo->titulo, '/articulos/view/' . $articulo->idarticulo, array('class' => 'titulo_articulos', 'style' => 'text-decoration:none;')); ?></h2>
                </div>
                <div class="texto_articulos"><?php echo strlen($articulo->contenido) <= 180 ? $articulo->contenido : substr($articulo->contenido, 0, strrpos(substr($articulo->contenido, 0, 180), ' ')) . '...'; ?></div>
            <?php } ?>
            <div class="bn_vermas"><?php echo CHtml::link('ver más...', '/novedades/index' . "#titulo", array('class' => 'bn_vermas', 'style' => 'text-decoration:none;')); ?></div><br />
            <div class="linea_gr_btn"></div>
        </div>
    </div>

    <?php if (!empty($galeriahome)) { ?>
        <div class="secciones_izq">
            <div class="linea_cn_izq"></div>
            <h1 class="titulo"><?php echo CHtml::link("Galería", "/galeria/index#titulo", array('class' => 'titulo', 'style' => 'text-decoration:none;')); ?><span class="sub_titulo"> / <?php echo CHtml::link($galeriahome[0]->titulo, "/galeria/index#titulo", array('class' => 'sub_titulo', 'style' => 'text-decoration:none;')); ?></span></h1>
            <div class="texto_izq">
                <?php
                if (isset($imagengaleriahome)) {
                    list($ancho, $alto, $tipo, $atributos) = getimagesize(substr($imagengaleriahome, 1));
                    ?>
                    <div class="imagen_izq">
                        <div class="ejemplo2_imagen"><?php echo CHtml::image($imagengaleriahome, '', array('width' => '565')); ?></div>
                    </div>
                <?php } ?>
                <div class="texto2"><?php echo strlen($galeriahome[0]->contenido) <= 150 ? $galeriahome[0]->contenido : substr($galeriahome[0]->contenido, 0, strrpos(substr($galeriahome[0]->contenido, 0, 150), ' ')) . '...'; ?></div>
                <div class="bn_vermas"><?php echo CHtml::link('ver más...', '/galeria/index' . "#titulo", array('class' => 'bn_vermas', 'style' => 'text-decoration:none;')); ?></div>
                <div class="compartir"> 
                    <div class="compartir_btn" style="border: none;"><div class="fb-like" data-href="<?php echo $_SERVER["SERVER_NAME"] . '/galeria/index'; ?>" data-width="74" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
                    <div class="compartir_btn" style="border: none;width: 80px;">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $_SERVER["SERVER_NAME"] . '/galeria/index'; ?>" data-text="<?php echo $galeriahome[0]->titulo; ?>">Tweet</a>
                        <script>!function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + '://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, 'script', 'twitter-wjs');</script>
                    </div>
                </div>
                <div class="linea_gr_btn"></div>
            </div>
        </div>
    <?php } ?>


</div>
<div class="cont_der">

    <?php echo redes_sociales(); ?>

    <div class="secciones_der">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'recibenovedades-form',
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'action' => '/recibenovedades/create'
        ));
        ?>

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

    <?php foreach ($publicidad as $pub) { ?>
        <div class="secciones_der">
            <?php echo CHtml::link(CHtml::image($pub['img'], $pub['titulo'], array('border' => '0')), $pub['url'], array('title' => $pub['titulo'])); ?>
        </div>
    <?php } ?>

    <?php if (!empty($vid)) { ?>
        <div class="secciones_der">
            <div class="titulo_publicidad_youtube">videos youtube</div>
            <div class="redessociales_youtube"><div class="redessociales_imagen_y1"></div>
            </div>
            <div class="subtitulo_publicidad_youtube">siempre en vanguardia</div>
            <div class="linea_hor_youtube"></div>
            <div style="width:100%" id="caja_videos">
                <?php
                foreach ($vid as $video) {
                    echo '<a class="nombres_publicidad_youtube" style="text-decoration: none;width:100%;" href="' . "/galeria/index/video/" . $video['url'] . "#titulo_video" . '">';
                    if ($video['imagen']) {
                        echo '<div class="ejemplo_y2_imagen">' . CHtml::image($video['imagen']) . '</div>';
                    } else {
                        echo '<div class="ejemplo_y1_imagen"></div>';
                    }
                    echo '<h3 class="nombres_publicidad_youtube">' . $video['titulo'] . '</h3>
				    <div class="descripcion_0800_youtube">' . $video['autor'] . '</div>
				    <div class="descripcion_publicidad_youtube">' . (strlen($video['descripcion']) <= 50 ? $video['descripcion'] : substr($video['descripcion'], 0, strrpos(substr($video['descripcion'], 0, 50), ' ')) . '...') . '</div>
				    <div class="linea_hor_youtube"></div>';
                    echo '</a>';
                }
                ?>
            </div>
            <div style="width:100%;">
                <div style="margin: 0;float: left; cursor: pointer;font-family: Verdana, Geneva, sans-serif;font-size: 13px;color: #777;font-weight: bold;" id="ant_videos">&lt; Anterior</div><input type="hidden" id="valor_ant_videos" value="<?php echo $page_ant_vid ?>" /><input type="hidden" id="valor_act_videos" value="<?php echo $page_act_vid ?>" /><input type="hidden" id="valor_sig_videos" value="<?php echo $page_sig_vid ?>" /><div style="text-align: right;float: right; cursor: pointer; margin: 0;font-family: Verdana, Geneva, sans-serif;font-size: 13px;color: #777;font-weight: bold;" id="sig_videos">Siguiente &gt;</div>
            </div>
        </div>
    <?php } ?>
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