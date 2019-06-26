    <!-- Page Name -->

    <div class="col-lg-6">
    	<i style="font-size: 18px;">SERVICE LIST</i>
    </div>
    <hr class="col-lg-12" style="margin-top: 6px;">


    <!-- Page Content -->
    <div class="col-lg-12">
    	<!-- Page Features -->
    	<div class="row text-center" style="margin-top: 10px;">
    		<div class="col-lg-12" align="left">
    			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    				<thead style="background:#BDBDBD;font-size: 12px; ">
    					<tr>
    						<th width="60">No.</th>
    						<th width="150">UserName</th>
    						<th width="150">Email</th>
    						<th>First Name - Last Name</th>
    						<th width="200">User Group</th>
    						<th width="120">#</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php if(count($getlist)>0){  ?>
    						<?php $n=1; foreach ($getlist as $rs) { ?>
    							<tr id="row<?php echo $rs['userID']; ?>">
    								<td><?php echo $n; ?></td>
    								<td><?php echo $rs['username']; ?></td>
    								<td><?php echo $rs['useremail']; ?></td>
    								<td><?php echo $rs['fullname']; ?></td>
    								<td><?php echo $rs['usergroupName']; ?></td>
    								<td align="center">
    									<button class="btn btn-info btn-xs btn_edit" id="<?php echo MD5($rs['userID']); ?>" title="edit" style='margin-left:5px;'>
    										<i class="fa fa-id-card-o fa-2x" aria-hidden="true"></i>
    									</button>

    									<button class="btn btn-warning btn-xs btn_edit_passwd" id="<?php echo MD5($rs['userID']); ?>" title="edit password" style='margin-left:5px;'>
    										<i class="fa fa-unlock fa-2x" aria-hidden="true"></i>
    									</button>
    								</td>
    							</tr>
    							<?php $n++; }  ?>
    						<?php }else{ ?>
    							<tr>
    								<td colspan="8">No DATA !</td>
    							</tr>

    						<?php } ?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="div_modal"> <!-- show modal Bill --> </div>
    		<!-- /.row -->

    		<script type="text/javascript">
    			$( document ).ready(function() {
    				userEdit();
    				userEditPwd();
    			} );

    			function userEdit() {
    				$('.btn_edit').click(function(){
    					load_page('<?php echo base_url(); ?>index.php/User/edit/'+$(this).attr('id'),'.:: EDIT USER ::.','<?php echo base_url()."profile/saveUpdate"; ?>');
    				});
    			}

    			function userEditPwd() {
    				$('.btn_edit_passwd').click(function(){
    					load_page('<?php echo base_url(); ?>index.php/User/edit_passwd/'+$(this).attr('id'),'.:: EDIT PASSWORD ::.','<?php echo base_url()."profile/saveUpdatePwd"; ?>');
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
    				div+='<button type="submit" id="save" class="btn btn-modal btn-success"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
    				div+='<button type="reset" class="btn btn-modal btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
    				div+='</div>';
    				div+='</div><!-- /.modal-content -->';
    				div+='</div><!-- /.modal-dialog -->';
    				div+='</div><!-- /.modal -->';
    				div+='</form>';
    				$('.div_modal').html(div);
    			}
    		</script>



