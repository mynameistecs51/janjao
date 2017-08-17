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
							<td style="width: 30%;"></td>
							<td align="center" > <b>ใบเสร็จรับเงิน </b></td>
							<td style="width: 30%;"></td>
						</tr>
						<tr>
							<td colspan="2"  style="widows: 100%;text-align: left;">
								<div class="headname">
									<img src="<?php echo base_url().'assets/images/logoBlack.png'; ?>" style="width:150px;" alt="" />
								</div>
								<?php echo $aboutList['address']; ?>
								<br>
								<?php echo "โทรศัพท์ ".$aboutList['mobile']; ?>
								<br>
								<?php echo "เลขประจำตัวผู้เสียภาษี ".$aboutList['vatNumber']; ?>
							</td>
							<td class="col-sm-3 " style="widows: 100%;text-align: right;">
								<label > ต้นฉบับ</label>
								<br>
								<label style="width: 40%;padding-left: 0px;text-align: left;">เลขที่ </label>
								<label style="padding-right: 0%;text-align: right;">1234</label>
								<br>
								<label style="width: 40%;padding-left: 0px;text-align: left;">วันที่ </label>
								<label style="padding-right: 0%;text-align: right;"><?php echo date('d-m-Y'); ?></label>
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
									echo $rowDetail['selectRoom'][$i]['cashr_roomID'];
									echo $bed = ($rowDetail['selectRoom'][$i]['bed'] == "SINGLE")? "<li>เตียงเดี่ยว</li>" : "<li>เตียงคู่</li>";
									?>
								</td>
								<td style="border-bottom:1px solid black" align="right">
									<?php
									if($rowDetail['bookedType'] == 'SHORT'){
										echo "ชั่วคราว";
									}else if($rowDetail['bookedType'] == 'DAY'){
										echo $dateDtl->days ."วัน";
									}else if($rowDetail['bookedType'] == 'MONTH'){
										echo $dateDtl->m .'เดือน';
									}
									?>
								</td>
								<td style="border-bottom:1px solid black" align="right">
									<?php
									if($rowDetail['bookedType'] == 'SHORT'){
										echo number_format($rowDetail['selectRoom'][$i]['price_short'],2);
									}else if($rowDetail['bookedType'] == 'DAY'){
										echo number_format($rowDetail['selectRoom'][$i]['price_day'],2);
									}else if($rowDetail['bookedType'] == 'MONTH'){
										echo number_format($rowDetail['selectRoom'][$i]['price_month'],2);
									}
									;?>
								</td>
								<td style="border-bottom:1px solid black" align="right">
									<?php
									if($rowDetail['bookedType'] == 'SHORT'){
										echo $price = number_format($rowDetail['selectRoom'][$i]['price_short'],2);
									}else if($rowDetail['bookedType'] == 'DAY'){
										echo $price = number_format($dateDtl->days * $rowDetail['selectRoom'][$i]['price_day'],2);
									}else if($rowDetail['bookedType'] == 'MONTH'){
										echo $price = number_format($dateDtl->m * $rowDetail['selectRoom'][$i]['price_month'],2);
									}
									?>
								</td>
							</tr>

						<?php endfor; ?>
						<tr>
							<td colspan="3"  ></td>
							<td align="right">เงินมัดจำ</td>
							<td style="border-bottom:1px solid black" align="right">
								<?php echo $rowDetail['cashPledge']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="3"  ></td>
							<td  align="right">+ VAT</td>
							<td style="border-bottom:1px solid black" align="right">
								<?php echo $rowDetail['totalVat']; ?> %
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot >
					<tr style="background:#E6E6E6;" >
						<td colspan="4" align="right">รวมสุทธิ</td>
						<td  align="right" style="border-bottom:3px double black">
							<?php $sumTotal = ( ($price * $numRoom)  +$rowDetail['cashPledge']); ?>
							<?php echo number_format($sumTotal + ( ($sumTotal * $rowDetail['totalVat'] ) /100 ),2 ); ?>
						</td>
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