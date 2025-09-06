<?php

class RecibenovedadesController extends Controller
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
			'accessControl', // perform access control for CRUD operations
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
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$recibenovedades=new Recibenovedades;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Recibenovedades']))
		{
			
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch,CURLOPT_URL,'https://www.google.com/recaptcha/api/siteverify?secret=6LelPRwUAAAAAPIqM6f4IZzom8XEbYqfTB-MOTos&response='.$_POST['g-recaptcha-response']);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
			$data = curl_exec($ch);
			if (strpos($data,'"success": true') === false || $data === false){
				$this->redirect("/site/errornewsletter");
			} else {
				$criteria=new CDbCriteria;
				$criteria->condition='email=:email';
				$criteria->params=array(':email'=>$_POST['Recibenovedades']['email']);
				$existe=Recibenovedades::model()->find($criteria); // $params is not needed
				if ($existe) 
				{
					$this->redirect("/site/correoexiste");
				} 
				else
				{
					$recibenovedades->attributes=$_POST['Recibenovedades'];
					$recibenovedades->created=date('Y-m-d h:i:s');
					$recibenovedades->modified=date('Y-m-d h:i:s');
					$recibenovedades->activo=1;

					if($recibenovedades->save()){
						$message = new YiiMailMessage;
						$message->view = 'respuestanovedades';
						$message->setBody('','text/html');
						$message->subject = 'Suscripción Novedades 0800cocinas.com';
						$message->addTo($recibenovedades->email);
						$message->from = '0800cocinas@gmail.com';
						Yii::app()->mail->send($message);			
						$this->redirect("/site/suscripcion");
					} else {
						$this->redirect("/site/errornewsletter");
					}
				}
			}
			
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}

}
