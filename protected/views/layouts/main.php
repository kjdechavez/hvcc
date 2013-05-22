<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker/base/jquery.ui.all.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<?php Yii::app()->clientScript->registerCoreScript('jquery');  ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.ui.core.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.9.custom.min.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.ui.button.js'); ?>
	
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jqueryui/jquery.ui.datepicker.js'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<?php $this->renderPartial('//layouts/_main_menu')?>

	<?php echo $content; ?>

	<div class="clear"></div>


	<?php if(isset($this->styles)) : ?>
		<?php foreach ($this->styles as $style) : ?>
			<?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/'.$style); ?>
		<?php endforeach; ?>
	<?php endif; ?>
		
		
	<?php if(isset($this->scripts)) : ?>
		<?php foreach ($this->scripts as $script) : ?>
			<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/'.$script, CClientScript::POS_END); ?>
		<?php endforeach; ?>
	<?php endif; ?>


	<?php $this->renderPartial('//layouts/_footer')?>
	
</div><!-- page -->





</body>
</html>
