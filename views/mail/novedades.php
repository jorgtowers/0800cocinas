<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div style="width:500px;float:left;margin-right: auto;margin-left: auto;margin-bottom:10px;padding-bottom:5px;border: 1px solid #999;">

<div style="width: 100%;float:left;">
    <div style="width: 110px;height:94px;margin-left:20px;margin-top:0 auto;float:left;">
		<img src="http://www.0800cocinas.com<?php echo Yii::app()->theme->baseUrl; ?>/imagenes0800/logo1c.png" border="0" />
	</div>
    <div style="height:20px;width:360px;margin-left:5px;margin-top:35px;font-family: Arial, Helvetica, sans-serif;font-size: 22px;color: #666;float:left;font-weight: bold;">al día con la información
</div></div>

<div style="width: 100%;float:left;">
  <div style="margin-left:20px;margin-top:60px;float:left;text-align: left;font-family: Georgia, Times New Roman, Times, serif;font-size: 17px;color: #777;font-weight: bold;word-spacing: 1px;"><?php echo $model->titulo; ?><div class="linea_cn_titulo"></div>
  </div>
  <div style="margin-left:20px;width:475px;float:left;text-align: left;font-family: Georgia, Times New Roman, Times, serif;font-size: 15px;color: #777;word-spacing: 1px;"><?php echo $model->subtitulo; ?></div>
  </div>
  
<div style="width: 100%;float:left;">
  <div style="text-align: justify;font-family: Georgia, Times New Roman, Times, serif;font-size: 14px;color: #999;line-height: 130%;width:475px;margin-left:20px;margin-top:10px;margin-bottom:1px;float:left;vertical-align: bottom;"><?php echo $model->contenido; ?></div>
</div>

<?php if (!empty($imagen)) {?>
<div style="width:475px;height:315px;margin-left: 20px;margin-top: 10px;float:left;">
	<img src="http://www.0800cocinas.com/images/newsletter/<?php echo $model->idnewsletter."/thumbs/".$imagen[0]; ?>" border="0" />
</div>
<?php } if ($model->fuente) {?>
<div style="width: 100%;float:left;"><div style="margin-left:20px;margin-right:5px;margin-top:10px;float:right;text-align: Right;font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #666;">Artículo publicado en la revista. <?php echo $model->fuente?></div></div>
<?php } ?>
<div style="width: 100%;float:left;"><div style="margin-left:20px;margin-right:5px;margin-top:20px;float:right;text-align: Right;font-family: Arial, Helvetica, sans-serif;font-size: 13px;color: #333;font-weight: bold;letter-spacing: 1px;">www.0800cocinas.com</div></div>
<div style="width: 100%;float:left;"><div style="width: 475px;margin-left:20px;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #333;"></div></div>
<div style="width: 100%;float:left;"><div style="margin-left:20px;margin-right:5px;float:right;text-align: Right;font-family: Arial, Helvetica, sans-serif;font-size: 10px;color: #aaa;font-style: italic;">si no desea recibir más información ingrese a la sección de retiro </div></div>
</div>

</body>
</html>
