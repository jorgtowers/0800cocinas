<?php

class NovedadesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/public';

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800articulos.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');
        $cs->registerCssFile($baseUrl . '/css/0800publicidad.css');
        $cs->registerCssFile($baseUrl . '/css/0800tips.css');
        $cs->registerCssFile($baseUrl . '/css/0800youtube.css');

        $articulos = Articulos::model()->findAll('activo=1 order by created DESC');
        $rawDataArticulos = array();
        $pathArticulos = realpath(Yii::app()->getBasePath() . "/../images/articulos/") . "/";
        $publicPathArticulos = Yii::app()->getBaseUrl() . "/images/articulos/";
        $page_ant_art = 1;
        $page_sig_art = count($articulos) > 6 ? 2 : 1;
        $imgArt = array();
        for ($i = 0; $i < count($articulos) && $i < 6; $i++) {
            if (is_dir($pathArticulos . $articulos[$i]->idarticulo . "/")) {
                if ($gestor = opendir($pathArticulos . $articulos[$i]->idarticulo . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathArticulos . $articulos[$i]->idarticulo . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgArt[$i][] = $entrada;
                        }
                    }
                }
            }
            $rawDataArticulos[$i] = array(
                'id' => $articulos[$i]->idarticulo,
                'titulo' => (strlen($articulos[$i]->titulo) <= 23 ? $articulos[$i]->titulo : substr($articulos[$i]->titulo, 0, strrpos(substr($articulos[$i]->titulo, 0, 23), ' ')) . '...'),
                'subtitulo' => (strlen($articulos[$i]->subtitulo) <= 32 ? $articulos[$i]->subtitulo : substr($articulos[$i]->subtitulo, 0, strrpos(substr($articulos[$i]->subtitulo, 0, 27), ' ')) . '...'),
                'file_name' => 'no',
                'url' => '../articulos/view/' . $articulos[$i]->idarticulo,
            );
            if (!empty($imgArt[$i])) {
                sort($imgArt[$i]);
                $rawDataArticulos[$i]['file_name'] = $publicPathArticulos . $articulos[$i]->idarticulo . "/thumbs/" . $imgArt[$i][0];
            }
        }

        $eventos = Eventos::model()->findAll('activo=1 order by created DESC');
        $rawDataEventos = array();
        $pathEventos = realpath(Yii::app()->getBasePath() . "/../images/eventos/") . "/";
        $publicPathEventos = Yii::app()->getBaseUrl() . "/images/eventos/";
        $page_ant_eve = 1;
        $page_sig_eve = count($eventos) > 6 ? 2 : 1;
        $imgEv = array();
        for ($i = 0; $i < count($eventos) && $i < 6; $i++) {
            if (is_dir($pathEventos . $eventos[$i]->idevento . "/")) {
                if ($gestor = opendir($pathEventos . $eventos[$i]->idevento . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathEventos . $eventos[$i]->idevento . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgEv[$i][] = $entrada;
                        }
                    }
                }
            }
            $rawDataEventos[$i] = array(
                'id' => $eventos[$i]->idevento,
                'titulo' => (strlen($eventos[$i]->titulo) <= 23 ? $eventos[$i]->titulo : substr($eventos[$i]->titulo, 0, strrpos(substr($eventos[$i]->titulo, 0, 23), ' ')) . '...'),
                'subtitulo' => (strlen($eventos[$i]->subtitulo) <= 32 ? $eventos[$i]->subtitulo : substr($eventos[$i]->subtitulo, 0, strrpos(substr($eventos[$i]->subtitulo, 0, 27), ' ')) . '...'),
                'file_name' => 'no',
                'url' => '../eventos/view/' . $eventos[$i]->idevento,
            );
            if (!empty($imgEv[$i])) {
                sort($imgEv[$i]);
                $rawDataEventos[$i]['file_name'] = $publicPathEventos . $eventos[$i]->idevento . "/thumbs/" . $imgEv[$i][0];
            }
        }

        $tips = Tips::model()->findAll('activo=1 order by created DESC limit 4');
        $rawDataTips = array();
        for ($i = 0; $i < count($tips); $i++) {
            $rawDataTips[$i] = array(
                'id' => $tips[$i]->idtip,
                'contenido' => (strlen($tips[$i]->contenido) <= 150 ? $tips[$i]->contenido : substr($tips[$i]->contenido, 0, strrpos(substr($tips[$i]->contenido, 0, 150), ' ')) . '...'),
            );
        }

        $nosotros = Nosotros::model()->findAll('activo=1 order by created DESC limit 12');
        $rawDataNosotros = array();
        for ($i = 0; $i < count($nosotros); $i++) {
            $rawDataNosotros[$i] = array(
                'id' => $nosotros[$i]->idnosotros,
                'contenido' => $nosotros[$i]->titulo,
                'url' => '../nosotros/view/' . $nosotros[$i]->idnosotros,
            );
        }

        $publicidad = Publicidadnovedades::model()->findAll('activo=1 order by RAND()');
        $arr_pub = array();

        $pathPUB = realpath(Yii::app()->getBasePath() . "/../images/publicidadnovedades/") . "/";
        $publicPathPUB = Yii::app()->getBaseUrl() . "/images/publicidadnovedades/";
        for ($i = 0; $i < count($publicidad); $i++) {
            if (is_dir($pathPUB . $publicidad[$i]->idpublicidad . "/")) {
                if ($gestor = opendir($pathPUB . $publicidad[$i]->idpublicidad . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathPUB . $publicidad[$i]->idpublicidad . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $arr_pub[$i]['img'] = $publicPathPUB . $publicidad[$i]->idpublicidad . "/thumbs/" . $entrada;
                            $arr_pub[$i]['titulo'] = $publicidad[$i]->titulo;
                            $arr_pub[$i]['url'] = $publicidad[$i]->url;
                            break;
                        }
                    }
                }
            }
        }
        $recibenovedades = new Recibenovedades;
        $this->render('index', array('rawDataArticulos' => $rawDataArticulos, 'page_ant_art' => $page_ant_art, 'page_act_art' => 1, 'page_sig_art' => $page_sig_art, 'rawDataEventos' => $rawDataEventos, 'page_ant_eve' => $page_ant_eve, 'page_act_eve' => 1, 'page_sig_eve' => $page_sig_eve, 'rawDataTips' => $rawDataTips, 'rawDataNosotros' => $rawDataNosotros, 'publicidad' => $arr_pub, 'recibenovedades' => $recibenovedades));
    }

    public function actionLoadarticulos($page = 1) {
        $articulos = Articulos::model()->findAll('activo=1 order by created DESC');
        $rawDataArticulos = array();
        $pathArticulos = realpath(Yii::app()->getBasePath() . "/../images/articulos/") . "/";
        $publicPathArticulos = Yii::app()->getBaseUrl() . "/images/articulos/";
        $imgArt = array();
        if ($page < 1 || (($page-1) * 6) > count($articulos)) {
            $page = 1;
        }
        $salida['contenido'] = '';
        $salida['page_ant'] = 1;
        $salida['page_sig'] = 1;
        for ($i = ($page - 1) * 6; $i < count($articulos) && $i < (($page - 1) * 6) + 6; $i++) {
            if (is_dir($pathArticulos . $articulos[$i]->idarticulo . "/")) {
                if ($gestor = opendir($pathArticulos . $articulos[$i]->idarticulo . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathArticulos . $articulos[$i]->idarticulo . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgArt[$i][] = $entrada;
                        }
                    }
                }
            }
            $rawDataArticulos[$i] = array(
                'id' => $articulos[$i]->idarticulo,
                'titulo' => (strlen($articulos[$i]->titulo) <= 23 ? $articulos[$i]->titulo : substr($articulos[$i]->titulo, 0, strrpos(substr($articulos[$i]->titulo, 0, 23), ' ')) . '...'),
                'subtitulo' => (strlen($articulos[$i]->subtitulo) <= 32 ? $articulos[$i]->subtitulo : substr($articulos[$i]->subtitulo, 0, strrpos(substr($articulos[$i]->subtitulo, 0, 27), ' ')) . '...'),
                'file_name' => 'no',
                'url' => '../articulos/view/' . $articulos[$i]->idarticulo,
            );
            if (!empty($imgArt[$i])) {
                sort($imgArt[$i]);
                $rawDataArticulos[$i]['file_name'] = $publicPathArticulos . $articulos[$i]->idarticulo . "/thumbs/" . $imgArt[$i][0];
            }

            $salida['contenido'] .= '<div class="caja_titulos_nov_index">';
            $salida['contenido'] .= CHtml::link(
                            (($rawDataArticulos[$i]['file_name'] != 'no') ?
                                    '<div class="imagen_seleccion_articulos"><div>' . CHtml::image($rawDataArticulos[$i]['file_name']) . '</div></div>' :
                                    '<div class="imagen_seleccion_articulos"><div class="imagen2_selec_nov_art"></div></div>') .
                            '<h2 class="texto_titulo_nov">' . $rawDataArticulos[$i]['titulo'] . '</h2>' .
                            '<div class="texto_subtitulo_nov">' . $rawDataArticulos[$i]['subtitulo'] . '</div>', $rawDataArticulos[$i]['url'] . "#titulo"
            );
            $salida['contenido'] .= '</div>';
        }
        if (count($articulos) > (($page - 1) * 6) + 6) {
            $salida['page_sig'] = $page + 1;
        }
        if ($page > 1) {
            $salida['page_ant'] = $page - 1;
        }
        $salida['page_act'] = $page;
        echo json_encode($salida);
    }

    public function actionLoadeventos($page = 1) {
        $eventos = Eventos::model()->findAll('activo=1 order by created DESC');
        $rawDataEventos = array();
        $pathEventos = realpath(Yii::app()->getBasePath() . "/../images/eventos/") . "/";
        $publicPathEventos = Yii::app()->getBaseUrl() . "/images/eventos/";
        $imgEv = array();
        if ($page < 1 || (($page-1) * 6) > count($eventos)) {
            $page = 1;
        }
        $salida['contenido'] = '';
        $salida['page_ant'] = 1;
        $salida['page_sig'] = 1;
        for ($i = ($page - 1) * 6; $i < count($eventos) && $i < (($page - 1) * 6) + 6; $i++) {
            if (is_dir($pathEventos . $eventos[$i]->idevento . "/")) {
                if ($gestor = opendir($pathEventos . $eventos[$i]->idevento . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathEventos . $eventos[$i]->idevento . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imgEv[$i][] = $entrada;
                        }
                    }
                }
            }
            $rawDataEventos[$i] = array(
                'id' => $eventos[$i]->idevento,
                'titulo' => (strlen($eventos[$i]->titulo) <= 23 ? $eventos[$i]->titulo : substr($eventos[$i]->titulo, 0, strrpos(substr($eventos[$i]->titulo, 0, 23), ' ')) . '...'),
                'subtitulo' => (strlen($eventos[$i]->subtitulo) <= 32 ? $eventos[$i]->subtitulo : substr($eventos[$i]->subtitulo, 0, strrpos(substr($eventos[$i]->subtitulo, 0, 27), ' ')) . '...'),
                'file_name' => 'no',
                'url' => '../eventos/view/' . $eventos[$i]->idevento,
            );
            if (!empty($imgEv[$i])) {
                sort($imgEv[$i]);
                $rawDataEventos[$i]['file_name'] = $publicPathEventos . $eventos[$i]->idevento . "/thumbs/" . $imgEv[$i][0];
            }
            
            $salida['contenido'] .= '<div class="caja_titulos_nov_index">';
            $salida['contenido'] .= CHtml::link(
                            (($rawDataEventos[$i]['file_name'] != 'no') ?
                                    '<div class="imagen_seleccion_articulos"><div>' . CHtml::image($rawDataEventos[$i]['file_name']) . '</div></div>' :
                                    '<div class="imagen_seleccion_articulos"><div class="imagen2_selec_nov_art"></div></div>') .
                            '<h2 class="texto_titulo_nov">' . $rawDataEventos[$i]['titulo'] . '</h2>' .
                            '<div class="texto_subtitulo_nov">' . $rawDataEventos[$i]['subtitulo'] . '</div>', $rawDataEventos[$i]['url'] . "#titulo"
            );
            $salida['contenido'] .= '</div>';
        }
        if (count($eventos) > (($page - 1) * 6) + 6) {
            $salida['page_sig'] = $page + 1;
        }
        if ($page > 1) {
            $salida['page_ant'] = $page - 1;
        }
        $salida['page_act'] = $page;
        echo json_encode($salida);
    }

}
