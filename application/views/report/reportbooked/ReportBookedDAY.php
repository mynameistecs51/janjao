    <link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
    <!-- Page Name -->
    <div class="col-lg-2">
    	<i style="font-size: 18px;">REPORT BOOKED <u><span class="text-primary">DAY</span></u></i>
    </div>
    <div class="col-lg-10 text-right" >
    	<?php echo anchor(base_url().'report_booked/bookedday/', '<i class="fa fa-list" aria-hidden="true"></i> รายวัน', 'class="btn btn-success"'); ?>
    	<?php echo anchor(base_url().'report_booked/bookedmonth/', '<i class="fa fa-list" aria-hidden="true"></i> รายเดือน', 'class="btn btn-danger"'); ?>
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
    				<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>report_booked/search/">
    					Booked Date :
    					<input type="text" class="form-control"  id="startDate" style="margin-right: 10px;" name="keywordDay" value="">
    					<button  type="submit" class="btn btn-primary" style="float: right;">Search</button>
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="row text-center" style="margin-top: 10px;">
    		<div class="col-lg-12" align="left">
    			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    				<thead style="background:#BDBDBD;font-size: 12px; ">
    					<tr>
    						<th style="text-align: center;width: 40px;">No.</th>
    						<th style="text-align: center;width:  150px;">BOOKED NUMBER</th>
    						<th style="text-align: center;width:  150px;">NAME </th>
    						<th style="text-align: center;width:  150px;">ROOM</th>
    						<th style="text-align: center;width:  100px;">BOOKED DATE</th>
    						<th style="text-align: center;width:  100px;">CHECKIN DATE</th>
    						<th style="text-align: center;width:  80px;"> CREATE BY</th>
    						<!-- <th style="text-align: center;width:  60px;">จำนวนเงิน</th> -->
    					</tr>
    				</thead>
    				<tbody>
    					<?php $i=1; ?>
    					<?php if(count($getBooked)>0) { ?>
    					<?php foreach ($getBooked as $key => $rowbooked) :?>
    						<?php $numRoom = count($rowbooked['selectRoom']); ?>
    						<tr id="row<?php echo $rowbooked['bookedID']; ?>">
    							<td><?php echo $i++; ?></td>
    							<td><?php echo $rowbooked['bookedCode'] ?></td>
    							<td><?php echo $rowbooked['firstName']." ".$rowbooked['lastName']." ( ".$rowbooked['mobile']." )"; ?></td>
    							<td style="text-align: center;">
								<?php //echo $numRoom ;
								for($j=0;$j < $numRoom; $j++)
								{
									echo "<button class='col-sm-3 btn-warning' style='text-align:center;margin-left:5px;'>",$rowbooked['selectRoom'][$j]['roomID']."</button> ";
								}
								?>
							</td>
							<td><?php echo $rowbooked['bookedDate']; ?></td>
							<td><?php echo $rowbooked['checkInAppointDate']; ?></td>
							<td><?php echo $rowbooked['updateBY']; ?></td>
						</tr>
					<?php endforeach; ?>
					<?php }else{ ?>
					<tr>
						<td colspan="8">No Booked Data !</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="div_modal"> <!-- show modal Bill --> </div>
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



