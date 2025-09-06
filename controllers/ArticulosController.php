<?php

class ArticulosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/public';

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//$this->render('index',array('galeriaci'=>$galeriaci,'galeriapc'=>$galeriapc,'galeriaec'=>$galeriaec,'dataProviderci'=>$dataProviderci,'dataProviderec'=>$dataProviderec,'dataProviderpc'=>$dataProviderpc));
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$baseUrl = Yii::app()->theme->baseUrl; 
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($baseUrl.'/css/0800articulos.css');
		$cs->registerCssFile($baseUrl.'/css/0800irdirecto1.css');
		$cs->registerCssFile($baseUrl.'/css/0800irdirecto2.css');
		$cs->registerCssFile($baseUrl.'/css/0800materiales.css');
		$cs->registerCssFile($baseUrl.'/css/0800publicidad.css');
		$cs->registerCssFile($baseUrl.'/css/0800tips.css');
		$cs->registerCssFile($baseUrl.'/css/0800youtube.css');
		
		$galeria = $this->actionFirstGallery($id);
		$articulos = Articulos::model()->findAll('activo=1 order by created DESC limit 12');
		
		$publicidad = Publicidadarticulos::model()->findAll('activo=1 order by RAND()');
		$arr_pub = array();
		
		$pathPUB = realpath( Yii::app( )->getBasePath( )."/../images/publicidadarticulos/" )."/";
    	$publicPathPUB = Yii::app( )->getBaseUrl( )."/images/publicidadarticulos/";
		for($i=0;$i<count($publicidad);$i++){
	    	if (is_dir($pathPUB.$publicidad[$i]->idpublicidad."/")){
	    		if ($gestor = opendir($pathPUB.$publicidad[$i]->idpublicidad."/")) {
				    /* Esta es la forma correcta de iterar sobre el directorio. */
				    while (false !== ($entrada = readdir($gestor))) {
				    	if (is_file($pathPUB.$publicidad[$i]->idpublicidad."/".$entrada) && strpos($entrada, '.')>0){
				    		$arr_pub[$i]['img'] = $publicPathPUB.$publicidad[$i]->idpublicidad."/thumbs/".$entrada;
				    		$arr_pub[$i]['titulo'] = $publicidad[$i]->titulo;
				    		$arr_pub[$i]['url'] = $publicidad[$i]->url;
				    		break;
				    	}
				    }
		    	}
	    	}
		}
		$recibenovedades = new Recibenovedades;
		$this->render('view',array(
			'model'=>$this->loadModel($id),'articulos'=>$articulos,'galeria'=>$galeria,'publicidad'=>$arr_pub,'recibenovedades'=>$recibenovedades
		));
		
	}
	
	public function actionFirstGallery($id)
	{
		$contenido = '';
		$script = '';
		$principal = '';
		$images = '';
		$path = realpath( Yii::app( )->getBasePath( )."/../images/articulos/".$id."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/articulos/".$id."/";
		
			if (is_dir($path)){
				$script .= '
					<script type="text/javascript">
				$( document ).ready(function() {
				$("div[id^=\"img'.$publicPath.'\"]").click(function(){
					var value = $("#imgarticulos").attr("src");
					$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on_nov");
					$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off_nov");
					$("#imgarticulos").attr("src",$(this).attr("id").substr(3));
					$(this).addClass("btn_cn_on_nov");
				});
				});
			</script>';
    			if ($gestor = opendir($path)) {
					$cant = 0;
					$arr_img = array();
					while (false !== ($entrada = readdir($gestor))) {
						//$onclick = "seleccionar('$tipo','$entrada')";
				    	if (is_file($path.$entrada)){
				    		$cant++;
				    		$arr_img[]=$publicPath.$entrada;
				    	}
				    }
				    rsort($arr_img);
					for ($i=0;$i<$cant;$i++){
			    		if ($i === 0 && $cant === 1){
				    			$principal .= '<div class="cuadro_transparente_nov">
								  <div class="imagen1_ejem_nov"><img src="'.$arr_img[$i].'" border="0" id="imgarticulos" width="565"></div>
									</div>';
				    			$contenido .= '<div class="btn_der_nov">
									<div class="btn_cn_on_nov" id="img'.$arr_img[$i].'"></div>';
				    	} elseif ($i === 0){
			    			$contenido .= '<div class="btn_der_nov">
								<div class="btn_cn_off_nov" id="img'.$arr_img[$i].'"></div>';
			    		} elseif ($i === $cant-1){
			    			$principal .= '<div class="cuadro_transparente_nov">
							  <div class="imagen1_ejem_nov"><img src="'.$arr_img[$i].'" border="0" id="imgarticulos" width="565"></div>
								</div>';
			    			$contenido .= '<div class="btn_cn_on_nov" id="img'.$arr_img[$i].'"></div>';
			    		}else{
			    			$contenido .= '<div class="btn_cn_off_nov" id="img'.$arr_img[$i].'"></div>';
			    		}
					}
				    if ($cant > 0) {
				    	$contenido .= '</div>';
				    }
				}
			}
		
	    return $script.$principal.$contenido;
	}

	/** If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Articulos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Articulos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}