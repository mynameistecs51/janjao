    <!-- Page Name -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
    <div class="col-lg-12">
        <i style="font-size: 18px;">ROOMTYPE LIST</i>
        <span class="btn btn-success btn_add"  style="float: right;margin-top: -10px;">CREATE ROOM TYPE</span>
    </div> 
    <hr style="margin-top: 30px;">


    <!-- Page Content -->
    <div class="col-lg-12">
    	<!-- Page Features -->
            <div class="row text-center">  
                <div class="col-lg-12" align="right">
                    <div class="sh-right">
                        <form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>roomtype/search/">
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
    							<th style="text-align: center; ">ROOM TYPE DETAILS</th>
    							<th style="text-align: center;width:  150px;">PRICE SHORT</th> 
    							<th style="text-align: center;width:  150px;">PRICE DAY</th>
    							<th style="text-align: center;width:  150px;">PRICE MONTH</th>
    							<th style="text-align: center;width:  80px;">STATUS</th>
    							<th style="text-align: center;width:  100px;">#</th>
    						</tr>
    					</thead>
    					<tbody>
    						<?php $no = 1;?>
    						<?php foreach ($getRoomtypeAll as $rowRoomType): ?>
    							<tr>
    								<td><?php echo $no++; ?></td>
    								<td>
    									<ul>
    										<li><?php echo $rowRoomType['roomtypeCode']; ?> </li>
    										<li><?php echo $rowRoomType['bed']; ?> </li>
    									</ul>
    								</td>
    								<td align="right"><?php echo $rowRoomType['price_short']; ?></td> 
    								<td align="right"><?php echo $rowRoomType['price_day'] ?></td>
    								<td align="right"><?php echo $rowRoomType['price_month']; ?></td>
    								<td><?php echo $rowRoomType['status']; ?></td> 
    								<td >
    									<?php if ($rowRoomType['status'] == 'ON') {?>
    									<button class="btn btn-primary btn-xs btn_edit" id="<?php echo MD5($rowRoomType['roomtypeID']); ?>" title="edit" style='margin-left:5px;'>
    										<i class="fa fa-edit fa-2x"></i>
    									</button>
    									<button class="btn btn-warning btn-xs  btn_delete" id="<?php echo $rowRoomType['roomtypeID']; ?>"  style='margin-left:5px;'>
    										<i class="fa fa-trash-o fa-2x" title="deleteRoomtype"></i>
    									</button> 
    									<?php } else {?>
    									<button class="btn btn-danger btn-xs btn_edit" id="<?php echo MD5($rowRoomType['roomtypeID']); ?>" title="edit" style='margin-left:5px;'>
    										<i class="fa fa-edit fa-2x"></i>
    									</button>
    									<?php }?>
    								</td>
    							</tr>
    						<?php endforeach;?>
    					</tbody>
    				</table>
    			</div>
    		</div>
    		<div class="div_modal"> <!-- show modal Bill --> </div>
    		<!-- /.row -->
    		<!--  END Fair List -->
    		<script type="text/javascript">
    			$(function() {
    			 // $('#fairlist').DataTable();
    			 roomAdd();
    			 roomEdit();
    			 roomDelete();
    			});

    			function roomAdd() {
    				$('.btn_add').click(function(){
    					load_page('<?php echo base_url() . "roomtype/RoomtypeAdd/"; ?>','.:: Data ROOM TYPE ::.','<?php echo base_url() . "roomtype/saveAdd/"; ?>');
    				});
    			}

    			function roomEdit() {
    				$('.btn_edit').click(function(){ 
    					load_page('<?php echo base_url() . "roomtype/RoomtypeEdit/"; ?>'+$(this).attr('id'),'.:: EDIT ROOM TYPE ::.','<?php echo base_url()."roomtype/saveEdit/"; ?>');
    				});
    			}

    			function roomDelete() {
    				$('.btn_delete').click(function(){
    					var roomtypeID = $(this).attr('id');
    					var cfm = confirm("ต้องการลบประเภทห้องพัก !!");
    					if(cfm == true){
    						$.ajax({
    							url: '<?php echo base_url()."roomtype/deleteRoomtype/";?>',
    							type: 'POST',
                                dataType: 'json',
    							data: {roomtypeID: roomtypeID },
    							success: function(rs)
    							{
    								alert("ลบข้อมูลเสร็จเรียบร้อย.");
    								window.location.reload();
    							},
    							error:function(err){
    								alert("เกิดข้อผิดพลาดในการลบข้อมูล");
    								window.location.reload();
    							}
						    });
    					}else{
    						return false;
    					}
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



