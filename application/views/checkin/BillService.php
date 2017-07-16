<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
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
<div class="container">
	<div class="row">
		<div id="example">
			<div class="col-sm-12">
				<table width="100%" style="font-size: 11px;">
					<tr >
						<td style="width: 30%;"></td>
						<td align="center" > <b>ใบเสร็จรับเงิน </b></td>
						<td style="width: 30%;"></td>
					</tr>
					<tr>
						<td colspan="2"  style="widows: 100%;text-align: left;">
							<div class="headname"><img src="<?php echo base_url().'assets/images/logoBlack.png'; ?>" width="150"></div>
							666 หมู่ 6	ถ.โพนพิสัย ต.หมากแข้ง 	อ.เมือง จ.อุดรธานี 41000 <br>
							โทร 0910571616 <br>
							หมายเลขผู้เสียภาษี  111111111111
						</td>
						<td style="widows: 100%;text-align: right;">
							<label > ต้นฉบับ</label>
							<br>
							<label style="padding-left: 0px;text-align: left;">เลขที่ : <?php echo $billCode; ?></label>
							<br>
							<label style="padding-left: 0px;text-align: left;">วันที่ : <?php echo date('j').' เดือน '.$getMonth[date('m')].' พ.ศ. '.$getYear[date('Y')];?></label>
							<br>
							<label style="padding-left: 0px;text-align: left;">ออกโดย : <?php echo $this->session->userdata('UserName'); ?></label>
						</td>
					</tr>
					<tr>
						<td colspan="5"><hr>
							<span><b>ชื่อลูกค้า : </b>   <?php echo $checkinDtl['firstName'].' '.$checkinDtl['lastName']; ?></span>
							<br>
							<span><b>ที่อยู่ : </b> <?php echo $checkinDtl['address']; ?></span>
						</td>
					</tr>
				</table>
				<table width="100%" border='0' align="left" cellpadding="0" cellspacing="0" style="font-size: 11px;">
					<thead>
						<tr style="background:#E6E6E6;" align="left">
							<th style="border-bottom:1px solid black">#</th>
							<th style="border-bottom:1px solid black;text-align: right;text-align: center" >รายการ</th>
							<th style="border-bottom:1px solid black;text-align: right;" width="15%" align="right">จำนวน</th>
							<th style="border-bottom:1px solid black;text-align: right;" width="20%" align="right">หน่วยละ</th>
							<th style="border-bottom:1px solid black;text-align: right;" width="20%" align="right">รวม</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$totalprice = 0.00; $totalamount = 0.00; $totalsum = 0.00;
						$n = 1;
						foreach ($serviceDtl as $rs) {  ?>
						<tr id="<?php echo $n; ?>">
							<td style="border-bottom:1px solid black"><?php echo $n; ?></td>
							<td style="border-bottom:1px solid black">
								<?php echo $serviceName = (empty($rs['serviceName']))?'':$rs['serviceName']; ?>
							</td>
							<td style="border-bottom:1px solid black" align="right">
								<?php echo $amount = (empty($rs['amount']))?0.00:$rs['amount']; ?>
							</td>
							<td style="border-bottom:1px solid black" align="right">
								<?php echo $price = (empty($rs['price']))?0.00:$rs['price']; ?>
							</td>
							<td style="border-bottom:1px solid black" align="right">
								<?php echo number_format($price*$amount,2);?>
							</td>
						</tr>
						<?php
						$totalsum 	 += ($price*$amount);
						?>
						<?php $n++; } ?>
					</tbody>
					<tfoot >
						<tr >
							<td colspan="5" height="20">	</td>
						</tr>
						<tr height="25">
							<td colspan="3" align="right">+ VAT  </td>
							<td colspan="2" align="right" style="border-bottom:1px solid black"> <?php echo $vat =(empty($rs['vat']))?$serviceDtl[0]['totalVat'] : $rs['vat'] ; ?> &nbsp;&nbsp;&nbsp;&nbsp;%</td>
						</tr>
						<tr height="25">
							<td colspan="3" align="right">รวม</td>
							<td colspan="2" align="right" style="border-bottom:1px solid black">
								<?php echo number_format($totalsum + (($totalsum * $vat)/100),2); ?> บาท
							</td>
						</tr>
						<tr height="25">
							<td colspan="3" align="right">ส่วนลด</td>
							<td colspan="2" align="right" style="border-bottom:1px solid black"><?php echo $discount = (empty($rs['discount']))?$serviceDtl[0]['totalDiscount'] : $rs['discount'] ; ?> บาท</td>
						</tr>
						<tr height="25">
							<td colspan="3" align="right">เงินมัดจำ</td>
							<td colspan="2" align="right" style="border-bottom:1px solid black"><?php echo $checkinDtl['cashPledge']; ?> บาท</td>
						</tr>
						<tr height="25">
							<td colspan="3" align="right">รวมสุทธิ</td>
							<td colspan="2" align="right" style="border-bottom:3px double black">
								<?php $sumTotal = ($checkinDtl['cashPledge'] + $discount) - $totalsum;?>
								<?php echo number_format($sumTotal,2); ?> บาท
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-sm-12" > <br><br><br></div>
			<div class="col-sm-12">
				<div class="col-sm-9 clearfix " style="text-align: left;font-size: 14px;">
					ลงชื่อ....................................ผู้รับเงิน <br>
					วันที่  <?php echo date('j').' เดือน '.$getMonth[date('m')].' พ.ศ. '.$getYear[date('Y')];?>
				</div>
				<!-- <div class="col-sm-6 clearfix">asdf</div> -->
			</div>
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