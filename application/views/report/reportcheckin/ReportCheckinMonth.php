<link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
<div class="col-lg-3">
	<i style="font-size: 18px;"><?php echo $viewName .'<u><span class="text-primary">  MONTH </span></u>';?></i>
</div>
<div class="col-lg-9 text-right" >
	<?php echo anchor(base_url().'report_checkin/', '<i class="fa fa-list" aria-hidden="true"></i> รายวัน', 'class="btn btn-success"'); ?>
	<?php echo anchor(base_url().'report_checkin/checkinmonth/', '<i class="fa fa-list" aria-hidden="true"></i> รายเดือน', 'class="btn btn-danger"'); ?>
	<?php echo anchor(base_url().'report_checkin/checkinyear/', '<i class="fa fa-list" aria-hidden="true"></i> รายปี', 'class="btn btn-info"'); ?>
</div>
<hr style="margin-top: 30px;">
<!-- Page Content -->
<div class="col-lg-12">
	<!-- Page Features -->
	<div class="row text-center">
		<div class="col-lg-7" align="left">
			<?php echo anchor(base_url().'report_checkin/PDF/'.$date = str_replace('/','_',$keyword), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  export PDF', 'class="btn btn-primary" target ="_blank"'); ?>
		</div>
		<div class="col-lg-5" align="right">
			<div class="sh-left">
				<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>report_checkin/search/">
					เดือน :
					<select name="startMonth" class="form-control"  style="width: 138px;margin-right: 10px;">
						<?php foreach ($getMonth as $keyMonth => $valueMonth) :?>
							<?php
							if(empty($keywordMonth)){
								$selectedM = ($keyMonth == date('m'))?"selected" : "";
							}else{
								$selectedM = ($keyMonth == $keywordMonth)? "selected" : "";
							}
							?>
							<option value="<?php echo $keyMonth; ?>" <?php echo $selectedM; ?>><?php echo $valueMonth; ?></option>
						<?php endforeach; ?>
					</select>
					ปี :
					<select name="startYear" class="form-control"  style="width: 138px;margin-right: 10px;">
						<?php for($i=(-2);$i <= (+2);$i++): ?>
						<?php
						if(empty($keywordYear)){
							$selectedY = (date('Y')+$i == date('Y'))?'selected':'';
						}else{
							$selectedY = ($keywordYear == (date('Y')+$i))? "selected" : "";
						}
						?>
						<?php //$selectedY = (date('Y')+$i == date('Y'))?'selected':'' ?>
						<option value="<?php echo date('Y')+$i; ?>" <?php echo $selectedY; ?>><?php echo (date('Y')+$i)+543; ?></option>
					<?php endfor; ?>
				</select>
				&nbsp;
				<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
			</form>
		</div>
	</div>
</div>
<div class="row text-center" style="margin-top: 10px;">
	<div class="col-lg-12" align="left">
		<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" style="overflow-x:auto;width: 100%">
			<thead style="background:#BDBDBD;font-size: 12px; ">
				<tr >
					<th style="text-align: center;width: 40px;">No.</th>
					<th style="text-align: center;width: 120px;">BOOKED No.</th>
					<th style="text-align: center;width: 150px;">NAME </th>
					<th style="text-align: center;width: 200px;">ROOM</th>
					<th style="text-align: center;width: 100px;">CHECKIN DATE</th>
					<th style="text-align: center;width: 100px;">CHECKOUT DATE</th>
					<th style="text-align: center;width: 10px;">UPDATE DTATE</th>
					<th style="text-align: center;width: 80px;"> STATUS</th>
					<th style="text-align: center;width: 100px;"> CASH PLEDGE</th>
					<th style="text-align: center;width: 100px;"> RETES ROOM</th>
					<th style="text-align: center;width: 100px;"> SERVICE </th>
					<th style="text-align: center;width: 100px;"> CHECKIN DISCOUNT </th>
					<th style="text-align: center;width: 100px;"> CHECKOUT DISCOUNT </th>
					<th style="text-align: center;width: 230px;"># </th>
				</tr>
			</thead>
			<tbody style="font-size: 12px;">
				<?php
				$sumAll = array(); $roomAll = array(); $sumPledge = array(); $sumRetes = array(); $sumService = array(); $sumDiscount = array(); $sumCheckinDiscount = array();
				?>
				<?php $j=1; ?>
				<?php if(count($repCheckout)>0) { ?>
					<?php foreach ($repCheckout as $key => $report) :?>
						<?php $numRoom = count($report['selectRoom']); ?>
						<tr>
							<td ><?php echo $j++; ?></td>
							<td><?php echo $report['bookedCode']; ?></td>
							<td>
								<?php
								echo $report['firstName']." ".$report['lastName'].$mobile = (empty($report['mobile']))?"": "( ".$report['mobile'].")";
								?>
							</td>
							<td>
								<?php
								for($i=0;$i < $numRoom; $i++)
								{
									echo "<u>ROOM ".$report['selectRoom'][$i]['roomID']."</u>,&nbsp;&nbsp;";
									array_push($roomAll,$report['selectRoom'][$i]['roomID']);
								}
								?>
							</td>
							<td>
								<?php
								$dateIn = explode('/',$report['checkinDate']); $yearIn = explode(" ",$dateIn[2]);
								echo $dateIn[0]."/".$dateIn[1]."/".($yearIn[0]+543)."  <br> เวลา ".$yearIn[1];
								?>
							</td>
							<td>
								<?php
								$dateOut = explode('/',$report['checkoutDate']); $yearYear = explode(" ",$dateOut[2]);
								echo $dateOut[0]."/".$dateOut[1]."/".($yearYear[0]+543)." <br> เวลา ".$yearYear[1];?>
							</td>
							<td>
								<?php
								$dateCreate = explode('-',$report['updateDT']); $yearCreate = explode(" ",$dateCreate[2]);
								echo $yearCreate[0]."/".$dateCreate[1]."/".($dateCreate[0]+543)." <br> เวลา ".date_format(date_create($yearCreate[1]),"H:i");
								?>
							</td>
							<td>
								<?php
								echo $report['status'],"<br>";
								echo "BY ",$report['updateBY'];
								?>
							</td>
							<td align="center">
								<!-- เงินมัดจำ -->
								<?php
								$pledge = ($report['status'] == 'CHECKOUT')? 0.00 :$report['cashPledge'];
								echo number_format($pledge,2);
								array_push($sumPledge, $pledge);
								?>
							</td>
							<td align="center">
								<!-- ค่าห้อง (ค่าห้อง+มัดจำ)-มัดจำ -->
								<?php
								$retes = ($report['totalLast'] == 0.00)? 0.00 : ($report['totalLast'] - $report['cashPledge']);
								echo number_format($retes,2);
								array_push($sumRetes, $a = ($retes == 0.00)? 0.00 :$report['totalLast'] - $report['cashPledge']);
								?>
							</td>
							<td align="center">
								<!-- service -->
								<?php
								$service= $report['sumtotal'];
								echo  number_format($service,2);
								array_push($sumService,$report['sumtotal']);
								?>
							</td>
							<td align="right">
								<?php
								$checkinDiscount = ($report['checkinDiscount'] == 0.00) ? '0.00' : $report['checkinDiscount'];
								echo number_format($checkinDiscount,2);
								array_push($sumCheckinDiscount,$checkinDiscount);
								?>
							</td>
							<td align="right">
								<?php
								$checkoutdiscount = ($report['discount'] == 0.00 ) ? '0.00' : $report['discount'];
								echo number_format($checkoutdiscount,2);
								array_push($sumDiscount, $checkoutdiscount);
								?>
							</td>
							<td align="center"> <!-- (ค่าห้อง + เงินมัดจำ)+(service-มัดจำ) -(checkinDiscount + checkoutDiscount) -->
								<?php
								$sum = (empty($report['sumtotal']))? ($report['totalLast'] - $checkinDiscount) :  $report['totalLast'] + ($report['sumtotal'] - $report['cashPledge']) - ($checkinDiscount + $checkoutdiscount);
								echo number_format($sum,2);
								array_push($sumAll, $sum);
								?>
								บาท
							</td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td colspan="3">
						</td>
						<td> <b>รวมพัก  <?php echo count($roomAll);?> ห้อง</b>
						</td>
						<td colspan="4">
						</td>
						<td align="center"><?php echo number_format(array_sum($sumPledge),2); ?>  บาท</td>
						<td align="center"><?php echo number_format(array_sum($sumRetes),2); ?>  บาท</td>
						<td align="center"><?php echo number_format(array_sum($sumService),2); ?>  บาท </td>
						<td align="center"><?php echo number_format(array_sum($sumCheckinDiscount),2); ?>  บาท </td>
						<td align="center"><?php echo number_format(array_sum($sumDiscount),2); ?>  บาท </td>
						<td align="center">	<b>รวมเงิน 	<?php  echo number_format(array_sum($sumAll),2);?> บาท</b>	</td>
					</tr>
				<?php }else{ ?>
					<tr>
						<td colspan="13">No Booked And Checkin Data !</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- /.row -->
<!--  END Fair List -->

<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$(function() {
		$.datetimepicker.setLocale('th');
		$('#startDate').datetimepicker({
			timepicker:true,
			mask:true,
			format:'d/m/Y',
			lang:'th',
		});
	});
</script>







