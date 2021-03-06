<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="card">
					<div class="card-header bg-info text-white">แจ้งซ่อม</div>
					<div class="card-body">
						<?php
						if (validation_errors()) { // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
							echo   validation_errors();
							echo "<br>";
						}
						?>
						<form action="<?php echo base_url();?>repair/save" method="post">
							<div class="form-group">
								<label for="topic">หัวข้อแจ้งซ่อม</label>
								<input type="text" class="form-control" id="topic" name="topic" placeholder="หัวข้อ">
							</div>
							<div class="form-group">
								<label for="description">รายละเอียด</label>
								<textarea class="form-control" name="description"></textarea>
							</div>
							<div class="form-group">
								<label for="room_id">ห้อง</label>
								<select class="form-control" name="room_id" id="room_id">
									<option>---</option>
	                                        <?php
                                        foreach ($rooms as $room) {
                                            echo "<option value='" . $room->id . "'>" . $room->name . "</option>";
                                        }
                                        ?>
								</select>
							</div>
							<input type="hidden" name="member_id" value="<?php echo $this->session->userdata( 'login_id' );?>">
							<button type="submit" class="btn btn-primary">ส่ง</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
