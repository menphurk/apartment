<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h3>แก้ไขข้อมูลส่วนตัว</h3>
				<div class="col-md-6 offset-3">


					<?php echo form_open('updateprofile');
					echo form_hidden('id', $profile[0]->id);
					?>

					<div class="form-group">
						<label>ชื่อ</label>
						<input type="text" class="form-control" name="first_name" value="<?php echo $profile[0]->first_name;?>">
					</div>

					<div class="form-group">
						<label>นามสกุล</label>
						<input type="text" class="form-control" name="last_name" value="<?php echo $profile[0]->last_name;?>">
					</div>

					<div class="form-group">
						<label>เลขบัตรประชาชน</label>
						<input type="text" class="form-control" name="idcard" value="<?php echo $profile[0]->idcard;?>">
					</div>

					<div class="form-group">
						<label>เบอร์ติดต่อ</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $profile[0]->phone;?>">
					</div>

					<div class="form-group">
						<label>อีเมล์แอดเดรส</label>
						<input type="text" class="form-control" name="email" value="<?php echo $profile[0]->email;?>">
					</div>

					<div class="form-group">
						<label>ที่อยู่</label>
						<textarea class="form-control" name="address" rows="10" cols="8">
							<?php echo $profile[0]->address;?>
						</textarea>
					</div>

					<button type="submit" class="btn btn-b-n d-none d-md-block">บันทึกข้อมูล</button>

					<?php echo form_close(); ?>

				</div>

			</div>
		</div>
	</div>
</section>
