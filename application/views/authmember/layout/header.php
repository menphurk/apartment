<div class="click-closed"></div>
<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-light bg-dark navbar-trans navbar-expand-lg fixed-top">
	<div class="container">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
				aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<a class="navbar-brand text-brand" href="#">Apart<span class="color-b">Ment</span></a>
		<button type="button" class="btn btn-b-n d-md-none" data-toggle="modal" data-target="#LoginMember" aria-expanded="false">
			<?php $display_name = $this->session->userdata( 'display_name' );
			echo $display_name;
			?>
		</button>
		<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?php echo (current_url()==base_url('repair')) ? 'active':''?>" href="<?php echo base_url();?>repair" style="color: white">แจ้งซ่อมบำรุง</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo (current_url()==base_url('dashboardmember')) ? 'active':''?>" href="<?php echo base_url();?>dashboardmember" style="color: white">บิลค่าใช้จ่าย</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo (current_url()==base_url('facilities')) ? 'active':''?>" href="#" style="color: white">ข้อมูลห้องพัก</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo (current_url()==base_url('contact')) ? 'active':''?>" href="#" style="color: white">ระเบียบหอพัก</a>
				</li>
			</ul>
		</div>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;">
				<?php $display_name = $this->session->userdata( 'display_name' );
				echo $display_name;
				?>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="<?php echo base_url();?>profile/<?php echo $this->session->userdata( 'login_id' );?>">แก้ไขข้อมูลส่วนตัว</a>
				<a class="dropdown-item" href="<?php echo base_url();?>logoutauth">ออกจากระบบ</a>
			</div>
		</li>

	</div>
</nav>
