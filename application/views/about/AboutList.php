<div class="col-lg-6">
	<i style="font-size: 18px;">DETAIL COMPANY</i>
</div>
<div class="sh-right col-lg-6">
	<button  type="submit" class="btn btn-success btn_add pull-right" style="float: left;" >
		<span class="fa fa-plus"> </span> ADD DETAIL
	</button>
</div>
<hr class="col-lg-12" style="margin-top: 6px;">


<!-- Page Content -->
<div class="col-lg-12">
	<!-- Page Features -->
	<!-- <div class="row text-center">
		<div class="col-sm-12" align="right">
			<div class="sh-right  pull-right  col-sm-6">
				<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>about/search/">
					<button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
					<input type="text" class="form-control"  id="keyword" style="width: 250px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $keyword; ?>">
				</form>
			</div>
		</div>
	</div> -->
	<div class="row text-center" style="margin-top: 10px;">
		<div class="col-lg-12" align="left">
			<table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
				<thead style="background:#BDBDBD;font-size: 12px; ">
					<tr>
						<th style="text-align: center;" class="col-sm-1">No.</th>
						<th style="text-align: center;width: 90px;">Address</th>
						<th style="text-align: center;width: 50px;">Mobile</th>
						<th style="text-align: center;width: 70px;">Vat number</th>
						<th style="text-align: center;width: 70px;">Comment</th>
						<th style="text-align: center;width: 60px;">#</th>
					</tr>
				</thead>
				<tbody>
					<?php  $num = 1;?>
					<?php foreach ($aboutList as $rowAbout): ?>
						<tr>
							<td class="col-sm-1 text-center">
								<?php echo $num++; ?>
							</td>
							<td>
								<?php echo $rowAbout['address']; ?>
							</td>
							<td>
								<?php echo "โทรศัพท์ ".$rowAbout['mobile']; ?>
							</td>
							<td>
								<?php echo $rowAbout['vatNumber']; ?>
							</td>
							<td>
								<?php echo $rowAbout['comment']; ?>
							</td>
							<td class="text-center">
								<button class="btn btn-warning btn-xs btn_edit" id="<?php echo trim(MD5($rowAbout['companyID'])); ?>" title="edit" style='margin-left:5px;'>
									<i class="fa fa-edit fa-2x"></i>
								</button>
								<!-- <button class="btn btn-info btn-xs btn_view" id="<?php echo MD5($rowAbout['companyID']); ?>" title="Cancle" style='margin-left:5px;'>
									<i class="fa fa-info-circle fa-2x" title="Info"></i>
								</button> -->
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="div_modal"> <!-- show modal Bill --> </div>
</div>
<!-- /.row -->

<!--  END Fair List -->
<script type="text/javascript">
	$(function() {
		aboutAdd();
		aboutEdit();
		// aboutView();
	});

	function aboutAdd() {
		$('.btn_add').click(function(){
			load_page('<?php echo base_url()."index.php/about/aboutFormAdd/"; ?>','.:: ADD About ::.','<?php echo base_url()."about/saveAdd/" ?>');
		});
	}

	function aboutEdit() {
		$('.btn_edit').click(function(){
			load_page('<?php echo base_url()."index.php/about/aboutFormEdit/"; ?>'+$(this).attr('id'),'.:: EDIT about ::.','<?php echo base_url()."about/saveEdit"; ?>');
		});
	}

	// function aboutView() {
	// 	$('.btn_view').click(function(){
	// 		load_page('<?php echo base_url()."index.php/about/aboutView/"; ?>'+$(this).attr('id'),'.:: INFO about ::.','#');
	// 	});
	// }


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