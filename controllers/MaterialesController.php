<?php

class MaterialesController extends Controller
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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$baseUrl = Yii::app()->theme->baseUrl; 
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($baseUrl.'/css/0800irdirecto2.css');
		$cs->registerCssFile($baseUrl.'/css/0800materiales.css');
		$cs->registerCssFile($baseUrl.'/css/0800publicidad.css');
		$cs->registerCssFile($baseUrl.'/css/0800tips.css');
		$cs->registerCssFile($baseUrl.'/css/0800youtube.css');
		
		$datosMaterial = array();
		$dataProvider = array();
		$primeraGaleria = array();
		$materiales = Materiales::model()->findAll('activo=1');
		for($i=0; $i<count($materiales);$i++){
			$rawDataGaleria = array();
			$primeraGaleria[$i] = ''; 
		    $galerias = MaterialesGaleria::model()->findAll(array('condition'=>'activo=1 AND idmaterial='.$materiales[$i]->idmaterial, 'order'=>'prioridad DESC, created DESC'));
			$pathGaleria = realpath( Yii::app( )->getBasePath( )."/../images/materiales/".$materiales[$i]->idmaterial."/materialesGaleria/" )."/";
		    $publicPathGaleria = Yii::app( )->getBaseUrl( )."/images/materiales/".$materiales[$i]->idmaterial."/materialesGaleria/";
		    for($j=0; $j<count($galerias);$j++){
		    	$imgGaleria = array();
		    	if (is_dir($pathGaleria.$galerias[$j]->idgaleria."/selec/")) {
		    		if ($gestor = opendir($pathGaleria.$galerias[$j]->idgaleria."/selec/")) {
		    			/* Esta es la forma correcta de iterar sobre el directorio. */
					    while (false !== ($entrada = readdir($gestor))) {
					    	if (is_file($pathGaleria.$galerias[$j]->idgaleria."/selec/".$entrada) && strpos($entrada, '.')>0){
					    		$imgGaleria[$j][] = $entrada;					    		
					    	}
					    }
					}
		    	}
		    	if (!empty($imgGaleria)){
		    		
		    		foreach ($imgGaleria as $key => $val){
		    			if (count($val)>0 && count($val)<3){
							sort($val);
							if (empty($rawDataGaleria)){
								$primeraGaleria[$i] = $this->actionFirstGallery($materiales[$i]->idmaterial,$galerias[$key]->idgaleria,(strpos(strtolower($materiales[$i]->titulo), 'superficie')!==false?'superficie':'otro'));
							}
							$rawDataGaleria[]=array(
								'id'=>$materiales[$i]->idmaterial.'_'.$galerias[$key]->idgaleria,
								'file_name'=>$publicPathGaleria.$galerias[$key]->idgaleria."/selec/".$val[0],
								'thumb_name'=>$publicPathGaleria.$galerias[$key]->idgaleria."/selec/".$val[0],
								'link_id'=>$this->createUrl('materiales/loadGallery/idmaterial/'.$materiales[$i]->idmaterial.'/idgaleria/'.$galerias[$key]->idgaleria.'/tipo/'.(strpos(strtolower($materiales[$i]->titulo), 'superficie')!==false?'superficie':'otro').'/'),
							);
		    			}
		    		}
		    		if (!empty($rawDataGaleria)){
		    			$dataProvider[$i] = new CArrayDataProvider($rawDataGaleria);
		    			$datosMaterial[$i]['titulo'] = $materiales[$i]->titulo;
		    			$datosMaterial[$i]['descripcion'] = $materiales[$i]->descripcion;
		    		}
		    	}
		    } 
		}
		
		$publicidad = Publicidadmateriales::model()->findAll('activo=1 order by RAND()');
		$arr_pub = array();
		
		$pathPUB = realpath( Yii::app( )->getBasePath( )."/../images/publicidadmateriales/" )."/";
    	$publicPathPUB = Yii::app( )->getBaseUrl( )."/images/publicidadmateriales/";
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
		
		$tips = Tips::model()->findAll('activo=1 order by created DESC limit 4');
    	$rawDataTips = array();
	    for($i=0; $i<count($tips);$i++){
    		$rawDataTips[$i]=array(
    			'id'=>$tips[$i]->idtip,
    			'contenido'=> $tips[$i]->contenido,
    		);
    	}
		
		// Videos
		$pathVID = realpath( Yii::app( )->getBasePath( )."/../images/galeriaVideos/" )."/";
    	$publicPathVID = Yii::app( )->getBaseUrl( )."/images/galeriaVideos/";
		$arr_vid = array();
		$vid = GaleriaVideos::model()->findAll('activo=1 order by RAND() limit 5');
		for ($i=0; $i<count($vid);$i++){
			$arr_vid[$i]['titulo']=$vid[$i]->titulo;
			$arr_vid[$i]['url']=$vid[$i]->url;
			$arr_vid[$i]['autor']=$vid[$i]->autor;
			$arr_vid[$i]['descripcion']=$vid[$i]->descripcion;
			$arr_vid[$i]['imagen']='';
			if (is_dir($pathVID.$vid[$i]->idgaleria."/")){
	    		if ($gestor = opendir($pathVID.$vid[$i]->idgaleria."/")) {
				    /* Esta es la forma correcta de iterar sobre el directorio. */
				    while (false !== ($entrada = readdir($gestor))) {
				    	if (is_file($pathVID.$vid[$i]->idgaleria."/".$entrada) && strpos($entrada, '.')>0){
				    		$arr_vid[$i]['imagen'] = $publicPathVID.$vid[$i]->idgaleria."/thumbs/".$entrada;
				    		break;
				    	}
				    }
		    	}
	    	}
		}

		$recibenovedades = new Recibenovedades;
		
		$this->render('index',array('dataProvider'=>$dataProvider,'datosMaterial'=>$datosMaterial,'primeraGaleria'=>$primeraGaleria,'publicidad'=>$arr_pub,'rawDataTips'=>$rawDataTips,'vid'=>$arr_vid,'recibenovedades'=>$recibenovedades));
	}
	
	public function actionLoadGallery($idmaterial,$idgaleria,$tipo)
	{
		$contenido='';
		$images='';
		$info = MaterialesGaleria::model()->findAll("idgaleria = '".$idgaleria."' AND idmaterial = '".$idmaterial."'");
	    $path = realpath( Yii::app( )->getBasePath( )."/../images/materiales/".$idmaterial."/materialesGaleria/".$idgaleria."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/materiales/".$idmaterial."/materialesGaleria/".$idgaleria."/";
	    $imgGaleria = array();
	    $interna = '';
		if (is_dir($path."/selec/")) {
    		if ($gestor = opendir($path."/selec/")) {
			    /* Esta es la forma correcta de iterar sobre el directorio. */
			    while (false !== ($entrada = readdir($gestor))) {
			    	if (is_file($path."/selec/".$entrada) && strpos($entrada, '.')>0){
			    		$imgGaleria[] = $entrada;
			    	}
			    }
			}
    	}
    	if (array_key_exists(1, $imgGaleria)){
    		sort($imgGaleria);
    		$interna = '<img src="'.$publicPath."selec/".$imgGaleria[1].'" border="0" id="imginterna'.$idmaterial.'_'.$idgaleria.'">'; 
    	}
		$contenido .= '
			<script type="text/javascript">
				$("div[id^=\"img'.$publicPath.'\"]").click(function(){
					var value = $("#img'.$idmaterial.'").attr("src");
					$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on");
					$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off");
					$("#img'.$idmaterial.'").attr("src",$(this).attr("id").substr(3));
					$(this).addClass("btn_cn_on");
				});
			</script>';

		if ($tipo=='superficie'){
			$contenido .= '
			<div class="imagen_izq_mat">
				<div class="imagen_ejem_superficie">';
				if ($gestor = opendir($path)) {
					$cant = 0;
					$img = array();
					while (false !== ($entrada = readdir($gestor))) {
						if (is_file($path.$entrada) && strpos($entrada, '.')>0){
							$img[] = $entrada;
						}
				    }
				    sort($img);
				    foreach ($img as $val){
						if (is_file($path.$val) && strpos($val, '.')>0){
				    		$cant++;
				    		if ($cant === 1){
				    			$contenido .= '<img src="'.$publicPath.$val.'" border="0" id="img'.$idmaterial.'">';
				    			$images .= '
									<div class="btn_cn_on" id="img'.$publicPath.$val.'"></div>';
				    		}else{
				    			$images .= '<div class="btn_cn_off" id="img'.$publicPath.$val.'"></div>';
				    		}
				    	}
				    }
				}
			    $contenido .= '</div>
				<div class="cuadro_transp_texto_superficie">
					<div class="titulo_der_superficie">'.$info[0]->titulo.'</div>
					<div class="texto_izq_color"></div>
					<div class="titulo2_der_superficie"></div>
					<div class="btn_der_subgal">'.$images.'</div>
					<div class="texto_izq_superficie" style="position:relative;height:160px;"><div style="position:absolute;bottom:0;right:0;">'.$info[0]->materiales.'</div></div>
				</div>
				<div class="cuadro_inf_texto_superficie">'.$info[0]->descripcion.'</div>
			</div>';
		} else {
			$contenido .= '
			<div class="imagen_izq_mat">
				<div class="imagen_ejem_mat1">';
				if ($gestor = opendir($path)) {
					$cant = 0;
					$img = array();
					while (false !== ($entrada = readdir($gestor))) {
						if (is_file($path.$entrada) && strpos($entrada, '.')>0){
							$img[] = $entrada;
						}
				    }
				    sort($img);
				    foreach ($img as $val){
						if (is_file($path.$val) && strpos($val, '.')>0){
				    		$cant++;
				    		if ($cant === 1){
				    			$contenido .= '<img src="'.$publicPath.$val.'" border="0" id="img'.$idmaterial.'">';
				    			$images .= '<div class="btn_cn_on" id="img'.$publicPath.$val.'"></div>';
				    		}else{
				    			$images .= '<div class="btn_cn_off" id="img'.$publicPath.$val.'"></div>';
				    		}
				    	}
				    }
				}
			    $contenido .= '</div>
				<div class="cuadro_transp_texto_mat">
					<div class="imagen_ejem_mat1a">'.$interna.'</div>
					<div class="texto_der_submat">'.$info[0]->titulo.'</div>
					<div class="btn_izq_subgal">'.$images.'</div>
					<div class="texto_izq_submat" style="position:relative;height:147px;"><div style="position:absolute;bottom:0;right:0;">'.$info[0]->materiales.'</div></div>
				</div>
			</div>';
		}
		
	    echo $contenido;
	}
	
	public function actionFirstGallery($idmaterial,$idgaleria,$tipo)
	{
		$contenido='';
		$images='';
		$info = MaterialesGaleria::model()->findAll("idgaleria = '".$idgaleria."' AND idmaterial = '".$idmaterial."'");
	    $path = realpath( Yii::app( )->getBasePath( )."/../images/materiales/".$idmaterial."/materialesGaleria/".$idgaleria."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/materiales/".$idmaterial."/materialesGaleria/".$idgaleria."/";
	    $imgGaleria = array();
	    $interna = '';
		if (is_dir($path."/selec/")) {
    		if ($gestor = opendir($path."selec/")) {
			    /* Esta es la forma correcta de iterar sobre el directorio. */
			    while (false !== ($entrada = readdir($gestor))) {
			    	if (is_file($path."selec/".$entrada) && strpos($entrada, '.')>0){
			    		$imgGaleria[] = $entrada;
			    	}
			    }
			}
    	}
    	if (array_key_exists(1, $imgGaleria)){
    		sort($imgGaleria);
    		$interna = '<img src="'.$publicPath."selec/".$imgGaleria[1].'" border="0" id="imginterna'.$idmaterial.'_'.$idgaleria.'">'; 
    	}
		$contenido .= '
			<script type="text/javascript">
				$( document ).ready(function() {
				$("div[id^=\"img'.$publicPath.'\"]").click(function(){
					var value = $("#img'.$idmaterial.'").attr("src");
					$("div[id^=\"img"+value+"\"]").removeClass("btn_cn_on");
					$("div[id^=\"img"+value+"\"]").addClass("btn_cn_off");
					$("#img'.$idmaterial.'").attr("src",$(this).attr("id").substr(3));
					$(this).addClass("btn_cn_on");
				});
				});
			</script>';

		if ($tipo=='superficie'){
			$contenido .= '
			<div class="imagen_izq_mat">
				<div class="imagen_ejem_superficie">';
				if ($gestor = opendir($path)) {
					$cant = 0;
					$img = array();
					while (false !== ($entrada = readdir($gestor))) {
						if (is_file($path.$entrada) && strpos($entrada, '.')>0){
							$img[] = $entrada;
						}
				    }
				    sort($img);
				    foreach ($img as $val){
						if (is_file($path.$val) && strpos($val, '.')>0){
				    		$cant++;
				    		if ($cant === 1){
				    			$contenido .= '<img src="'.$publicPath.$val.'" border="0" id="img'.$idmaterial.'">';
				    			$images .= '<div class="btn_cn_on" id="img'.$publicPath.$val.'"></div>';
				    		}else{
				    			$images .= '<div class="btn_cn_off" id="img'.$publicPath.$val.'"></div>';
				    		}
				    	}
				    }
				}
			    $contenido .= '</div>
				<div class="cuadro_transp_texto_superficie">
					<div class="titulo_der_superficie">'.$info[0]->titulo.'</div>
					<div class="texto_izq_color"></div>
					<div class="titulo2_der_superficie"></div>
					<div class="btn_der_subgal">
									'.$images.'
					</div>
					<div class="texto_izq_superficie" style="position:relative;height:160px;"><div style="position:absolute;bottom:0;right:0;">'.$info[0]->materiales.'</div></div>
				</div>
				<div class="cuadro_inf_texto_superficie">'.$info[0]->descripcion.'</div>
			</div>';
		} else {
			$contenido .= '
			<div class="imagen_izq_mat">
				<div class="imagen_ejem_mat1">';
				if ($gestor = opendir($path)) {
					$cant = 0;
					$img = array();
					while (false !== ($entrada = readdir($gestor))) {
						if (is_file($path.$entrada) && strpos($entrada, '.')>0){
							$img[] = $entrada;
						}
				    }
				    sort($img);
				    foreach ($img as $val){
						if (is_file($path.$val) && strpos($val, '.')>0){
				    		$cant++;
				    		if ($cant === 1){
				    			$contenido .= '<img src="'.$publicPath.$val.'" border="0" id="img'.$idmaterial.'">';
				    			$images .= '<div class="btn_cn_on" id="img'.$publicPath.$val.'"></div>';
				    		}else{
				    			$images .= '<div class="btn_cn_off" id="img'.$publicPath.$val.'"></div>';
				    		}
				    	}
				    }
				}
			    $contenido .= '</div>
				<div class="cuadro_transp_texto_mat">
					<div class="imagen_ejem_mat1a">'.$interna.'</div>
					<div class="texto_der_submat">'.$info[0]->titulo.'</div>
					<div class="btn_izq_subgal">'.$images.'</div>
					<div class="texto_izq_submat" style="position:relative;height:147px;"><div style="position:absolute;bottom:0;right:0;">'.$info[0]->materiales.'</div></div>
				</div>
			</div>';
		}
		
	    return $contenido;
	}
		
}