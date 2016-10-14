<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->Html->meta(null, null, array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
	<?php echo $this->Html->meta('description', ''); ?>
	<?php echo $this->Html->meta('keywords', ''); ?>
	<?php echo $this->fetch('meta'); ?>
	<?php echo $this->Html->meta('favicon.ico', 'favicon.ico', array('type' => 'icon')); ?>
	<?php echo $this->Html->meta(null, '/img/apple-touch-icon-precomposed.png', array('rel' => 'apple-touch-icon-precomposed')); ?>

	<!-- CSS sytle -->
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('font-awesome.min'); ?>
	<?php echo $this->Html->css('animate.min'); ?>
	<?php echo $this->Html->css('custom'); ?>

	<!-- JS sytle -->
	<?php echo $this->Html->script('jquery.min'); ?>

	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/img/logo.png">
</head>

<body style="background:#F7F7F7;">

	<div class="">

		<a class="hiddenanchor" id="toregister"></a>
		<a class="hiddenanchor" id="tologin"></a>

		<?php echo $this->fetch('content'); ?>

	</div>

</body>
</html>