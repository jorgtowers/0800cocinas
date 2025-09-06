<?php

class EventosController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',
			//'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'users'=>array('*'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Eventos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Eventos']))
		{
			$model->attributes=$_POST['Eventos'];
			$model->titulo_seo=urls_amigables($model->titulo);
			$model->created=date('Y-m-d h:i:s');
			$model->modified=date('Y-m-d h:i:s');
			if($model->save())
				$ch = curl_init();
				$timeout = 5;
				curl_setopt($ch,CURLOPT_URL,'https://api-ssl.bitly.com/v3/shorten?access_token=e08d293b23cb8cca809609186e68aebb8cbf65f0&longUrl='.(urlencode('http://www.0800cocinas.com/eventos/view/'.$model->idevento.'#titulo')).'&format=txt');
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
				$data = curl_exec($ch);
				if ($data === false){
					$model->short_url = '';
				} else {
					$model->short_url = $data;
				}
				curl_close($ch);
				$model->save();
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionGaleria($id)
	{
		$model=$this->loadModel($id);
	    Yii::import( "xupload.models.XUploadForm" );
	    $photos = new XUploadForm;
	    
	    $folderPath = Yii::app( )->getBasePath().'/../images';
	    if (!is_dir($folderPath)){
	    	mkdir($folderPath,0755);
	    }
	    $folderPath = Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId();
	    if (!is_dir($folderPath)){
	    	mkdir($folderPath,0755);
	    }
	    $folderPath = Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId()."/".$id;
	    if (!is_dir($folderPath)){
	    	mkdir($folderPath,0755);
	    }
	    $folderPath = Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId()."/".$id."/thumbs";
	    if (!is_dir($folderPath)){
	    	mkdir($folderPath,0755);
	    }
	    //$publicPath = Yii::app( )->getBaseUrl( )."/images/".Yii::app()->getController()->getId()."/".$id."/";
	    //$path = realpath( Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId()."/".$id."/" )."/";
	    
	    $this->render( 'galeria', array(
	    	'model' => $model,
	        'photos' => $photos,
	    	'id' => $id,
	    ) );
	}

	public function actionUpload($id) {
	    Yii::import( "xupload.models.XUploadForm" );
	    //Here we define the paths where the files will be stored temporarily
	    $path = realpath( Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId()."/".$id."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/".Yii::app()->getController()->getId()."/".$id."/";
	 
	    //This is for IE which doens't handle 'Content-type: application/json' correctly
	    header( 'Vary: Accept' );
	    if( isset( $_SERVER['HTTP_ACCEPT'] ) 
	        && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
	        header( 'Content-type: application/json' );
	    } else {
	        header( 'Content-type: text/plain' );
	    }
	 
	    //Here we check if we are deleting and uploaded file
	    if( isset( $_GET["_method"] ) ) {
	        if( $_GET["_method"] == "delete" ) {
	            if( $_GET["file"][0] !== '.' ) {
	                $file = $path.$_GET["file"];
	                if( is_file( $file ) ) {
		                if( is_file( $path."thumbs/".$_GET["file"] ) ) {
		                    unlink( $path."thumbs/".$_GET["file"] );
		                }
	                    unlink( $file );
	                }
	            }
	            echo json_encode( true );
	        }
	    } else {
	        $model = new XUploadForm;
	        $model->file = CUploadedFile::getInstance( $model, 'file' );
	        //We check that the file was successfully uploaded
	        if( $model->file !== null ) {
	            //Grab some data
	            $model->mime_type = $model->file->getType( );
	            $model->size = $model->file->getSize( );
	            $model->name = $model->file->getName( );
	            //(optional) Generate a random name for our file
	            //$filename = md5( Yii::app( )->user->id.microtime( ).$model->name);
	            //$filename .= ".".$model->file->getExtensionName( );
	            $filename = $model->name; 
	            if( $model->validate( ) ) {
	                //Move our file to our temporary dir
	                $model->file->saveAs( $path.$filename );
	                chmod( $path.$filename, 0777 );
	                //here you can also generate the image versions you need 
	                //using something like PHPThumb
	                
					$thumb=Yii::app()->phpThumb->create($path.$filename);
					
					$thumb->resize(170,112);
					$thumb->save($path."thumbs/".$filename);	 	
					
	                //Now we need to save this path to the user's session
	                if( Yii::app( )->user->hasState( 'images' ) ) {
	                    $userImages = Yii::app( )->user->getState( 'images' );
	                } else {
	                    $userImages = array();
	                }
	                 $userImages[] = array(
	                    "path" => $path.$filename,
	                    //the same file or a thumb version that you generated
	                    "thumb" => $path.$filename,
	                    "filename" => $filename,
	                    'size' => $model->size,
	                    'mime' => $model->mime_type,
	                    'name' => $model->name,
	                );
	                Yii::app( )->user->setState( 'images', $userImages );
	 
	                //Now we need to tell our widget that the upload was succesfull
	                //We do so, using the json structure defined in
	                // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
	                echo json_encode( array( array(
	                        "name" => $model->name,
	                        "type" => $model->mime_type,
	                        "size" => $model->size,
	                        "url" => $publicPath.$filename,
	                        "thumbnail_url" => $publicPath."thumbs/$filename",
	                        "delete_url" => $this->createUrl( "upload", array(
	                			'id'=>$id,
	                            "_method" => "delete",
	                            "file" => $filename
	                        ) ),
	                        "delete_type" => "POST"
	                    ) ) );
	            } else {
	                //If the upload failed for some reason we log some data and let the widget know
	                echo json_encode( array( 
	                    array( "error" => $model->getErrors( 'file' ),
	                ) ) );
	                Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ),
	                    CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" 
	                );
	            }
	        } else {
	            throw new CHttpException( 500, "Could not upload file" );
	        }
	    }
	}
	
	function actionSubidas($id){
		$arreglo = array();
	    $path = realpath( Yii::app( )->getBasePath( )."/../images/".Yii::app()->getController()->getId()."/".$id."/" )."/";
	    $publicPath = Yii::app( )->getBaseUrl( )."/images/".Yii::app()->getController()->getId()."/".$id."/";
		if ($gestor = opendir($path)) {
		 
		    /* Esta es la forma correcta de iterar sobre el directorio. */
		    while (false !== ($entrada = readdir($gestor))) {
		    	if (is_file($path.$entrada)){
		    		$detalle = getimagesize($path.$entrada);
		    		$arreglo[]=array(
		    			'name'=>$entrada,
		    			'type'=>$detalle['mime'],
		    			'size'=>filesize($path.$entrada),
		    			'url'=>$publicPath.$entrada,
		    			"thumbnail_url" => $publicPath."thumbs/$entrada",
						"delete_url" => $this->createUrl( "upload", array(
		    				'id'=>$id,
							"_method" => "delete",
							"file" => $entrada
						) ),
						"delete_type" => "POST"
		    		);
		    	}
		    }
		    if (count($arreglo)){
		    	echo json_encode($arreglo);
		    } else {
		    	array( "error" => "Directorio Vacio");
		    }
		} else {
			throw new CHttpException( 500, "Directorio Invalido" );
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$url_corto = $model->short_url;
		$url = '';
		if(isset($_POST['Eventos']))
		{
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,'https://api-ssl.bitly.com/v3/expand?access_token=e08d293b23cb8cca809609186e68aebb8cbf65f0&longUrl='.(urlencode($url_corto)).'&format=txt');
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$data = curl_exec($ch);
			if ($data === false){
				$url = '';
			} else {
				$url = $data;
			}
			curl_close($ch);
			
			if ($url != 'http://www.0800cocinas.com/eventos/view/'.$model->idevento.'#titulo' || $model->short_url == ""){
				$ch = curl_init();
				$timeout = 5;
				curl_setopt($ch,CURLOPT_URL,'https://api-ssl.bitly.com/v3/shorten?access_token=e08d293b23cb8cca809609186e68aebb8cbf65f0&longUrl='.(urlencode('http://www.0800cocinas.com/eventos/view/'.$model->idevento.'#titulo')).'&format=txt');
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
				$data = curl_exec($ch);
				if ($data === false){
					$url_corto = '';
				} else {
					$url_corto = $data;
				}
				curl_close($ch);
			}
			
			$model->attributes=$_POST['Eventos'];
			$model->titulo_seo=urls_amigables($model->titulo);
			$model->modified=date('Y-m-d h:i:s');
			$model->short_url = $url_corto;
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->redirect(array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Eventos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Eventos']))
			$model->attributes=$_GET['Eventos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Eventos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Eventos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Eventos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='eventos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
