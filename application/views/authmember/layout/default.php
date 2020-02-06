<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<!-- Bootstrap CSS File -->
	<link href="<?php echo base_url();?>/assets/frontend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="<?php echo base_url();?>/assets/frontend/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/frontend/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="<?php echo base_url();?>/assets/frontend/css/style.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Niramit&display=swap" rel="stylesheet">

</head>
<body>

<!--/ Nav End /-->
<?php if($header) echo $header ;?>
<div class="container">
<?php if($middle) echo $middle ;?>
</div>
<?php if($footer) echo $footer ;?>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="<?php echo base_url();?>/assets/frontend/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/popper/popper.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>/assets/frontend/lib/scrollreveal/scrollreveal.min.js"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url();?>/assets/frontend/js/main.js"></script>
</body>
</html>
