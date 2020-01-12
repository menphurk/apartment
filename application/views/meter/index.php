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
				?>
				<div class="bsc-tbl">
					<button class="btn btn-primary button-icon-btn-rd btn-icon-notika waves-effect" onclick='window.location.href="<?php echo base_url();?>meter/create/"'><i class='notika-icon notika-plus-symbol'></i> จดมิเตอร์ใหม่</button>
					<table class="table table-sc-ex">
						<thead>
						<tr>
							<th>#</th>
							<th>วันที่จด</th>
							<th>ห้อง</th>
							<th>เลขไฟฟ้าล่าสุด</th>
							<th>เลขน้ำประปาล่าสุด</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if ($meters >= 1) {
							foreach ($meters as $key => $meter) {
								echo "<tr>";
								echo "<td>" . $meter->id . "</td>";
								echo "<td>" . $meter->date_rec . "</td>";
								echo "<td>" . $meter->roomname . "</td>";
								echo "<td>". $meter->e_meter_now. "</td>";
								echo "<td>". $meter->w_meter_now. "</td>";
								echo "<td>
                                            <button class='btn btn-primary button-icon-btn-rd btn-icon-notika waves-effect' data-toggle='modal' data-target='#AddMeter' data-meter-id=' . $meter->id . '><i class='notika-icon notika-edit'></i></button>
                                            <button class='btn btn-danger primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "meter/delete/" . $meter->id . "'><i class='notika-icon notika-trash'></i></button>
                                          </td>";
								echo "</tr>";
							}
						} else {
							echo "";
						}
						?>
						</tbody>
					</table>
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
