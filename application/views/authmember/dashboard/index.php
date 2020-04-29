<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">


				<button type="button" class="btn btn-danger">
					ค้างชำระ
					<span class="sr-only">ค้างชำระ</span>
				</button>

				<button type="button" class="btn btn-success">
					ชำระแล้ว
					<span class="sr-only">ชำระแล้ว</span>
				</button>

				<br>
				<br>
				<hr>

				<?php
				function DateThai($strDate)
				{
					$strYear = date("Y",strtotime($strDate))+543;
					$strMonth= date("n",strtotime($strDate));
					$strDay= date("j",strtotime($strDate));
					$strHour= date("H",strtotime($strDate));
					$strMinute= date("i",strtotime($strDate));
					$strSeconds= date("s",strtotime($strDate));
					$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
					$strMonthThai=$strMonthCut[$strMonth];
					return "$strDay $strMonthThai $strYear";
				}

				?>

				<?php
					if (empty($bills)){
						echo "<center><h2>ไม่มีข้อมูลบิลค้างชำระ</h2></center>";
					}else{
				?>
				<div class="card">
					<h5 class="card-header text-white bg-<?php if($bills[0]->status == 0){ echo 'danger'; }else{ echo 'success'; } ?> mb-3">บิลค่าใช้จ่าย <?php echo DateThai($bills[0]->date_rec); ?></h5>
					<div class="card-body">
						<h5 class="card-title">วันที่ <?php echo DateThai($bills[0]->date_rec); ?></h5>
						<p class="card-text">
							<?php
							echo (number_format($bills[0]->price + ($bills[0]->water_meter * 7) + $bills[0]->e_meter * 7));
							?>
						</p>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</div>
</section>
