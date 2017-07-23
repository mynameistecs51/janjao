    <!-- Page Name -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
    <div class="col-lg-6">
    	<i style="font-size: 18px;">SERVICE LIST</i>
    </div>
    <div class="sh-right col-lg-6">
    	<button  type="submit" class="btn btn-success btn_add pull-right" style="float: left;" >
    		<span class="fa fa-plus"> </span> ADD ROOM
    	</button>
    </div>
    <hr class="col-lg-12" style="margin-top: 6px;">


    <!-- Page Content -->
    <div class="col-lg-12">
    	<!-- Page Features -->
    	<div class="row text-center">
    		<div class="col-sm-12" align="right">
    			<div class="sh-right  pull-right  col-sm-6">
    				<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>room/search/">
    					<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
    					<input type="text" class="form-control"  id="keyword" style="width: 250px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $keyword; ?>">
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="row text-center" style="margin-top: 10px;">
    		<div class="col-lg-12" align="left">
    			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    				<thead style="background:#BDBDBD;font-size: 12px; ">
    					<tr >
    						<th  style="text-align: center;width: 40px;">No.</th>
    						<th style="text-align: center;width:  90px;">ROOM NUMBER</th>
    						<th style="text-align: center;width:  50px;">ROOM TYPE</th>
    						<th style="text-align: center;width:  70px;">ROOM FLOOR</th>
    						<th style="text-align: center;width:  80px;">COMMENT</th>
    						<th style="text-align: center;width:  50px;">TRANSACTION</th>
    						<th style="text-align: center;width:  80px;">STATUS</th>
    						<th style="text-align: center;width:  60px;">#</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php $no= 1; ?>
    					<?php foreach ($getRoomAll as $rowRoom): ?>
    						<tr>
    							<td><?php echo $no++; ?></td>
    							<td><?php echo "ROOM ".$rowRoom['roomCODE']; ?></td>
    							<td>
    								<?php echo $rowRoom['roomtypeCode'].$bed = ($rowRoom['bed'] == "SINGLE")? " - เตียงเดี่ยว" : " - เตียงคู่"; ?>
    							</td>
    							<td><?php echo "FLOOR ".$rowRoom['floor']; ?></td>
    							<td></td>
    							<td>
    								<?php  echo $rowRoom['transaction']; ?>
    							</td>
    							<td>
    								<?php echo $rowRoom['status']; ?>
    							</td>
    							<td>
    								<button class="btn btn-primary btn-xs btn_edit" id="<?php echo MD5($rowRoom['roomID']); ?>" title="edit" style='margin-left:5px;'>
    									<i class="fa fa-edit fa-2x"></i>
    								</button>
    								<button class="btn btn-info btn-xs btn_view" id="<?php echo MD5($rowRoom['roomID']); ?>" title="Cancle" style='margin-left:5px;'>
    									<i class="fa fa-info-circle fa-2x" title="Info"></i>
    								</button>
    							</td>
    						</tr>
    					<?php endforeach; ?>
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="div_modal"> <!-- show modal Bill --> </div>
    	<!-- /.row -->
    	<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery-1.12.4.js" ></script> -->
    	<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/dataTables.bootstrap.min.js" ></script> -->
    	<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery.dataTables.min.js" ></script> -->
    	<!--  END Fair List -->
    	<script type="text/javascript">
    		$(function() {
	    // $('#fairlist').DataTable();
	    roomAdd();
	    roomEdit();
	    roomView();
	  } );

    		function roomAdd() {
    			$('.btn_add').click(function(){
    				load_page('<?php echo base_url()."index.php/Room/RoomFormAdd/"; ?>','.:: ADD ROOM ::.','<?php echo base_url()."room/saveAdd/" ?>');
    			});
    		}

    		function roomEdit() {
    			$('.btn_edit').click(function(){
    				load_page('<?php echo base_url()."index.php/room/roomEdit/"; ?>'+$(this).attr('id'),'.:: EDIT ROOM ::.','<?php echo base_url()."room/saveEdit"; ?>');
    			});
    		}

    		function roomView() {
    			$('.btn_view').click(function(){
    				load_page('<?php echo base_url()."index.php/room/roomView/"; ?>'+$(this).attr('id'),'.:: INFO ROOM ::.','#');
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
    			div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
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
    			div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
    			div+='<button type="reset" class="btn btn-modal " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
    			div+='</div>';
    			div+='</div><!-- /.modal-content -->';
    			div+='</div><!-- /.modal-dialog -->';
    			div+='</div><!-- /.modal -->';
    			div+='</form>';
    			$('.div_modal').html(div);
    		}
    	</script>



