<!-- Page Name -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
<div class="col-lg-3">
	<i style="font-size: 18px;"><?php echo $viewName .'<u><span class="text-primary">  DAY</span></u>';?></i>
</div>
<div class="col-lg-9 text-right" >
	<?php echo anchor(base_url().'report_checkin/', '<i class="fa fa-list" aria-hidden="true"></i> รายวัน', 'class="btn btn-success"'); ?>
	<?php echo anchor(base_url().'report_checkin/checkinmonth/', '<i class="fa fa-list" aria-hidden="true"></i> รายเดือน', 'class="btn btn-danger"'); ?>
	<?php echo anchor(base_url().'report_checkin/checkinmonth/', '<i class="fa fa-list" aria-hidden="true"></i> รายปี', 'class="btn btn-info"'); ?>
</div>
<hr style="margin-top: 30px;">
<!-- Page Content -->
<div class="col-lg-12">
	<!-- Page Features -->
	<div class="row text-center">
		<div class="col-lg-12" align="right">
			<div class="sh-right">
				<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>checkin/search/">
					<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
					<input type="text" class="form-control"  id="keyword" style="width: 250px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $keyword; ?>">
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
	<div class="div_modal"> <!-- show modal Bill --> </div>
	<!-- /.row -->
	<!--  END Fair List -->




