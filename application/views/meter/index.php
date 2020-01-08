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
								echo "<td>". $meter->e_meter_bef. "</td>";
								echo "<td>". $meter->w_meter_bef. "</td>";
								echo "<td>
                                            <button class='btn btn-primary button-icon-btn-rd btn-icon-notika waves-effect' onclick=window.location.href='" . base_url() . "meter/create/'><i class='notika-icon notika-eye'></i></button>
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
