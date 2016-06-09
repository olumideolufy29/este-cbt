<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $__env->yieldContent('title'); ?></title>

	<link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
	<?php echo $__env->yieldContent('stylesheet'); ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php echo $__env->yieldContent('content'); ?>

	<script src="<?php echo e(url('jquery.js')); ?>"></script>
	<script src="<?php echo e(url('js/bootstrap.min.js')); ?>"></script>

	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>