<?php

class TipsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/public';
	
	public function actionIndex()
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
		
		$tips = Tips::model()->findAll('activo=1 order by created DESC');
    	$rawDataTips = array();
	    for($i=0; $i<count($tips);$i++){
    		$rawDataTips[$i]=array(
    			'id'=>$tips[$i]->idtip,
    			'contenido'=> $tips[$i]->contenido,
    		);
    	}
		
    	$publicidad = Publicidadtips::model()->findAll('activo=1 order by RAND()');
		$arr_pub = array();
		
		$pathPUB = realpath( Yii::app( )->getBasePath( )."/../images/publicidadtips/" )."/";
    	$publicPathPUB = Yii::app( )->getBaseUrl( )."/images/publicidadtips/";
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
		$this->render('index',array('rawDataTips'=>$rawDataTips,'publicidad'=>$arr_pub,'recibenovedades'=>$recibenovedades));
		
	}
	
	public function actionFirstGallery($id)
	{
		$contenido = '';
		$images = '';
		$path = realpath( Yii::app( )->getBasePath( )."/../images/articulos/".$id."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/articulos/".$id."/";
		
			if (is_dir($path)){
				$contenido .= '
					<script type="text/javascript">
						$( document ).ready(function() {
						$("div[id^=\"img'.$publicPath.'\"]").click(function(){
							var value = $("#imgarticulos").attr("src");
							$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on");
							$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off");
							$("#imgarticulos").attr("src",$(this).attr("id").substr(3));
							$(this).addClass("btn_cn_on");
						});
						});
					</script>';
    			if ($gestor = opendir($path)) {
					$cant = 0;
					while (false !== ($entrada = readdir($gestor))) {
						//$onclick = "seleccionar('$tipo','$entrada')";
				    	if (is_file($path.$entrada)){
				    		$cant++;
				    		if ($cant === 1){
				    			$contenido .= '<div class="cuadro_transparente_nov">
								  <div class="imagen1_ejem_nov"><img src="'.$publicPath.$entrada.'" border="0" id="imgarticulos"></div>
									</div>';
				    			$images .= '<div class="btn_der_nov">
									<div class="btn_cn_on_nov" id="img'.$publicPath.$entrada.'"></div>';
				    		}else{
				    			$images .= '<div class="btn_cn_off_nov" id="img'.$publicPath.$entrada.'"></div>';
				    		}
				    	}
				    }
				    if ($cant > 0) {
				    	$images .= '</div>';
				    }
				}
			}
		
	    return $contenido;
	}

	/** If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tips the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tips::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}