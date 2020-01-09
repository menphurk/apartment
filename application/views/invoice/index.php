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
							<th>ห้องพัก</th>
							<th>ลูกค้า</th>
							<th>จัดการ</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if ($invoices >= 1) {
							foreach ($invoices as $key => $invoice) {
								echo "<tr>";
								echo "<td>" . $invoice->id . "</td>";
								echo "<td>" . $invoice->roomname . "</td>";
								echo "<td>". $invoice->fullname. "</td>";
								echo "<td>
                                            <button class='btn btn-primary primary-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "invoice/show/" . $invoice->id . "'><i class='notika-icon notika-eye'></i></button>
                                            <button class='btn btn-lightgreen lightgreen-icon-notika btn-reco-mg btn-button-mg waves-effect' onclick=window.location.href='" . base_url() . "invoice/export/" . $invoice->id . "'><i class='notika-icon notika-print'></i></button>
                                          </td>";
								echo "</tr>";
							}
						} else {
							echo "";
						}
						?>
						</tbody>
					</table>
					<div class="pagination-inbox">
						<ul class="wizard-nav-ac">
							<?php echo $links; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
