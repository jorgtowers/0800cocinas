<?php

class SiteController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/public';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

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
        $cs->registerCssFile($baseUrl . '/css/0800inicio1.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio2.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');
        $cs->registerCssFile($baseUrl . '/css/0800publicidad.css');
        $cs->registerCssFile($baseUrl . '/css/0800youtube.css');

        $bienvenido = Bienvenidos::model()->findAll('activo=1 order by created DESC limit 1');
        $articulos = Articulos::model()->findAll('activo=1 order by RAND() limit 4');
        $secciones = Secciones::model()->findAll('1=1 order by RAND()');
        $articulohome = Articulohome::model()->findAll('activo=1 order by RAND() limit 1');
        $galeriahome = Galeriahome::model()->findAll('activo=1 order by RAND() limit 1');
        $video = GaleriaVideos::model()->findAll('home=1 order by RAND() limit 1');
        $publicidad = Publicidadinicio::model()->findAll('activo=1 order by RAND()');
        $arr_pub = array();
        $imagenarticulohome = '';
        $imagengaleriahome = '';

        if (!empty($articulohome)) {
            $pathAH = realpath(Yii::app()->getBasePath() . "/../images/articulohome/") . "/";
            $publicPathAH = Yii::app()->getBaseUrl() . "/images/articulohome/";
            if (is_dir($pathAH . $articulohome[0]->idarticulo . "/")) {
                if ($gestor = opendir($pathAH . $articulohome[0]->idarticulo . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathAH . $articulohome[0]->idarticulo . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imagenarticulohome = $publicPathAH . $articulohome[0]->idarticulo . "/" . $entrada;
                            break;
                        }
                    }
                }
            }
        }

        if (!empty($galeriahome)) {
            $pathGH = realpath(Yii::app()->getBasePath() . "/../images/galeriahome/") . "/";
            $publicPathGH = Yii::app()->getBaseUrl() . "/images/galeriahome/";
            if (is_dir($pathGH . $galeriahome[0]->idgaleria . "/")) {
                if ($gestor = opendir($pathGH . $galeriahome[0]->idgaleria . "/")) {
                    /* Esta es la forma correcta de iterar sobre el directorio. */
                    while (false !== ($entrada = readdir($gestor))) {
                        if (is_file($pathGH . $galeriahome[0]->idgaleria . "/" . $entrada) && strpos($entrada, '.') > 0) {
                            $imagengaleriahome = $publicPathGH . $galeriahome[0]->idgaleria . "/" . $entrada;
                            break;
                        }
                    }
                }
            }
        }

        $pathPUB = realpath(Yii::app()->getBasePath() . "/../images/publicidadinicio/") . "/";
        $publicPathPUB = Yii::app()->getBaseUrl() . "/images/publicidadinicio/";
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

        // Videos
        $pathVID = realpath(Yii::app()->getBasePath() . "/../images/galeriaVideos/") . "/";
        $publicPathVID = Yii::app()->getBaseUrl() . "/images/galeriaVideos/";
        $arr_vid = array();
        //$vid = GaleriaVideos::model()->findAll('activo=1 order by RAND() limit 5');
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

        $recibenovedades = new Recibenovedades;
        $this->render('index', array('bienvenido' => $bienvenido, 'articulos' => $articulos, 'secciones' => $secciones, 'articulohome' => $articulohome, 'galeriahome' => $galeriahome, 'imagenarticulohome' => $imagenarticulohome, 'imagengaleriahome' => $imagengaleriahome, 'vid' => $arr_vid, 'page_ant_vid' => $page_ant_vid, 'page_act_vid' => 1, 'page_sig_vid' => $page_sig_vid, 'publicidad' => $arr_pub, 'recibenovedades' => $recibenovedades, 'video' => $video));
    }

    public function actionLoadvideos($page = 1) {
        // Videos
        $pathVID = realpath(Yii::app()->getBasePath() . "/../images/galeriaVideos/") . "/";
        $publicPathVID = Yii::app()->getBaseUrl() . "/images/galeriaVideos/";
        $arr_vid = array();
        //$vid = GaleriaVideos::model()->findAll('activo=1 order by prioridad DESC, created DESC limit 5');
        $vid = GaleriaVideos::model()->findAll(array('condition' => 'activo=1', 'order' => 'prioridad DESC, created DESC'));
        if ($page < 1 || (($page-1) * 5) > count($vid)) {
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

    public function actionTerminosycondiciones() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800articulos.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio1.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio2.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');

        $this->render('terminosycondiciones');
    }

    public function actionSuscripcion() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800articulos.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio1.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio2.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');

        $this->render('suscripcion');
    }

    public function actionErrornewsletter() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800articulos.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio1.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio2.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');

        $this->render('errornewsletter');
    }

    public function actionCorreoexiste() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800articulos.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio1.css');
        $cs->registerCssFile($baseUrl . '/css/0800inicio2.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto1.css');
        $cs->registerCssFile($baseUrl . '/css/0800irdirecto2.css');

        $this->render('correoexiste');
    }

    public function actionContacto($enviado = 0) {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        
        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl . '/css/0800contacto.css');
        $cs->registerCssFile($baseUrl . '/css/0800tips.css');

        $contactoForm = new Contacto;
        $recibenovedades = new Recibenovedades;
        
        if (isset($_POST['Contacto'])) {
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,'https://www.google.com/recaptcha/api/siteverify?secret=6LelPRwUAAAAAPIqM6f4IZzom8XEbYqfTB-MOTos&response='.$_POST['g-recaptcha-response']);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$data = curl_exec($ch);
                        
			if (strpos($data,'"success": true') === false || $data === false){
                               
				$this->redirect('contacto/enviado/2#titulo_formulario');
			} else {
                                
				$contactoForm->attributes = $_POST['Contacto'];
				$message = new YiiMailMessage;
				$message->view = 'contactococinas';
				$message->setBody(array('contactoForm' => $contactoForm), 'text/html');
				$message->subject = 'Contacto formulario 0800cocinas.com';
				$message->addTo('0800cocinas@gmail.com');
				$message->from = '0800cocinas@gmail.com';
                                
				if (Yii::app()->mail->send($message)) {
					$message2 = new YiiMailMessage;
					$message2->view = 'contactocliente';
					$message2->setBody('', 'text/html');
					$message2->subject = 'Contacto formulario 0800cocinas.com';
					$message2->addTo($contactoForm->email);
					$message2->from = '0800cocinas@gmail.com';
					Yii::app()->mail->send($message2);
					$enviado = 1;
				}
				$this->redirect('contacto/enviado/1#titulo_formulario');
			}
        }

        $this->render('contacto', array('contactoForm' => $contactoForm, 'recibenovedades' => $recibenovedades, 'enviado' => $enviado));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
            if (!Yii::app()->user->isGuest) {
                $this->layout = 'admin';
            }
            $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $recibenovedades = new Recibenovedades;
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }

        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}