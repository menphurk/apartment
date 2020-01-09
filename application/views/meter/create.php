<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="normal-table-list">
				<div class="basic-tb-hd">
					<h2><?php echo $title; ?></h2>
					<p></p>
				</div>
				<?php
				echo $this->session->flashdata('flash_message');

				if(validation_errors()){ // ถ้ามีเงื่อนไขหนึ่งใดไม่ผ่าน ให้แสดง ข้อความ error ตำแหน่งนี้
					echo   validation_errors();
					echo "<br>";
				}
				?>
				<div class="bsc-tbl">
					<?php echo form_open('meter/save'); ?>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">วันที่จด</label>
							<div class="col-md-10">
								<input type="date" name="date_rec" id="date_rec" class="form-control" placeholder="วันที่จด">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">ห้องที่</label>
							<div class="col-md-10">
								<select name="room_id" id="room_id" class="form-control">
									<option>--- กรุณาเลือก ---</option>
									<?php
									foreach ($rooms as $room) {
										echo "<option value='".$room->id."'>".$room->name."</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">มิเตอร์น้ำครั้งนี้</label>
							<div class="col-md-10">
								<input type="text" name="w_meter_now" id="w_meter_now" class="form-control" placeholder="มิเตอร์น้ำครั้งนี้">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">มิเตอร์ไฟครั้งนี้</label>
							<div class="col-md-10">
								<input type="text" name="e_meter_now" id="e_meter_now" class="form-control" placeholder="มิเตอร์ไฟครั้งนี้">
							</div>
						</div>
					<div class="form-example-int mg-t-15">
						<button type="submit" class="btn btn-success notika-btn-success">บันทึก</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="AddMeter" role="dialog">
	<div class="modal-dialog modals-default">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h2></h2>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">วันที่จด</label>
					<div class="col-md-10">
						<input type="date" name="date_rec" id="date_rec" class="form-control" placeholder="วันที่จด">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">ห้องที่</label>
					<div class="col-md-10">
						<input type="text" name="product_id" id="product_id" class="form-control" placeholder="ห้องที่">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">มิเตอร์น้ำครั้งนี้</label>
					<div class="col-md-10">
						<input type="text" name="w_meter_now" id="w_meter_now" class="form-control" placeholder="มิเตอร์น้ำครั้งนี้">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">มิเตอร์ไฟครั้งนี้</label>
					<div class="col-md-10">
						<input type="text" name="e_meter_now" id="e_meter_now" class="form-control" placeholder="มิเตอร์ไฟครั้งนี้">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" data-dismiss="modal">บันทึก</button>
			</div>
		</div>
	</div>
</div>

<script>

</script>
