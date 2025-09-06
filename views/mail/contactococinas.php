<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contacto</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">

<div style="width:500px;float:left;margin-right: auto;margin-left: auto;padding-bottom:20px;border: 1px solid #999;">

<div style="width: 100%;float:left;">
    <div style="width: 110px;height:94px;margin-left:20px;margin-top:0 auto;float:left;">
    	<img src="http://www.0800cocinas.com<?php echo Yii::app()->theme->baseUrl; ?>/imagenes0800/logo1c.png" border="0" />
    </div>
	<div style="height:20px;width:360px;margin-left:5px;margin-top:31px;font-size: 22px;color: #666;float:left;font-weight: bold;">mensaje formulario de contacto</div>
</div>

<div style="width: 100%;float:left;"> 
	<div style="height:18px;width:110px;margin-left:20px;margin-top:10px;padding-left:2px;font-size: 14px;color: #ddd;float:left;font-weight: bold;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CCC;vertical-align: bottom;">nombre</div>
    <div style="width:355px;margin-left:5px;margin-top:10px;margin-bottom:1px;padding-left:2px;font-size: 14px;color: #000;float:left;vertical-align: bottom;"><?php echo $contactoForm->nombre;?></div>
</div>

<div style="width: 100%;float:left;"> 
	<div style="height:18px;width:110px;margin-left:20px;margin-top:10px;padding-left:2px;font-size: 14px;color: #ddd;float:left;font-weight: bold;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CCC;vertical-align: bottom;">teléfono</div>
    <div style="width:355px;margin-left:5px;margin-top:10px;margin-bottom:1px;padding-left:2px;font-size: 14px;color: #000;float:left;vertical-align: bottom;"><?php echo $contactoForm->telefono;?></div>
</div>

<div style="width: 100%;float:left;"> 
	<div style="height:18px;width:110px;margin-left:20px;margin-top:10px;padding-left:2px;font-size: 14px;color: #ddd;float:left;font-weight: bold;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CCC;vertical-align: bottom;">e-mail</div>
    <div style="width:355px;margin-left:5px;margin-top:10px;margin-bottom:1px;padding-left:2px;font-size: 14px;color: #000;float:left;vertical-align: bottom;"><?php echo $contactoForm->email;?>m</div>
</div>

<div style="width: 100%;float:left;"> 
	<div style="height:18px;width:110px;margin-left:20px;margin-top:10px;padding-left:2px;font-size: 14px;color: #ddd;float:left;font-weight: bold;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #CCC;vertical-align: bottom;">mensaje</div>
    <div style="width:355px;margin-left:5px;margin-top:10px;margin-bottom:1px;padding-left:2px;font-size: 14px;color: #000;float:left;vertical-align: bottom;"><?php echo $contactoForm->mensaje;?></div>
</div>

</div>

</body>
</html>