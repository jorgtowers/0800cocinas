<?php

class GaleriaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/public';

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($video = null) {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800galeria.css');
        $cs->registerCssFile($baseUrl . '/css/0800youtube.css');


        // PROYECTOS DE COCINAS
        $galeriapc = '';
        $pc = GaleriaProyectoCocinas::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        $rawDataPC = array();
        $imgPC = array();
        $pathpc = realpath(Yii::app()->getBasePath() . "/../images/galeriaProyectoCocinas/") . "/";
        $publicPathpc = Yii::app()->getBaseUrl() . "/images/galeriaProyectoCocinas/";
        for ($i = 0; $i < count($pc); $i++) {
            if (is_dir($pathpc . $pc[$i]->idgaleria . "/")) {
                if ($gestor = opendir($pathpc . $pc[$i]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathpc . $pc[$i]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgPC[$i][] = $entrada;
                        }
                    }
                }
            }
        }
        if (!empty($imgPC)) {
            foreach ($imgPC as $key => $val) {
                sort($val);
                if (empty($rawDataPC)) {
                    $galeriapc = $this->actionFirstGallery($pc[$key]->idgaleria, 'galeriaProyectoCocinas');
                }
                $rawDataPC[] = array(
                    'id' => 'PC' . $pc[$key]->idgaleria,
                    'file_name' => $publicPathpc . $pc[$key]->idgaleria . "/" . $val[0],
                    'thumb_name' => $publicPathpc . $pc[$key]->idgaleria . "/thumbs/" . $val[0],
                    'link_id' => $this->createUrl('galeria/loadGallery/idgaleria/' . $pc[$key]->idgaleria . '/tipo/galeriaProyectoCocinas/'),
                );
            }
        }

        // COCINAS INSTALADAS
        $galeriaci = '';
        $ci = GaleriaCocinasInstaladas::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        $rawDataCI = array();
        $imgCI = array();
        $pathci = realpath(Yii::app()->getBasePath() . "/../images/galeriaCocinasInstaladas/") . "/";
        $publicPathci = Yii::app()->getBaseUrl() . "/images/galeriaCocinasInstaladas/";
        for ($i = 0; $i < count($ci); $i++) {
            if (is_dir($pathci . $ci[$i]->idgaleria . "/")) {
                if ($gestor = opendir($pathci . $ci[$i]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathci . $ci[$i]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgCI[$i][] = $entrada;
                        }
                    }
                }
            }
        }
        if (!empty($imgCI)) {
            foreach ($imgCI as $key => $val) {
                sort($val);
                if (empty($rawDataCI)) {
                    $galeriaci = $this->actionFirstGallery($ci[$key]->idgaleria, 'galeriaCocinasInstaladas');
                }
                $rawDataCI[] = array(
                    'id' => 'CI' . $ci[$key]->idgaleria,
                    'file_name' => $publicPathci . $ci[$key]->idgaleria . "/" . $val[0],
                    'thumb_name' => $publicPathci . $ci[$key]->idgaleria . "/thumbs/" . $val[0],
                    'link_id' => $this->createUrl('galeria/loadGallery/idgaleria/' . $ci[$key]->idgaleria . '/tipo/galeriaCocinasInstaladas/'),
                );
            }
        }
        // ESPACIOS COMPLEMENTARIOS
        $galeriaec = '';
        $ec = GaleriaEspaciosComplementarios::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        $rawDataEC = array();
        $imgEC = array();
        $pathec = realpath(Yii::app()->getBasePath() . "/../images/galeriaEspaciosComplementarios/") . "/";
        $publicPathec = Yii::app()->getBaseUrl() . "/images/galeriaEspaciosComplementarios/";
        for ($i = 0; $i < count($ec); $i++) {
            if (is_dir($pathec . $ec[$i]->idgaleria . "/")) {
                if ($gestor = opendir($pathec . $ec[$i]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathec . $ec[$i]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgEC[$i][] = $entrada;
                        }
                    }
                }
            }
        }
        if (!empty($imgEC)) {
            foreach ($imgEC as $key => $val) {
                sort($val);
                if (empty($rawDataEC)) {
                    $galeriaec = $this->actionFirstGallery($ec[$key]->idgaleria, 'galeriaEspaciosComplementarios');
                }
                $rawDataEC[] = array(
                    'id' => 'EC' . $ec[$key]->idgaleria,
                    'file_name' => $publicPathec . $ec[$key]->idgaleria . "/" . $val[0],
                    'thumb_name' => $publicPathec . $ec[$key]->idgaleria . "/thumbs/" . $val[0],
                    'link_id' => $this->createUrl('galeria/loadGallery/idgaleria/' . $ec[$key]->idgaleria . '/tipo/galeriaEspaciosComplementarios/'),
                );
            }
        }
        // Videos
        $pathVID = realpath(Yii::app()->getBasePath() . "/../images/galeriaVideos/") . "/";
        $publicPathVID = Yii::app()->getBaseUrl() . "/images/galeriaVideos/";
        $arr_vid = array();
        //$vid = GaleriaVideos::model()->findAll('activo=1 order by prioridad DESC, created DESC limit 5');
        $vid = GaleriaVideos::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        $page_ant_vid = 1;
        $page_sig_vid = count($vid) > 5 ? 2 : 1;
        for ($i = 0; $i < count($vid) && $i < 5; $i++) {
            $arr_vid[$i]['titulo'] = $vid[$i]->titulo;
            $arr_vid[$i]['url'] = $vid[$i]->url;
            $arr_vid[$i]['autor'] = $vid[$i]->autor;
            $arr_vid[$i]['descripcion'] = $vid[$i]->descripcion;
            $arr_vid[$i]['imagen'] = '';
            if (is_dir($pathVID . $vid[$i]->idgaleria . "/")) {
                if ($gestor = opendir($pathVID . $vid[$i]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathVID . $vid[$i]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $arr_vid[$i]['imagen'] = $publicPathVID . $vid[$i]->idgaleria . "/thumbs/" . $entrada;
                            break;
                        }
                    }
                }
            }
        }

        $dataProviderpc = new CArrayDataProvider($rawDataPC);
        $dataProviderci = new CArrayDataProvider($rawDataCI);
        $dataProviderec = new CArrayDataProvider($rawDataEC);
        $this->render('index', array('galeriaci' => $galeriaci, 'galeriapc' => $galeriapc, 'galeriaec' => $galeriaec, 'dataProviderci' => $dataProviderci, 'dataProviderec' => $dataProviderec, 'dataProviderpc' => $dataProviderpc, 'vid' => $arr_vid, 'page_ant_vid' => $page_ant_vid, 'page_act_vid' => 1, 'page_sig_vid' => $page_sig_vid, 'video' => $video));
    }

    public function actionLoadGallery($idgaleria, $tipo, $idmaterial = null) {
        $modelo = ucfirst($tipo);
        $contenido = '';
        $images = '';
        if ($idmaterial) {
            $info = $modelo::model()->findAll("idgaleria = '" . $idgaleria . "' AND idmaterial = '" . $idmaterial . "'", array('order' => 'created DESC'));
            $path = realpath(Yii::app()->getBasePath() . "/../images/materiales/" . $idmaterial . "/materialesgaleria/" . $idgaleria . "/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/images/materiales/" . $idmaterial . "/materialesgaleria/" . $idgaleria . "/";
        } else {
            $info = $modelo::model()->findAll("idgaleria = '" . $idgaleria . "'", array('order' => 'created DESC'));
            $path = realpath(Yii::app()->getBasePath() . "/../images/" . $tipo . "/" . $idgaleria . "/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/images/" . $tipo . "/" . $idgaleria . "/";
        }

        $contenido .= '
			<script type="text/javascript">
				$("div[id^=\"img' . $publicPath . '\"]").click(function(){
					var value = $("#img' . $tipo . '").attr("src");
					$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on");
					$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off");
					$("#img' . $tipo . '").attr("src",$(this).attr("id").substr(3));
					$(this).addClass("btn_cn_on");
				});
			</script>';

        if ($tipo == 'galeriaProyectoCocinas') {
            $contenido .= '
			<div class="imagen_izq_gal_proyecto">';
            if ($gestor = opendir($path)) {
                $cant = 0;
                $img = array();
                while (false !== ($entrada = readdir($gestor))) {
                    if (is_file($path . $entrada) && strpos($entrada, '.') > 0) {
                        $img[] = $entrada;
                    }
                }
                sort($img);
                foreach ($img as $val) {
                    $onclick = "seleccionar('$tipo','$val')";
                    if (is_file($path . $val) && strpos($val, '.') > 0) {
                        $cant++;
                        if ($cant === 1) {
                            $contenido .= '<img src="' . $publicPath . $val . '" border="0" id="img' . $tipo . '">';
                            $images .= '<div class="btn_izq_subgal">
								<div class="btn_cn_on" id="img' . $publicPath . $val . '"></div>';
                        } else {
                            $images .= '<div class="btn_cn_off" id="img' . $publicPath . $val . '"></div>';
                        }
                    }
                }
                if ($cant > 0) {
                    $images .= '</div>';
                }
            }
            $contenido .= '</div>
			<div class="cuadro_transp_texto_proyecto">
				<h3 class="texto_izq_subgal">
					<span class="texto_izq_subgal_italic">Diseño:</span><br/>' . $info[0]->titulo . '
					<br />
					<br />
					<span class="texto_izq_subgal"><span class="texto_izq_subgal_italic">Render:</span><br/>' . $info[0]->descripcion . '</span>
				</h3>
				' . $images . '
				<div class="texto_der_subgal" style="position:relative"><div style="position:absolute;bottom:0;right:0;">' . $info[0]->materiales . '</div></div>
			</div>';
        } else {
            $contenido .= '
			<div class="imagen_izq_gal2">
			<div class="imagen_ejem_gal1">';
            if ($gestor = opendir($path)) {
                $cant = 0;
                $img = array();
                while (false !== ($entrada = readdir($gestor))) {
                    if (is_file($path . $entrada) && strpos($entrada, '.') > 0) {
                        $img[] = $entrada;
                    }
                }
                sort($img);
                foreach ($img as $val) {
                    $onclick = "seleccionar('$tipo','$val')";
                    if (is_file($path . $val) && strpos($val, '.') > 0) {
                        $cant++;
                        if ($cant === 1) {
                            $contenido .= '<img src="' . $publicPath . $val . '" border="0" id="img' . $tipo . '">';
                            $images .= '<div class="btn_izq_subgal">
								<div class="btn_cn_on" id="img' . $publicPath . $val . '"></div>';
                        } else {
                            $images .= '<div class="btn_cn_off" id="img' . $publicPath . $val . '"></div>';
                        }
                    }
                }
                if ($cant > 0) {
                    $images .= '</div>';
                }
            }
            $contenido .= '</div>
			</div>
			<div class="linea_cn_vert_gal2"></div>
			<div class="cuadro_transp_texto">
				<h3 class="texto_titulo_izq_subgal">
					' . $info[0]->titulo . '
					<br />
					<br />
					<span class="texto_izq_subgal">' . $info[0]->descripcion . '</span>
				</h3>
				' . $images . '
				<div class="texto_der_subgal" style="position:relative"><div style="position:absolute;bottom:0;right:0;">' . $info[0]->materiales . '</div></div>
			</div>';
        }

        echo $contenido;
    }

    public function actionFirstGallery($idgaleria, $tipo, $idmaterial = null) {
        $modelo = ucfirst($tipo);
        $contenido = '';
        $images = '';
        if ($idmaterial) {
            $info = $modelo::model()->findAll("idgaleria = '" . $idgaleria . "' AND idmaterial = '" . $idmaterial . "'", array('order' => 'created DESC'));
            $path = realpath(Yii::app()->getBasePath() . "/../images/materiales/" . $idmaterial . "/materialesgaleria/" . $idgaleria . "/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/images/materiales/" . $idmaterial . "/materialesgaleria/" . $idgaleria . "/";
        } else {
            $info = $modelo::model()->findAll("idgaleria = '" . $idgaleria . "'", array('order' => 'created DESC'));
            $path = realpath(Yii::app()->getBasePath() . "/../images/" . $tipo . "/" . $idgaleria . "/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/images/" . $tipo . "/" . $idgaleria . "/";
        }

        $contenido .= '
			<script type="text/javascript">
				$( document ).ready(function() {
				$("div[id^=\"img' . $publicPath . '\"]").click(function(){
					var value = $("#img' . $tipo . '").attr("src");
					$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on");
					$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off");
					$("#img' . $tipo . '").attr("src",$(this).attr("id").substr(3));
					$(this).addClass("btn_cn_on");
				});
				});
			</script>';

        if ($tipo == 'galeriaProyectoCocinas') {
            $contenido .= '
			<div class="imagen_izq_gal_proyecto">';
            if ($gestor = opendir($path)) {
                $cant = 0;
                $img = array();
                while (false !== ($entrada = readdir($gestor))) {
                    if (is_file($path . $entrada) && strpos($entrada, '.') > 0) {
                        $img[] = $entrada;
                    }
                }
                sort($img);
                foreach ($img as $val) {
                    $onclick = "seleccionar('$tipo','$val')";
                    if (is_file($path . $val) && strpos($val, '.') > 0) {
                        $cant++;
                        if ($cant === 1) {
                            $contenido .= '<img src="' . $publicPath . $val . '" border="0" id="img' . $tipo . '">';
                            $images .= '<div class="btn_izq_subgal">
								<div class="btn_cn_on" id="img' . $publicPath . $val . '"></div>';
                        } else {
                            $images .= '<div class="btn_cn_off" id="img' . $publicPath . $val . '"></div>';
                        }
                    }
                }
                if ($cant > 0) {
                    $images .= '</div>';
                }
            }
            $contenido .= '</div>
			<div class="cuadro_transp_texto_proyecto">
				<h3 class="texto_izq_subgal">
					<span class="texto_izq_subgal_italic">Diseño:</span><br/>' . $info[0]->titulo . '
					<br />
					<br />
					<span class="texto_izq_subgal"><span class="texto_izq_subgal_italic">Render:</span><br/>' . $info[0]->descripcion . '</span>
				</h3>
				' . $images . '
				<div class="texto_der_subgal" style="position:relative"><div style="position:absolute;bottom:0;right:0;">' . $info[0]->materiales . '</div></div>
			</div>';
        } else {
            $contenido .= '
			<div class="imagen_izq_gal2">
			<div class="imagen_ejem_gal1">';
            if ($gestor = opendir($path)) {
                $cant = 0;
                $img = array();
                while (false !== ($entrada = readdir($gestor))) {
                    if (is_file($path . $entrada) && strpos($entrada, '.') > 0) {
                        $img[] = $entrada;
                    }
                }
                sort($img);
                foreach ($img as $val) {
                    $onclick = "seleccionar('$tipo','$val')";
                    if (is_file($path . $val) && strpos($val, '.') > 0) {
                        $cant++;
                        if ($cant === 1) {
                            $contenido .= '<img src="' . $publicPath . $val . '" border="0" id="img' . $tipo . '">';
                            $images .= '<div class="btn_izq_subgal">
								<div class="btn_cn_on" id="img' . $publicPath . $val . '"></div>';
                        } else {
                            $images .= '<div class="btn_cn_off" id="img' . $publicPath . $val . '"></div>';
                        }
                    }
                }
                if ($cant > 0) {
                    $images .= '</div>';
                }
            }
            $contenido .= '</div>
			</div>
			<div class="linea_cn_vert_gal2"></div>
			<div class="cuadro_transp_texto">
				<h3 class="texto_titulo_izq_subgal">
					' . $info[0]->titulo . '
					<br />
					<br />
					<span class="texto_izq_subgal">' . $info[0]->descripcion . '</span>
				</h3>
				' . $images . '
				<div class="texto_der_subgal" style="position:relative"><div style="position:absolute;bottom:0;right:0;">' . $info[0]->materiales . '</div></div>
			</div>';
        }

        return $contenido;
    }

    public function actionLoadvideos($page = 1) {
        // Videos
        $pathVID = realpath(Yii::app()->getBasePath() . "/../images/galeriaVideos/") . "/";
        $publicPathVID = Yii::app()->getBaseUrl() . "/images/galeriaVideos/";
        $arr_vid = array();
        //$vid = GaleriaVideos::model()->findAll('activo=1 order by prioridad DESC, created DESC limit 5');
        $vid = GaleriaVideos::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        if ($page < 1 || ($page * 5) > count($vid)) {
            $page = 1;
        }
        $salida['contenido'] = '';
        $salida['page_ant'] = 1;
        $salida['page_sig'] = 1;
        for ($i = ($page - 1) * 5; $i < count($vid) && $i < (($page - 1) * 5) + 5; $i++) {
            $arr_vid[$i]['titulo'] = $vid[$i]->titulo;
            $arr_vid[$i]['url'] = $vid[$i]->url;
            $arr_vid[$i]['autor'] = $vid[$i]->autor;
            $arr_vid[$i]['descripcion'] = $vid[$i]->descripcion;
            $arr_vid[$i]['imagen'] = '';
            if (is_dir($pathVID . $vid[$i]->idgaleria . "/")) {
                if ($gestor = opendir($pathVID . $vid[$i]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathVID . $vid[$i]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $arr_vid[$i]['imagen'] = $publicPathVID . $vid[$i]->idgaleria . "/thumbs/" . $entrada;
                            break;
                        }
                    }
                }
            }
            $salida['contenido'] .= '<a class="nombres_publicidad_youtube" style="text-decoration: none;width:100%;" href="' . "/galeria/index/video/" . $arr_vid[$i]['url'] . "#titulo_video" . '">';
            if ($arr_vid[$i]['imagen']) {
                $salida['contenido'] .= '<div class="ejemplo_y2_imagen">' . CHtml::image($arr_vid[$i]['imagen']) . '</div>';
            } else {
                $salida['contenido'] .= '<div class="ejemplo_y1_imagen"></div>';
            }
            $salida['contenido'] .= '<h3 class="nombres_publicidad_youtube">' . $arr_vid[$i]['titulo'] . '</h3>
		<div class="descripcion_0800_youtube">' . $arr_vid[$i]['autor'] . '</div>
		<div class="descripcion_publicidad_youtube">' . (strlen($arr_vid[$i]['descripcion']) <= 50 ? $arr_vid[$i]['descripcion'] : substr($arr_vid[$i]['descripcion'], 0, strrpos(substr($arr_vid[$i]['descripcion'], 0, 50), ' ')) . '...') . '</div>
		<div class="linea_hor_youtube"></div>';
            $salida['contenido'] .= '</a>';
        }
        if (count($vid) > (($page - 1) * 6) + 6) {
            $salida['page_sig'] = $page + 1;
        }
        if ($page > 1) {
            $salida['page_ant'] = $page - 1;
        }
        $salida['page_act'] = $page;
        echo json_encode($salida);
    }

}
