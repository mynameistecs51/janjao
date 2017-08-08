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
		<div class="col-lg-7" align="left">
			<?php //echo anchor(base_url().'report_checkin/PDF/'.$date = str_replace('/','_',$keyword), '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>  export PDF', 'class="btn btn-primary" target ="_blank"'); ?>
		</div>
		<div class="col-lg-5" align="right">
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
		<div class="col-lg-12" align="left">
			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" style="overflow-x:auto;width: 100%">
				<thead style="background:#BDBDBD;font-size: 12px; ">
					<tr >
						<!-- <th style="text-align: center;width: 20px;">No.</th> -->
						<th style="text-align: center;width: 120px;">MONTH</th>
						<th style="text-align: center;width: 230px;"> TOTAL </th>
					</tr>
				</thead>
				<tbody style="font-size: 12px;">
					<?php
					foreach ($repCheckout as $key => $value) {
						// print_r($value);
						echo $value['bookedCode'];
					}
					?>
					<?php //for ($i=1; $i <= 12 ; $i++) :?>
						<!-- <tr>
							<td><?php echo $getMonth[$i]; ?></td>
							<td></td>
						</tr> -->
						<?php //endfor;?>
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










