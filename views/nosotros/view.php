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

    <div class="linea_cn_izq"></div>
    <h3 class="titulo_gal" id="titulo"><span class="tex_gal_secciones1"><?php echo CHtml::link('novedades', '/novedades/index', array('class' => 'tex_gal_secciones1', 'style' => 'text-decoration:none')); ?> / <?php echo CHtml::link('nosotros', '/novedades/index#titulo_nosotros', array('class' => 'tex_gal_secciones1', 'style' => 'text-decoration:none')); ?> / </span><span class="tex_gal_secciones2"><?php echo strtolower($model->titulo); ?></span></h3>

    <div class="texto_izq_nov">
        <h1 class="titulo_art"><?php echo $model->titulo; ?> <div class="linea_cn_titulo"></div></h1>
        <h2 class="subtitulo_art"><?php echo $model->subtitulo; ?><div class="linea_gris_nov"></div></h2>
        <div class="texto_art"><?php echo str_replace(chr(13), '<br/>', $model->contenido); ?></div>
        <?php echo $galeria; ?>
        <div class="cuadro_transparente_nov">


            <?php if ($model->fuente) { ?><div class="referencias_art">Artículo publicado en <?php echo $model->fuente; ?></div><?php } ?>
            <?php if ($model->fecha_publicacion) { ?><div class="referencias_art"><?php echo $model->fecha_publicacion; ?></div><?php } ?>
        </div>
        <div class="compartir_nov">
            <div class="compartir_btn" style="border: none;"><div class="fb-like" data-href="<?php echo $_SERVER["SERVER_NAME"] . Yii::app()->request->url; ?>" data-width="74" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
            </div>
            <div class="compartir_btn" style="border: none;width: 80px;">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $model->short_url; ?>" data-text="<?php echo $model->titulo . " " . $model->short_url; ?>">Tweet</a>
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
        <div class="linea_gris_nov_inf"></div>
        <div class="secciones_izq_nov">
            <div class="cuadrado_cn"></div>
            <h2 class="titulo_gal_secciones">Nosotros</h2>
            <div class="caja_gris_nov">
                <div class="caja_titulos_nov1y2">
                    <?php
                    $i = 0;
                    for ($i; $i < count($nosotros) && $i < 6; $i++) {
                        if ($model->idnosotros == $nosotros[$i]->idnosotros) {
                            echo CHtml::link('<h2 class="texto_titulo_nov" style="color:#bbb;">' . $nosotros[$i]->titulo . '</h2>', '/nosotros/view/' . $nosotros[$i]->idnosotros . "#titulo");
                        } else {
                            echo CHtml::link('<h2 class="texto_titulo_nov">' . $nosotros[$i]->titulo . '</h2>', '/nosotros/view/' . $nosotros[$i]->idnosotros . "#titulo");
                        }
                    }
                    ?>
                </div>
                <div class="caja_titulos_nov1y2">
                    <?php
                    for ($i; $i < count($nosotros) && $i < 12; $i++) {
                        if ($model->idnosotros == $nosotros[$i]->idnosotros) {
                            echo CHtml::link('<h2 class="texto_titulo_nov" style="color:#bbb;">' . $nosotros[$i]->titulo . '</h2>', '/nosotros/view/' . $nosotros[$i]->idnosotros . "#titulo");
                        } else {
                            echo CHtml::link('<h2 class="texto_titulo_nov">' . $nosotros[$i]->titulo . '</h2>', '/nosotros/view/' . $nosotros[$i]->idnosotros . "#titulo");
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="espacio_ir_num">
            </div>

        </div>
        <div class="caja_secciones_ir">
            <h3 class="texto_secciones1_nov">/ <?php echo CHtml::link('artículos', '/novedades/index#titulo_articulos', array('class' => 'texto_secciones1_nov', 'style' => 'text-decoration:none')); ?> / <?php echo CHtml::link('eventos', '/novedades/index#titulo_eventos', array('class' => 'texto_secciones1_nov', 'style' => 'text-decoration:none')); ?> / <?php echo CHtml::link('<span class="texto_secciones1_nov_on">nosotros</span>', '/novedades/index#titulo_nosotros', array('class' => 'texto_secciones1_nov', 'style' => 'text-decoration:none')); ?> / <?php echo CHtml::link('tips', '/novedades/index#titulo_tips', array('class' => 'texto_secciones1_nov', 'style' => 'text-decoration:none')); ?> / </h3>
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
<?php foreach ($publicidad as $pub) { ?>
        <div class="secciones_der">
                <?php echo CHtml::link(CHtml::image($pub['img'], $pub['titulo'], array('border' => '0')), $pub['url'], array('title' => $pub['titulo'])); ?>
        </div>
            <?php } ?>

<?php if (!empty($rawDataTips)) { ?>
        <div class="secciones_der">
            <div class="caja_tips">
                <div class="titulo1_tips">TIPS<span class="titulo2_tips"> 0800cocinas</span></div>
                <div class="linea_gris_tips"></div>
    <?php foreach ($rawDataTips as $tip) { ?>
        <?php echo CHtml::link('<div class="texto_tips">' . (strlen($tip['contenido']) <= 120 ? $tip['contenido'] : substr($tip['contenido'], 0, strrpos(substr($tip['contenido'], 0, 120), ' ')) . '...') . '</div>', '/tips/', array('style' => 'text-decoration:none;')); ?>
                    <div class="linea_gris_tips"></div>
    <?php } ?>
            </div>
        </div>
<?php } ?>
</div>
