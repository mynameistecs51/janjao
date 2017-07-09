<input  type="hidden" name="usergroupID" id="usergroupID" value="" > 
<div class="row form_input" style="text-align:left; margin-bottom:20px">
    <div class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-2">User Group Name<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
                <input  type="text" class="form-control" name="usergroupName" id="usergroupName" autocomplete="off" value="" >
            </div> 
            <div class="col-sm-2" id="error_usergroupName"></div> 
        </div> 
        <div class="form-group">
          <label class="control-label col-sm-2">Description<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8"> 
                <textarea type='text' class="form-control" name="usergroupDesc" rows="3"></textarea>
            </div> 
            <div class="col-sm-2" id="error_usergroupDescl"></div>
        </div>   
    </div>
</div>
<script type="text/javascript">   
     
    $('#usergroupName').on('change',function(){
        var val = $(this).val(); 
        var usergroupID = $('#usergroupID').val(); 
        if(val != ''){
            $.ajax({
                url: '<?php echo base_url()?>usergroup/checkdata/',
                type: 'POST',
                dataType: 'json',
                data: { txt: val,field:'usergroupName',id:'0'},
                success: function(rs)
                {     
                  if(rs.length>0){ 
                    $('#error_usergroupName').html("<b style='color:#FF0004;'> "+val+" </b><b style='color:#ff0000'> Already in use.</b>");
                    $('#usergroupName').val(""); 
                    return false;
                  }else{
                    
                  }
                },
                error: function()
                {
                  alert("Not Found !");
                }
            });  
        }else{
            $('#error_usergroupName').html("<b style='color:#FF0004;'> Please Key a-z, A-Z, 0-9, @ - _ .</b>"); 
            $('#usergroupName').val('');
        }
    }); 

     
</script> 
<!--  END Fair List --> 

<script type="text/javascript">  
function confirmvalid()
{ 
    if($('#usergroupName').val()==''){
        alert("Please input User Group Name ");
        $('#usergroupName').focus();
        return false;  
    }else if($('#usergroupDesc').val()==''){
        alert("Please Input Description ");
        $('#usergroupDesc').focus();
        return false;

    }else{ 

        return true;
    } 
    
}

</script> 


