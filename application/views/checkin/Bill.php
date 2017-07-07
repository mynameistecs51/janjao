<style type="text/css">
	@page{
		size: a4;
	}
	@font-face {
		font-family: TH_Charmonman;
		src: url("<?php echo base_url(); ?>assets/fonts/TH Charmonman.ttf");
	}
	.headname{
		font-family: "TH_Charmonman";
		font-size: 16px;
	}
</style>
<div class="row">
	<div class="container"  id="example">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<table width="100%" border='0' align="left" cellpadding="0" cellspacing="0" >
				<caption >
					<table width="100%" >
						<tr >
							<td class="col-sm-4" style="width: 30%;"></td>
							<td class="col-sm-4" align="center" > <b>ใบเสร็จรับเงิน </b></td>
							<td class="col-sm-4" style="width: 30%;"></td>
						</tr>
						<tr>
							<td class="col-sm-3" colspan="2"  style="widows: 100%;text-align: left;">
								<div class="headname"><img src="<?php echo base_url().'assets/images/logoBlack.png'; ?>" width="100"></div>
								<!-- จันทร์เจ้า โฮเทล  <br>-->
								666 หมู่ 6	ถ.โพนพิสัย ต.หมากแข้ง 	อ.เมือง จ.อุดรธานี 41000 <br>
								โทร 0910571616 <br>
								หมายเลขผู้เสียภาษี  111111111111
							</td>
							<td class="col-sm-3 " style="widows: 100%;text-align: right;">
								<label > ต้นฉบับ</label>
								<br>
								<label style="width: 40%;padding-left: 0px;text-align: left;">เลขที่ </label>
								<label style="padding-right: 0%;text-align: right;">1234</label>
								<br>
								<label style="width: 40%;padding-left: 0px;text-align: left;">วันที่ </label>
								<label style="padding-right: 0%;text-align: right;"><?php echo date('d-m-y'); ?></label>
								<br>
								<label style="width: 40%;padding-left: 0px;text-align: left;">ออกโดย </label>
								<label style="padding-right: 0%;text-align: right;">Administrator</label>
							</td>
						</tr>
						<tr>
							<td colspan="3"><hr>
								<span><b>ชื่อลูกค้า : </b>   <?php echo $checkinDtl['firstName'].' '.$checkinDtl['lastName']; ?></span>
								<br>
								<span><b>ที่อยู่ : </b> <?php echo $checkinDtl['address']; ?></span>
							</td>
						</tr>
					</table>
				</caption>
				<thead>
					<tr style="background:#E6E6E6;" align="left">
						<th style="border-bottom:1px solid black">ที่</th>
						<th style="border-bottom:1px solid black" >รายการ</th>
						<th style="border-bottom:1px solid black" width="80" align="right">จำนวน</th>
						<th style="border-bottom:1px solid black" width="80" align="right">หน่วยละ</th>
						<th style="border-bottom:1px solid black" width="80" align="right">จำนวนเงิน</th>
					</tr>
				</thead>
				<tbody>
					<?php $j= 1; ?>
					<?php foreach ($getDetail as $key => $rowDetail) :?>
						<?php $numRoom = count($rowDetail['selectRoom']); ?>
						<?php	for($i=0;$i < $numRoom; $i++):?>
							<tr>
								<td style="border-bottom:1px solid black" ><?php echo $j++; ?></td>
								<td style="border-bottom:1px solid black" >
									ห้อง
									<?php
									echo $rowDetail['selectRoom'][$i]['roomID'];
									echo $bed = ($rowDetail['selectRoom'][$i]['bed'] == "SINGLE")? "<li>เตียงเดี่ยว</li>" : "<li>เตียงคู่</li>";
									?>
								</td>
								<td style="border-bottom:1px solid black" align="right"><?php echo $dateDtl->days; ?> วัน</td>
								<td style="border-bottom:1px solid black" align="right">
									<?php echo $price =($rowDetail['bookedType'] == 'DAY')?$rowDetail['selectRoom'][$i]['price_day']:'';?>

								</td>
								<td style="border-bottom:1px solid black" align="right">
									<?php
									echo $dateDtl->days * $price;
									?>
								</td>
							</tr>
						<?php endfor; ?>
					<?php endforeach; ?>
				</tbody>
				<tfoot >
					<tr style="background:#E6E6E6;" >
						<td colspan="4" align="center">รวม</td>
						<td align="right"><?php echo (($dateDtl->days * $price) * $numRoom ); ?>	</td>
					</tr>
					<tr>
						<td colspan="5" align="right" style="width: 100%;text-align: right; height: 200px;">
							ลงชื่อ....................................ผู้รับเงิน <br>
							วันที่  <?php echo date('j').' เดือน '.$getMonth[date('m')].' พ.ศ. '.$getYear[date('Y')];?>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>

	</div>
</div>
<script type="text/javascript">
	var data = document.getElementById('example');
	newWin = window.open("");
	newWin.document.write(data.outerHTML);
	newWin.print();
	newWin.close();
</script>