<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				echo $this->session->flashdata('flash_message');
				?>
				<a href="<?php echo base_url();?>repair/create" class="btn btn-success">แจ้งซ่อม</a>
				<table class="table table-condensed">
					<tr>
						<th>ลำดับ</th>
						<th>รายการ</th>
						<th>วันที่แจ้ง</th>
						<td>&nbsp;</td>
					</tr>
					<?php
					if ($repairs >= 1) {
					foreach ($repairs as $key => $repair){ ?>
					<tr>
						<td><?php echo $key + 1; ?></td>
						<td><?php echo $repair->topic;?></td>
						<td><?php echo $repair->repair_date; ?></td>
						<td><a href="<?php echo base_url();?>repair/edit/<?php echo $repair->id;?>" class="btn btn-warning"><i class="fa fa-pencil"></i> </a></td>
					</tr>
					<?php
					}
					} else {
						echo "";
					} ?>
				</table>
				<div class="pagination-inbox">
					<ul class="wizard-nav-ac">
						<?php echo $links; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
