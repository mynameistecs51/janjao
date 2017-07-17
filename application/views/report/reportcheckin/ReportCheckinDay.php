<!-- Page Name -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
<link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
<div class="col-lg-3">
	<i style="font-size: 18px;"><?php echo $viewName .'<u><span class="text-primary">  DAY</span></u>';?></i>
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
			<?php echo anchor(base_url().'report_booked/PDF/'.$date = str_replace('/','_',$keyword), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  export PDF', 'class="btn btn-primary" target ="_blank"'); ?>
		</div>
		<div class="col-lg-5" align="right">
    			<div class="sh-left">
				<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>report_checkin/search/">
					<input type="text" class="form-control"  id="startDate" style="margin-right: 10px;" name="keywordDay" value="">
					<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row text-center" style="margin-top: 10px;">
		<div class="col-lg-12" align="left">
			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
				<thead>
					<tr >
						<th  style="text-align: center;width: 40px;">No.</th>
						<th style="text-align: center;width:  120px;">BOOKED No.</th>
						<th style="text-align: center;width: 200px;">NAME </th>
						<th style="text-align: center;width:  250px;">ROOM</th>
						<th style="text-align: center;width:  140px;">CHECKIN DATE</th>
						<th style="text-align: center;width:  140px;">CHECKOUT DATE</th>
						<th style="text-align: center;width:  140px;">CREATE DTATE</th>
						<th style="text-align: center;width:  80px;"> STATUS</th>
						<th style="text-align: center;width:  230px;">#</th>
					</tr>
				</thead>
				<tbody>
					<?php $j=1; ?>
					<?php if(count($repCheckout)>0) { ?>
					<?php foreach ($repCheckout as $key => $report) :?>
						<?php $numRoom = count($report['selectRoom']); ?>
						<tr>
							<td ><?php echo $j++; ?></td>
							<td><?php echo $report['bookedCode']; ?></td>
							<td><?php echo $report['firstName']." ".$report['lastName']; ?></td>
							<td>
								<?php //echo $report['roomID'];
								for($i=0;$i < $numRoom; $i++)
								{
									echo "ROOM ".$report['selectRoom'][$i]['roomID'].",&nbsp;&nbsp;";
								}
								?>
							</td>
							<td><?php echo $report['checkinDate']; ?></td>
							<td><?php echo $report['checkoutDate']; ?></td>
							<td><?php echo $report['createDT']; ?></td>
							<td>
								<?php
								echo $report['status'],"<br>";
								echo "BY ",$report['updateBY'];
								?>
							</td>
							<td align="center">
								<?php ;
								echo $sum = (empty($report['sumtotal']))?$report['totalLast'] : $report['sumtotal'] + $report['totalLast'];
								// echo $report['totalLast'];
								// $sumtotal = $report['totalLast']+($report['cashPledge'] - ($report['discount'] + $report['sumtotal']) );
								// echo number_format($sumtotal,2);
								?>
								บาท
							</td>
						</tr>
					<?php endforeach; ?>
					<?php }else{ ?>
					<tr>
						<td colspan="9">No Booked And Checkin Data !</td>
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







