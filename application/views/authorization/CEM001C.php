<style>
td.border{
    border-bottom-style: solid;
    border-width: 1px;
    border-color: #D8D8D8;
}
</style>
<script type="text/javascript"> 
pic1 = new Image(16, 16); 
pic1.src = "<?php echo base_url(); ?>assets/images/loader.gif";
$(document).ready(function(){

check_box_all();
cb_mmnu_lv1();
cb_mmnu_lv2();
//cb_mmnu_lv3();

$("#username").change(function() { 
var usr = $("#username").val();
if(usr.length >= 4)
{
$("#status").html('<img src="<?php echo base_url(); ?>images/loader.gif" align="absmiddle">&nbsp;Checking availability...');
    $.ajax({  
    type: "POST",  
    url: "check.php",  
    data: "username="+ usr,  
    success: function(msg){  
  $("#status").ajaxComplete(function(event, request, settings){ 
	if(msg == 'OK')
	{ 
    $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<img src="tick.gif" align="absmiddle">');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   });
 } 
  }); 
}
else
	{
  	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
  	$("#username").removeClass('object_ok'); // if necessary
  	$("#username").addClass("object_error");
	}
});
/***********CLICK SELECT CHECKBOX ALL *************/
function check_box_all(){
        $('input[id="cb_all"]').bind('click', function(){
            var cb_status = $(this).is(':checked');
            $('input[type="checkbox"]').prop('checked',cb_status);
        });
      }

function cb_mmnu_lv1()
{
  $('input[class="cb1lv"]').bind('click', function(){
    var cb_id = $(this).attr("id");
    var cb_status = $(this).is(':checked');
    $('input[type="checkbox"].pr'+cb_id).prop('checked',cb_status); 
  });
}

function cb_mmnu_lv2()
{ 
    $('input[type="checkbox"].cb2lv').bind('click', function(){
      var cb_id = $(this).attr("id");
      var cb_idarr = cb_id.split('_',2);
      var cb_idmmnu = cb_idarr[1]; 
      var cb_status = $(this).is(':checked');  
      $('input[type="checkbox"].'+cb_id).prop('checked',cb_status); 
      if($('input[type="checkbox"].cb2lv.pr'+cb_idmmnu+':checked').length>0){
        $('input[type="checkbox"]#'+cb_idmmnu).prop('checked',true);
      }else{
        $('input[type="checkbox"]#'+cb_idmmnu).prop('checked',false);
      }  
    });

    $('input[type="checkbox"].sub').bind('click', function(){       
      var cb_id = $(this).attr("id"); 
      var cb_idarr = cb_id.split('_',4);
      var id = cb_idarr[1]+'_'+cb_idarr[2]+'_'+cb_idarr[3];   
      if($('input[type="checkbox"].sub.'+id+':checked').length>0){
        $('input[type="checkbox"]#'+id).prop('checked',true);
      }else{
        $('input[type="checkbox"]#'+id).prop('checked',false);
      }   
    });
}

});

function validationConfirm()
{
  if(confirm("ยืนยันการบันทึกข้อมูล !"))
  {
    return true;
  }
  else{
    return false;
  }
}
</script>  

<div class="form_input"> 
<div class="container">  
  <div class="col-lg-1"> 
  </div>
  <div class="col-lg-10"> 
  <form action="<?php echo base_url(); ?>authorization/select" method="post" name="form1">
    เลือกกลุ่มผู้ใช้งาน :
    <select id="usergroupID" name="usergroupID" class="form-control select" onchange="this.form.submit()" >
    <option value="">----เลือก----</option>
    <?php foreach ($listusergroup as $rows)
      { 
        if($rows->usergroupID==$select){
          echo "<option value='".$rows->usergroupID."' selected>".$rows->usergroupName."</option>";
        }else {
          echo "<option value='".$rows->usergroupID."' >".$rows->usergroupName."</option>";
        }
     }?>
    </select>  
  </form>
  </div>
</div>
  <?php 
     if($select==0)
     {
           echo "<div style='display: none;'>";
     }else
     {
           echo "<div >";
     }
  ?>

<form action="<?php echo base_url(); ?>authorization/update" method="post" name="form2" >
<input type="hidden"  class="txt_disabled" name="usergroupID" id="usergroupID" readonly="true" value="<?php echo $select ;  ?>" > 
<input type="hidden"  class="txt_disabled" name="userID" id="userID" readonly="true" value="<?php echo $userID;  ?>" >
<div style="font-size:12px; margin-top:20px; text-align:left; ">
<div style="font-size:12px; margin-left:17%; margin-top:-10px; margin-bottom:15px; text-align:left; font-weight:bold;">
<input type="checkbox" name="cb_all" id="cb_all" class="cb_all"  > เลือก/ไม่เลือก ทั้งหมด
</div>
    <?php  
         foreach ($lavle1 as $row1)
          {
            if ($row1->status=='ON')
            { 
              $check= "checked='checked'";
            }
            else
            {
              $check= "";
            }
              echo  "<br><div style='margin-left:20%; margin-top:-10px;'><input type='checkbox' id='".$row1->menuID."' class='cb1lv'  ".$check."   name='status[".$row1->menuConfigID."]'  value='1'> ".$row1->MenuName." </div>"; 
              echo "<input type='hidden' name='menuConfigID[]' value='".$row1->menuConfigID."' >";
              echo  "<table  style='margin-left:23%; color:#0000FF;'><tr>";
               foreach ($lavle2 as $rs)
              {   
                
                if ($rs->MenuParent==$row1->menuID)
                {  
                  $set_id=$rs->menuID."_".$rs->MenuParent."_".$rs->order_no;

                  if ($rs->status=='ON'){$ck_status= "checked='checked'";}else{$ck_status= "";} 
                  if ($rs->canView=='ON'){$ck_canView= "checked='checked'";}else{$ck_canView= "";} 
                  if ($rs->canAdd=='ON'){$ck_canAdd= "checked='checked'";}else{$ck_canAdd= "";} 
                  if ($rs->canEdit=='ON'){$ck_canEdit= "checked='checked'";}else{$ck_canEdit= "";} 
                  if ($rs->canPrint=='ON'){$ck_canPrint= "checked='checked'";}else{$ck_canPrint= "";} 
                  if ($rs->canApprove=='ON'){$ck_canApprove= "checked='checked'";}else{$ck_canApprove= "";} 
                    $lv2  ="<tr>"; 
                    $lv2 .="<td width='200px;' ><input type='hidden' name='menuConfigID[]' value='".$rs->menuConfigID."' >";
                    $lv2 .="<input type='checkbox' id='".$set_id."' class='cb2lv pr".$row1->menuID."' ".$ck_status."  name='status[".$rs->menuConfigID."]'  value='1'> ".$rs->MenuName."</td>";
                    $lv2 .="</td>";   
                    $lv2 .="</tr> "; 
                    echo  $lv2; 
                }  
             } 
             echo "</table>"; 
          }
          ?>
<div style="font-size:12px; margin-top:30px; margin-left:17%;  text-align:left; "> 
<button type="submit" id="save" class="btn btn-modal" onclick="return validationConfirm()"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>
<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ค่าเริ่มต้น</span></button>
</form>
</div>
</div>
</div>


<div class="col-lg-12">
  <hr style="margin-top: 40px;margin-left: -15px; margin-right: -15px;">
</div> 