    <!-- Page Name -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> 
    <div class="col-lg-12">
        <i style="font-size: 18px;">USER GROUP LIST</i>
        <span class="btn btn-success btn_create"  style="float: right;margin-top: -10px;">CREATE USER GROUP</span>
    </div> 
    <hr style="margin-top: 30px;">

     
    <!-- Page Content -->
    <div class="col-lg-12">  
        <!-- Page Features -->
        <div class="row text-center">  
            <div class="col-lg-12" align="right">
                <div class="sh-right">
                	<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>usergroup/search/">
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
                        <tr>
                            <th width="60">No.</th> 
                            <th width="300">USER GROUP Name</th>
                            <th >DESCRIPTION</th> 
                            <th width="120">#</th>
                        </tr>
                    </thead> 
                    <tbody>
                    <?php if(count($getlist)>0){  ?>
                    <?php $n=1; foreach ($getlist as $rs) { ?>
                    		<tr id="row<?php echo $rs['usergroupID']; ?>">
	                            <td><?php echo $n; ?></td>
                                <td><?php echo $rs['usergroupName']; ?></td>
	                            <td><?php echo $rs['usergroupDesc']; ?></td> 
	                            <td align="center">  
                                    <button class="btn btn-primary btn-xs btn_edit" id="<?php echo MD5($rs['usergroupID']); ?>" title="edit" style='margin-left:5px;'>
                                        <i class="fa fa-edit fa-2x"></i>
                                    </button>
                                    <button class="btn btn-danger btn-xs btn_cancel" id="<?php echo $rs['usergroupID']; ?>" title="Cancle" style='margin-left:5px;'>
                                        <i class="fa fa-trash-o fa-2x" title="Cancle"></i>
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
        <!-- /.row -->

<div class="div_modal"> <!-- show modal Bill --> </div>
<!--  END Fair List -->
<script type="text/javascript">
	$(function() { 
	    $('.btn_create').click(function(){ 
                load_page('<?php echo base_url()."usergroup/create/"; ?>','.:: CREATE USER GROUP ::.','<?php echo base_url()."usergroup/saveData/"; ?>');
        });
        $('.btn_edit').click(function(){
                var id = $(this).attr('id');
                load_page('<?php echo base_url()."usergroup/edit/"; ?>'+id,'.:: EDIT USER GROUP ::.','<?php echo base_url()."usergroup/saveUpdate/"; ?>');
        });
        $('.btn_cancel').click(function(){
            var cfm = confirm("ยืนยันการลบรายการ !");
            if(cfm == true){
                var id = $(this).attr('id');
                $.ajax({
                    url: '<?php echo base_url()."usergroup/saveCancle/";?>',
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

    function modal_form(n,screenname,url)
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
        div+='<button type="submit" id="save" class="btn btn-success"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
        div+='<button type="reset" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
        div+='</div>';
        div+='</div><!-- /.modal-content -->';
        div+='</div><!-- /.modal-dialog -->';
        div+='</div><!-- /.modal -->';
        div+='</form>';
        $('.div_modal').html(div);
    }
</script>



