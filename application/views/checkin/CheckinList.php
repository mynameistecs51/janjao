<!-- Page Name -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> -->
<div class="col-lg-12">
	<i style="font-size: 18px;">CHECKIN LIST</i>
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
					<th style="text-align: center;">NAME </th>
					<th style="text-align: center;width:  250px;">ROOM</th>
					<th style="text-align: center;width:  140px;">BOOKED DATE</th>
					<th style="text-align: center;width:  140px;">CHECKIN DATE</th>
                    <th style="text-align: center;width:  140px;">CHECKOUT DATE</th>
					<th style="text-align: center;width:  80px;"> STATUS</th>
					<th style="text-align: center;width:  230px;">#</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
                <?php if(count($getCheckin)>0) { ?>
				<?php foreach ($getCheckin as $key => $rowCheckin) :?>
					<?php $numRoom = count($rowCheckin['selectRoom']); ?>
					<tr id="row<?php echo $rowCheckin['bookedID']; ?>">
						<td><?php echo $i++; ?></td>
						<td><?php echo $rowCheckin['bookedCode'] ?></td>
						<td><?php echo $rowCheckin['firstName']." ".$rowCheckin['lastName']; ?></td>
						<td >
								<?php $color = $rowCheckin['status']=='CHECKIN' ? 'danger':'warning';
								for($i=0;$i < $numRoom; $i++)
								{ 
									echo "<button class='col-lg-3 btn-".$color."' style='margin-left:5px;'>",$rowCheckin['selectRoom'][$i]['roomID']."</button> ";
								}
								?>
							</td>
							<td><?php echo $rowCheckin['bookedDate']; ?></td>
							<td><?php echo $rowCheckin['status']=='CHECKIN' ? $rowCheckin['checkinDate']:'' ; ?></td>
                            <td><?php echo $rowCheckin['status']=='CHECKIN' ? $rowCheckin['checkoutDate']:'' ; ?></td>
							<td><?php echo $rowCheckin['status']; ?></td>
							<td >
                            <?php if($rowCheckin['status']=='CHECKIN'){ ?>
								<button class="btn btn-primary btn-xs btn_edit" id="<?php echo MD5($rowCheckin['bookedID']); ?>" title="edit" style='margin-left:5px;'>
									<i class="fa fa-edit fa-2x"></i>
								</button>
								<button class="btn btn-warning btn-xs btn_addservice" id="<?php echo MD5($rowCheckin['bookedID']); ?>" title="Add Service" style='margin-left:5px;'>
									<i class="fa fa-cutlery fa-2x" title="Add Service"></i>
								</button>
                                <button class="btn btn-success btn-xs btn_checkout" id="<?php echo MD5($rowCheckin['bookedID']); ?>" title="Checkout" style='margin-left:5px;'>
                                    <i class="fa fa-sign-out fa-2x" title="Checkout"></i>
                                </button>
								<button class="btn btn-info btn-xs btn_print" id="<?php echo MD5($rowCheckin['bookedID']); ?>" title="Print" style='margin-left:5px;'>
									<i class="fa fa-print fa-2x" title="Print"></i>
								</button>
                                <button class="btn btn-danger btn-xs btn_cancel" id="<?php echo $rowCheckin['bookedID']; ?>" title="Cancle" style='margin-left:5px;'>
                                    <i class="fa fa-trash-o fa-2x" title="Cancle"></i>
                                </button>
                            <?php }else{ ?> 
                                <button class="btn btn-danger btn-xs btn_checkin" id="<?php echo MD5($rowCheckin['bookedID']); ?>" title="edit" style='margin-left:5px;'>
                                    <i class="fa fa-edit fa-2x"></i>
                                </button>
                                <button class="btn btn-danger btn-xs btn_cancel" id="<?php echo $rowCheckin['bookedID']; ?>" title="Add Service" style='margin-left:5px;'>
                                    <i class="fa fa-trash-o fa-2x" title="Cancle"></i>
                                </button>
                            <?php } ?>
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
	<script type="text/javascript">
		$(function() { 
    	    $('.btn_edit').click(function(){
                var id = $(this).attr('id');
                load_page('<?php echo base_url()."checkin/checkinformedit/"; ?>'+id+'','.:: Data Checkin ::.','<?php echo base_url()."checkin/saveUpdate/"; ?>');
            });
            $('.btn_checkin').click(function(){
                var id = $(this).attr('id');
                load_page('<?php echo base_url()."checkin/checkinformcheckin/"; ?>'+id+'','.:: Data Checkin ::.','<?php echo base_url()."checkin/saveCheckin/"; ?>');
            });
            $('.btn_addservice').click(function(){
                var id = $(this).attr('id');
                load_page_sv('<?php echo base_url()."checkin/checkinformService/"; ?>'+id+'','.:: Data Service ::.','<?php echo base_url()."checkin/saveService/"; ?>');
            });
            $('.btn_checkout').click(function(){
                var id = $(this).attr('id');
                load_page_sv('<?php echo base_url()."checkin/checkoutform/"; ?>'+id+'','.:: Data Service ::.','<?php echo base_url()."checkin/saveCheckout/"; ?>');
            });
            $('.btn_cancel').click(function(){
                var cfm = confirm("ยืนยันยกเลิกการเช่าห้องพัก คุณไม่สามารถย้อนกลับมาใช้ข้อมูลได้ !");
                if(cfm == true){
                    var id = $(this).attr('id');   
                    $.ajax({
                        url: '<?php echo base_url().$this->ctl."/saveCancle/";?>',
                        data:{key:id},
                        type: 'POST',
                        dataType: 'json',
                        success:function(res){
                             $('tbody tr#row'+id).remove();
                        },
                        error:function(res){
                            alert("พบข้อผิดพลาด !"); 
                        }
                    }); 
                }else{
                    return false;
                }
            });
    	});

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

        function load_page_sv(loadUrl,texttitle,urlsend){
            var screenname= texttitle;
            var url = loadUrl;
            var n=0;
            $('.div_modal').html('');
            modal_form_service(n,screenname,urlsend);
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
			div+='<button type="submit" id="save" class="btn btn-success"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
			div+='<button type="reset" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
			div+='</div>';
			div+='</div><!-- /.modal-content -->';
			div+='</div><!-- /.modal-dialog -->';
			div+='</div><!-- /.modal -->';
			div+='</form>';
			$('.div_modal').html(div);
		}

        function modal_form_service(n,screenname,url)
        {
            var div='';
            div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return confirmvalid();">';
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
            div+='<button type="submit" id="save" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"> บันทึก</span></button>'; 
            div+='<button type="reset" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
            div+='</div>';
            div+='</div><!-- /.modal-content -->';
            div+='</div><!-- /.modal-dialog -->';
            div+='</div><!-- /.modal -->';
            div+='</form>';
            $('.div_modal').html(div);
        }
	</script>



