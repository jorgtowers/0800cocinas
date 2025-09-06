<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<script type="text/javascript">
	var onloadCallback = function() {
        grecaptcha.render('captcha_dark', {
          'sitekey' : '6LelPRwUAAAAAG06Cpr8uw3xdscOxjlszbn6rLK9',
          'theme' : 'dark'
        });
      };

</script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
<div class="cont_izq">

    <div class="linea_cn_izq"></div>
    <div class="titulo_gal" id="titulo"><span class="tex_gal_secciones1">novedades / </span><span class="tex_gal_secciones2">una ventana a la actualidad</span></div>

    <div class="texto_izq_nov">
        <div class="secciones_izq_nov">
            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_articulos">Artículos</h1>
            <div class="caja_gris_nov" id="caja_articulos" style="height:388px">
                <?php
                foreach ($rawDataArticulos as $articulo) {
                    echo '<div class="caja_titulos_nov_index">';
                    echo CHtml::link(
                            (($articulo['file_name'] != 'no') ?
                                    '<div class="imagen_seleccion_articulos"><div>' . CHtml::image($articulo['file_name']) . '</div></div>' :
                                    '<div class="imagen_seleccion_articulos"><div class="imagen2_selec_nov_art"></div></div>') .
                            '<h2 class="texto_titulo_nov">' . $articulo['titulo'] . '</h2>' .
                            '<div class="texto_subtitulo_nov">' . $articulo['subtitulo'] . '</div>', $articulo['url'] . "#titulo"
                    );
                    echo '</div>';
                }
                ?>
            </div>
            <div class="espacio_ir_num">
                <div style="margin: 0;float: left; cursor: pointer;" id="ant_articulos" class="texto_titulo_nov">&lt; Anterior</div><input type="hidden" id="valor_ant_articulos" value="<?php echo $page_ant_art ?>" /><input type="hidden" id="valor_act_articulos" value="<?php echo $page_act_art ?>" /><input type="hidden" id="valor_sig_articulos" value="<?php echo $page_sig_art ?>" /><div style="text-align: right;float: right; cursor: pointer; margin: 0;" id="sig_articulos" class="texto_titulo_nov">Siguiente &gt;</div>
            </div>
        </div>
        <div class="secciones_izq_nov">
            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_eventos">Eventos</h1>
            <div class="caja_gris_nov" id="caja_eventos" style="height:388px">
                <?php
                foreach ($rawDataEventos as $eventos) {
                    echo '<div class="caja_titulos_nov_index">';
                    echo CHtml::link(
                            (($eventos['file_name'] != 'no') ?
                                    '<div class="imagen_seleccion_articulos"><div class="imagen8_selec_nov_art">' . CHtml::image($eventos['file_name']) . '</div></div>' :
                                    '<div class="imagen_seleccion_articulos"><div class="imagen8_selec_nov_art"></div></div>') .
                            '<h2 class="texto_titulo_nov">' . $eventos['titulo'] . '</h2>' .
                            '<div class="texto_subtitulo_nov">' . $eventos['subtitulo'] . '</div>', $eventos['url'] . "#titulo"
                    );
                    echo '</div>';
                }
                ?>
            </div>
            <div class="espacio_ir_num">
                <div style="margin: 0;float: left; cursor: pointer;" id="ant_eventos" class="texto_titulo_nov">&lt; Anterior</div><input type="hidden" id="valor_ant_eventos" value="<?php echo $page_ant_eve ?>" /><input type="hidden" id="valor_act_eventos" value="<?php echo $page_act_eve ?>" /><input type="hidden" id="valor_sig_eventos" value="<?php echo $page_sig_eve ?>" /><div style="text-align: right;float: right; cursor: pointer; margin: 0;" id="sig_eventos" class="texto_titulo_nov">Siguiente &gt;</div>
            </div>
        </div>
        <div class="secciones_izq_nov">
            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_tips">Tips</h1>
            <div class="caja_gris_nov">
                <?php
                foreach ($rawDataTips as $tips) {
                    echo CHtml::link('<div class="texto_tips_nov" style="text-decoration:none;">' . $tips['contenido'] . '</div>', '/tips/' . "#titulo", array('style' => 'text-decoration:none;'));
                }
                ?>
            </div>
            <?php echo CHtml::link('<div class="bn_vermas_nov">ver más...</div>', '/tips/' . "#titulo"); ?>
        </div>
        <div class="secciones_izq_nov">
            <div class="cuadrado_cn"></div>
            <h1 class="titulo_gal_secciones" id="titulo_nosotros">Nosotros</h1>
            <div class="caja_gris_nov">
                <div class="caja_titulos_nov1y2">
                    <?php
                    $i = 0;
                    for ($i; $i < count($rawDataNosotros) && $i < 6; $i++) {
                        echo CHtml::link('<h2 class="texto_titulo_nov">' . $rawDataNosotros[$i]['contenido'] . '</h2>', $rawDataNosotros[$i]['url'] . "#titulo");
                    }
                    ?>
                </div>
                <div class="caja_titulos_nov1y2">
                    <?php
                    for ($i; $i < count($rawDataNosotros) && $i < 12; $i++) {
                        echo CHtml::link('<h2 class="texto_titulo_nov">' . $rawDataNosotros[$i]['contenido'] . '</h2>', $rawDataNosotros[$i]['url'] . "#titulo");
                    }
                    ?>
                </div>
            </div>
            <div class="espacio_ir_num">

            </div>
        </div>
    </div>
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

</div>

<script type="text/javascript">
    $(document).ready(function () {
        function validar_ant_sig() {
            var valor_ant_articulos = parseInt($('#valor_ant_articulos').val());
            var valor_sig_articulos = parseInt($('#valor_sig_articulos').val());
            var valor_act_articulos = parseInt($('#valor_act_articulos').val());
            var valor_ant_eventos = parseInt($('#valor_ant_eventos').val());
            var valor_sig_eventos = parseInt($('#valor_sig_eventos').val());
            var valor_act_eventos = parseInt($('#valor_act_eventos').val());
            if (valor_sig_articulos <= 1) {
                $("#sig_articulos").css('display','none');
            } else {
                $("#sig_articulos").css('display','block');
            }
            if (valor_act_articulos === 1) {
                $("#ant_articulos").css('display','none');
            } else {
                $("#ant_articulos").css('display','block');
            }
            if (valor_sig_eventos <= 1) {
                $("#sig_eventos").css('display','none');
            } else {
                $("#sig_eventos").css('display','block');
            }
            if (valor_act_eventos === 1) {
                $("#ant_eventos").css('display','none');
            } else {
                $("#ant_eventos").css('display','block');
            }
        }

        $("#sig_articulos").click(function () {
            var valor_sig = parseInt($('#valor_sig_articulos').val());
            if (valor_sig > 1) {
                $.ajax({
                    url: "/novedades/loadarticulos/page/" + valor_sig
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_articulos").html(salida.contenido);
                    $('#valor_ant_articulos').val(salida.page_ant);
                    $('#valor_act_articulos').val(salida.page_act);
                    $('#valor_sig_articulos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });

        $("#ant_articulos").click(function () {
            var valor_ant = parseInt($('#valor_ant_articulos').val());
            if (valor_ant >= 1) {
                $.ajax({
                    url: "/novedades/loadarticulos/page/" + valor_ant
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_articulos").html(salida.contenido);
                    $('#valor_ant_articulos').val(salida.page_ant);
                    $('#valor_act_articulos').val(salida.page_act);
                    $('#valor_sig_articulos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });
        
        $("#sig_eventos").click(function () {
            var valor_sig = parseInt($('#valor_sig_eventos').val());
            if (valor_sig > 1) {
                $.ajax({
                    url: "/novedades/loadeventos/page/" + valor_sig
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_eventos").html(salida.contenido);
                    $('#valor_ant_eventos').val(salida.page_ant);
                    $('#valor_act_eventos').val(salida.page_act);
                    $('#valor_sig_eventos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });

        $("#ant_eventos").click(function () {
            var valor_ant = parseInt($('#valor_ant_eventos').val());
            if (valor_ant >= 1) {
                $.ajax({
                    url: "/novedades/loadeventos/page/" + valor_ant
                }).done(function (text) {
                    var salida = JSON.parse(text);
                    $("#caja_eventos").html(salida.contenido);
                    $('#valor_ant_eventos').val(salida.page_ant);
                    $('#valor_act_eventos').val(salida.page_act);
                    $('#valor_sig_eventos').val(salida.page_sig);
                    validar_ant_sig();
                });
            }
            return false;
        });
        
        validar_ant_sig();
    });
</script>