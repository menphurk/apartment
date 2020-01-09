<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style>
		body{
			font-family: "Garuda";
		}
	</style>
</head>
<body>

<div id="container">
<!--	<h1>Welcome to CodeIgniter!</h1>-->

	<div id="body">
		<h2><center>ใบแจ้งหนี้</center></h2>
		<table width="100%" border="1" style="border-collapse: collapse;font-size:12pt;margin-top:8px;">
			<tr style="border:1px solid #000;padding:4px;">
				<td height="100" colspan="3" align="left" valign="top">
					<h3>หอพัก Apartment จำกัด <div align="right">
							ห้องที่ : <?php echo $invoice[0]->placeroom;?><?php echo $invoice[0]->codefloor;?><br>
							เลขที่ใบแจ้งหนี้ : Invoice-<?php echo $invoice[0]->id;?> <br>
							ลูกค้า : <?php echo $invoice[0]->fullname;?>
						</div>
					</h3></td>
			</tr>
			<tr>
				<td align="center" style="border-right:1px solid #000;padding:4px;text-align:center;"><strong>รายการ</strong></td>
				<td align="center" style="border-right:1px solid #000;padding:4px;text-align:center;"><strong>จำนวน</strong></td>
				<td align="center" style="border-right:1px solid #000;padding:4px;text-align:center;"><strong>ราคา</strong></td>
			</tr>
			<tr>
				<td align="center">ค่าเช่าห้อง</td>
				<td align="center">1</td>
				<td align="center"><?php echo number_format($invoice[0]->price);?></td>
			</tr>
			<tr>
				<td align="center">ค่าน้ำ</td>
				<td align="center">7 หน่วย</td>
				<td align="center"><?php echo $invoice[0]->water_meter * 7;?></td>
			</tr>
			<tr>
				<td align="center">ค่าไฟ</td>
				<td align="center">7 หน่วย</td>
				<td align="center"><?php echo $invoice[0]->e_meter * 7;?></td>
			</tr>
			<tr>
				<td colspan="2" align="right" height="35"><strong>รวมต้องชำระทั้งสิน</strong></td>
				<td align="center"><strong><?php echo number_format($invoice[0]->price + ($invoice[0]->water_meter * 7) + $invoice[0]->e_meter * 7);?> บาท </strong></td>
			</tr>
			<tr>
				<td height="84" colspan="3" align="center"><strong>Remark :</strong> ชำระเงินเกินของทุกวันที่ 5 ปรับวันละ 100 บาท</td>
			</tr>
		</table>
	</div>

</div>

</body>
</html>
