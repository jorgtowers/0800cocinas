<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'0800cocinas',
	'theme'=>'w8admin',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.rights.models.*',
		'application.modules.rights.components.*',
		'ext.yii-mail.YiiMailMessage',
	),
	'aliases' => array(
	    //If you manually installed it
	    'xupload' => 'ext.xupload',
	    //'EPhpThumb' => 'ext.EPhpThumb.EPhpThumb'
	),
	'modules'=>array(
		'admin',
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.56.101'),
		),
		'user'=>array(
			'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
            # encrypting method (php hash function)
            'hash' => 'md5',
 
            # send activation email
            'sendActivationMail' => true,
 
            # allow access for non-activated users
            'loginNotActiv' => false,
 
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
 
            # automatically login from registration
            'autoLogin' => true,
 
            # registration path
            'registrationUrl' => array('/user/registration'),
 
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
 
            # login form path
            'loginUrl' => array('/user/login'),
 
            # page after login
            'returnUrl' => array('/admin'),
 
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
		'rights'=>array( 
          'superuserName'=>'admin'
    	),
	),

	// application components
	'components'=>array(
		'phpThumb'=>array(
		    'class'=>'ext.EPhpThumb.EPhpThumb.EPhpThumb',
		    //'options'=>array(optional phpThumb specific options are added here)
		),
		'user'=>array(
            // enable cookie-based authentication
            'class' => 'RWebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
			'stateKeyPrefix' => 'some_shared_prefix',
        ),
        'authManager'=>array(
                'class'=>'RDbAuthManager',
                'connectionID'=>'db',
                'defaultRoles'=>array('Authenticated', 'Guest'),
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			//'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'smtp',
		    'transportOptions' => array(
		        'host' => 'smtp.gmail.com',
		        'username' => '0800cocinas@gmail.com',
		        'password' => 'ratqodqjuxhrwfnr',
		        'port' => '465',
		        'encryption'=>'ssl',
		    ),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),
		'curl' => array(
			'class' => 'ext.curl.Curl',
			'options' => array(/* additional curl options */),
		),
/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
*/
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=f7000414_cocinas',
			'emulatePrepare' => true,
			'username' => 'f7000414_cocina',
			'password' => 'wiko76LOmi',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'0800cocinas@gmail.com',
	),
);