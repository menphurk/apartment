<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="normal-table-list">
				<div class="basic-tb-hd">
					<h2><?php echo $title; ?></h2>
				</div>
				<div class="bsc-tbl">
					<table class="table table-sc-ex">
						<tr>
							<td>วันที่เข้าอยู่</td>
							<td><?php echo $promise[0]->start_pro;?></td>
						</tr>
						<tr>
							<td>วันที่สิ่นสุด</td>
							<td><?php echo $promise[0]->end_pro;?></td>
						</tr>
						<tr>
							<td>ห้อง</td>
							<td><?php echo $promise[0]->roomname;?></td>
						</tr>
						<tr>
							<td>เงินประกัน</td>
							<td><?php echo $promise[0]->recognizance;?></td>
						</tr>
						<tr>
							<td colspan="2"><h4>รายละเอียดผู้เช่า</h4></td>
						</tr>
						<tr>
							<td>ชื่อ - นามสกุล</td>
							<td><?php echo $promise[0]->titlename; ?><?php echo $promise[0]->first_name; ?><?php echo $promise[0]->last_name; ?></td>
						</tr>
						<tr>
							<td>เบอร์โทรติดต่อสะดวก</td>
							<td><?php echo $promise[0]->phone; ?></td>
						</tr>
						<tr>
							<td>ที่อยู่ที่ติดต่อสะดวก</td>
							<td><?php echo $promise[0]->address; ?></td>
						</tr>
						<tr>
							<td colspan="2"><h4>ผู้ติดต่อในกรณีฉุกเฉิน</h4></td>
						</tr>
						<tr>
							<td>ชื่อ - นามสกุล</td>
							<td><?php echo $promise[0]->name_emergency; ?></td>
						</tr>
						<tr>
							<td>เบอร์โทรศัพท์ติดต่อ</td>
							<td><?php echo $promise[0]->phone_emergency; ?></td>
						</tr>
						<tr>
							<td>ความสัมพันธ์</td>
							<td><?php echo $promise[0]->relationship_emergency; ?></td>
						</tr>
					</table>
					<button class="btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect" onclick="window.location.href='<?php echo base_url(); ?>promise/edit/<?php echo $promise[0]->id; ?>'"><i class="notika-icon notika-edit"></i> แก้ไข</button>
				</div>
			</div>
		</div>
	</div>
</div>
