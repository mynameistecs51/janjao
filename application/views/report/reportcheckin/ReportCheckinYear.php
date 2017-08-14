<!-- Page Name -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
<link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
<div class="col-lg-3">
	<i style="font-size: 18px;"><?php echo $viewName .'<u><span class="text-primary">  YEAR</span></u>';?></i>
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
		<?php //echo anchor(base_url().'report_checkin/PDF/'.$date = str_replace('/','_',$keyword), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  export PDF', 'class="btn btn-primary" target ="_blank"'); ?>
		<div class="col-lg-5 pull-right" align="right">
			<div class="sh-left">
				<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url();?>report_checkin/search/">
					ปี :
					<select name="startYear" class="form-control"  style="width: 138px;margin-right: 10px;">
						<?php for($i=(-4);$i <= (+2);$i++): ?>
							<?php $selectedY = (date('Y')+$i == date('Y'))?'selected':'' ?>
							<option value="<?php echo date('Y')+$i; ?>" <?php echo $selectedY; ?>><?php echo (date('Y')+$i)+543; ?></option>
						<?php endfor; ?>
					</select>
					<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row text-center" style="margin-top: 10px;">
		<div class="col-lg-12" align="center">
			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" style="overflow-x:auto;width: 50%;font-weight: bold;">
				<thead style="background:#BDBDBD;font-size: 12px;">
					<tr >
						<!-- <th style="text-align: center;width: 20px;">No.</th> -->
						<th style="text-align: center;width: 120px;">MONTH</th>
						<th style="text-align: center;width: 230px;"> TOTAL </th>
					</tr>
				</thead>
				<tbody style="font-size: 12px;">
					<?php
					$sumAll = array(); $roomAll = array(); $sumPledge = array(); $sumRetes = array();
					$sumService = array(); $sumDiscount = array();
					?>
					<?php foreach ($getMonth as $keyMonth => $month): ?>
						<?php $sumAll = array(); ?>
						<tr>
							<td style="text-align: center;width: 120px; font-size: 16px;"> <?php echo $month; ?></td>
							<td align="center">

								<?php foreach ($repCheckout as $key => $report) :?>
									<?php
									$datetime = explode('-',$report['checkInAppointDate']);
									if($keyMonth == $datetime[1] ):
										//Pledge
										$pledge = ($report['status'] == 'CHECKOUT')? 0.00 :$report['cashPledge'];
									array_push($sumPledge, $pledge);

										//retes
									$retes = ($report['totalLast'] == 0.00)? 0.00 : ($report['totalLast'] - $report['cashPledge']);
									array_push($sumRetes, $a = ($retes == 0.00)? 0.00 :$report['totalLast'] - $report['cashPledge']);

										//service
									$service= $report['sumtotal'];
									array_push($sumService,$report['sumtotal']);

										//discount
									$discount = (empty($report['discount']))?0.00 : $report['discount'];
									array_push($sumDiscount, $discount);

										//sum ค่าห้อง + มัดจำ
									$sum = (empty($report['sumtotal']))?$report['totalLast'] :  $report['totalLast'] + ($report['sumtotal'] - $report['cashPledge']) - $discount ;
									array_push($sumAll, $sum);
									endif;
									?>
								<?php endforeach; ?>
								<?php
								echo number_format(array_sum($sumAll),2) ." บาท";
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>

			</table>
		</div>
	</div>

	<!-- /.row -->
	<!--  END Fair List -->

	<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript">
		$(function() {
			checkrete();
			checkPledge();
			checkservice();

			$.datetimepicker.setLocale('th');
			$('#startDate').datetimepicker({
				timepicker:true,
				mask:true,
				format:'d/m/Y',
				lang:'th',
			});
		});

		function checkPledge(){
			$('.checkPledge').change(function() {
				if($(this).is(':checked')){
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkPledge";?>',
						type: 'post',
						// dataType: 'json',
						data: {'checkPledge': this.value,'checked': '1'},
					});
				}else if($(this).removeAttr('checked')) {
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkPledge";?>',
						type: 'post',
						dataType: 'json',
						data: {'checkPledge': this.value,'checked': '0'},
					});
				}
			});
		}

		function checkrete() {
			$('.checkrete').change(function() {
				if($(this).is(':checked')){
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkrete";?>',
						type: 'post',
						// dataType: 'json',
						data: {'checkrete': this.value,'checked': '1'},
					});
				}else if($(this).removeAttr('checked')) {
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkrete";?>',
						type: 'post',
						// dataType: 'json',
						data: {'checkrete': this.value,'checked': '0'},
					});
				}
			});

		}

		function checkservice(){
			$(".checkservice").change(function() {
				if($(this).is(':checked')){
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkservice";?>',
						type: 'post',
						dataType: 'json',
						data: {'checkservice': this.value,'checked': '1'},
					});
				}else if($(this).removeAttr('checked')) {
					$.ajax({
						url: '<?php echo base_url()."report_checkin/checkservice";?>',
						type: 'post',
						dataType: 'json',
						data: {'checkservice': this.value,'checked': '0'},
					});
				}
			});
		}
	</script>










