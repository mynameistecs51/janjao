    <!-- Page Name -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
    <div class="col-lg-12">
    	<i style="font-size: 18px;">BOOKED LIST</i>
    </div>
    <hr style="margin-top: 30px;">


    <!-- Page Content -->
    <div class="col-lg-12">
    	<!-- Page Features -->
    	<div class="row text-center">
    		<div class="col-lg-12" align="right">
    			<div class="sh-right">
    				<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>user/search/">
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
    						<th style="text-align: center;width:  150px;">Serial Number</th>
    						<th  >NAME </th>
    						<th style="text-align: center;width:  150px;">BOOKING DATE</th>
    						<th style="text-align: center;width:  80px;">ROOM</th>
    						<th style="text-align: center;width:  200px;">CHECK IN DATE</th>
    						<th style="text-align: center;width:  100px;"> CREATE BY</th>
    						<th width="300">#</th>
    					</tr>
    				</thead>
    				<tbody>
    					<tr>
    						<td>1</td>
    						<td>BK170613201001</td>
    						<td>นายไชยวัฒน์  หอมแสง</td>
    						<td>13/06/2017 13:00</td>
    						<td>201</td>
    						<td>15/06/2017 12:00</td>
    						<td>Administrator</td>
    						<td class="col-sm-3">
    							<button class="btn btn-warning   btn-xs" style="width: 90px;">SERVICE</button>
    							<button class="btn btn-primary  btn-xs btn_checkout" style="width: 90px;" >CHECKOUT</button>
    							<button class="btn btn-info  btn-xs"  style="width: 90px;">VIEW</button>
    						</td>
    					</tr>
    					<tr>
    						<td>2</td>
    						<td>BK170613205001</td>
    						<td>นายอาสา  มาครับ</td>
    						<td>13/06/2017 13:00</td>
    						<td>205<br>206</td>
    						<td></td>
    						<td>Administrator</td>
    						<td >
    							<button class="btn btn-warning   btn-xs" style="width: 90px;">SERVICE</button>
    							<button class="btn btn-primary  btn-xs btn_checkout" style="width: 90px;" >CHECKOUT</button>
    							<button class="btn btn-info  btn-xs"  style="width: 90px;">VIEW</button>
    						</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>


    	</div>
    	<div class="div_modal"> <!-- show modal Bill --> </div>
    	<!-- Small modal -->
    	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

    	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    		<div class="modal-dialog modal-sm" role="document">
    			<div class="modal-content">
    				...
    			</div>
    		</div>
    	</div> -->
    	<!-- End Small modal -->
    	<!-- /.row -->
    	<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery-1.12.4.js" ></script> -->
    	<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/js/jquery.js" ></script> -->
<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/dataTables.bootstrap.min.js" ></script>
	<script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery.dataTables.min.js" ></script>  -->
	<!--  END Fair List -->
	<script type="text/javascript">

		$(function() {
	  	  // $('#fairlist').DataTable();
	  	  checkout();
	  	} );

		function checkout(){
			$('.btn_checkout').click(function(){
				load_page('<?php echo base_url()."checkin/Bill"; ?>','.:: Data Checkin::.','#');
			});
		}


		function load_page(loadUrl,texttitle,urlsend){
			var screenname= texttitle;
			var url = loadUrl;
			var n=0;
			$('.div_modal').html('');
			modal_form(n,screenname,urlsend);
			$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
			var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
			modal.on('show.bs.modal', function () {
				modalBody.load(url);
			}).modal({backdrop: 'static',keyboard: true});
			setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
		}

		function modal_form(n,screenname,url)
		{
			var div='';
			// div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
			div+='<!-- Modal -->';
			div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
			div+='<div class="modal-dialog" style="width:90%;">';
			div+='<div class="modal-content">';
			div+='<div class="modal-header bg-primary" style="color:#FFFFFF;">';
			div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			div+='<h4 class="modal-title">'+screenname+'</h4>';
			div+='</div>';
			div+='<div class="modal-body">';
			div+='</div>';
			div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
			// div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
			div+='<button type="reset" class="btn btn-modal " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
			div+='</div>';
			div+='</div><!-- /.modal-content -->';
			div+='</div><!-- /.modal-dialog -->';
			div+='</div><!-- /.modal -->';
			// div+='</form>';
			$('.div_modal').html(div);
		}

	</script>



