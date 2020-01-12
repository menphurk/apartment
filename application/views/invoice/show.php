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
							<td>ห้อง</td>
							<td><?php echo $invoice[0]->roomname;?></td>
						</tr>
						<tr>
							<td>เลขมิเตอร์น้ำ</td>
							<td><?php echo $invoice[0]->water_meter;?></td>
						</tr>
						<tr>
							<td>เลขมิเตอร์ไฟ</td>
							<td><?php echo $invoice[0]->e_meter;?></td>
						</tr>
					</table>
					<button class="btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect" onclick="window.location.href='<?php echo base_url(); ?>invoice/export/<?php echo $invoice[0]->id; ?>'"><i class="notika-icon notika-edit"></i> พิมพ์</button>
				</div>
			</div>
		</div>
	</div>
</div>
