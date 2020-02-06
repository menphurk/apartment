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
<div class="click-closed"></div>
   <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Apart<span class="color-b">Ment</span></a>
      <button type="button" class="btn btn-b-n d-md-none" data-toggle="modal" data-target="#LoginMember" aria-expanded="false">
		เข้าสู่ระบบ
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo (current_url()==base_url('/')) ? 'active':''?>" href="<?php echo base_url();?>">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (current_url()==base_url('room')) ? 'active':''?>" href="<?php echo base_url();?>room">ห้องของเรา</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (current_url()==base_url('facilities')) ? 'active':''?>" href="<?php echo base_url();?>facilities">สิ่งอำนวยความสะดวก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (current_url()==base_url('contact')) ? 'active':''?>" href="<?php echo base_url();?>contact">ติดต่อ</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n d-none d-md-block" data-toggle="modal" data-target="#LoginMember">
		เข้าสู่ระบบ
      </button>

    </div>
  </nav>
  <!--/ Nav End /-->
  <?php echo $contents; ?>
<!-- Modal -->
<div class="modal fade" id="LoginMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url();?>authencation" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">ชื่อผู้ใช้งาน</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">รหัสผ่าน</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-b-n">เข้าสู่ระบบ</button>
					<button type="submit" class="btn btn-link">ลงทะเบียน</button>
				</form>
			</div>
		</div>
	</div>
</div>
    <!--/ footer Star /-->
    <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Apartment</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com</li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">เมนูหลัก</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="<?php echo base_url();?>">หน้าแรก</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="<?php echo base_url();?>room">ห้องพักของเรา</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">สิ่งอำนวยความสะดวก</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">ติดต่อเรา</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Apartment</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            ออกแบบและพัฒนา โดย <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

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
