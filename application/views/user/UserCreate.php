<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap-select.min.css">
<style type="text/css">
    select { border-radius:4px; }
</style> 
<div class="col-lg-12" >
    <i style="font-size: 18px;"> USER CREATE </i> 
</div>
<hr style="margin-top: 30px;">
<div class="container"> 
	<form name="formCreatefair"  id="formCreatefair" class="form-horizontal" method="POST" action="<?php echo base_url()?>user/saveData" enctype="multipart/form-data" onSubmit="JavaScript:return confirmvalid();"> 
    <input  type="hidden" name="userID" id="userID" value="" >
        <div class="row text-center" style="margin-top: 10px;"> 
            <div class="col-lg-12" align="left"> 
                <div class="row">   
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">UserName<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="username" id="username" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_username"></div> 
                        </div> 
                    </div> 
                	<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Email<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8">
                                <input  type="email" class="form-control" name="useremail" id="useremail" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_useremail"></div>
                        </div> 
                    </div> 
                    <div class="col-lg-12"> 
                        <div class="form-group">
                            <label for="select" class="control-label col-xs-2">Title <span style="color:#FF0004;">*</span></label>
                            <div class="col-xs-8" id="coluserTitle">
                                <select id="userTitle" class="form-control selectpicker" name="userTitle" title="Please Selected" >
                                    <option value="" >--Selected--</option>
                                    <option value="MR" >MR.</option>
                                    <option value="MS" >MS.</option>
                                    <option value="MRS">MRS.</option>
                                </select>
                            </div> 
                            <div class="col-xs-2" id="error_title"></div>
                        </div>
                    </div>  
                    <div class="col-lg-12"> 
                        <div class="form-group">
                            <label class="control-label col-sm-2" >Name<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-3">
                                <input  id="userFname" type="text" class="form-control"  name="userFname" placeholder="First Name"  value="" >
                            </div>
                            <div class="col-sm-2"> 
                                <input  id="userMname" type="text"  class="form-control"  name="userMname" placeholder="Middle Name" value="" >
                            </div>
                            <div class="col-sm-3">
                                <input  id="userLname" type="text" class="form-control"  name="userLname"  placeholder="Last Name" value="" >
                            </div>
                            <div class="col-sm-2" id="errorName"></div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">ID Card No :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="userIdcard" id="userIdcard" autocomplete="off" placeholder="ID Card / Passport No" value="" >
                            </div>
                            <div class="col-sm-2" id="error_userIdcard"></div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Country <span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8"> 
                                <select id="countryID" class="form-control selectpicker" name="countryID" data-live-search="true" style="height: 60px;">
                                    <option value="212" data-tokens="THAILAND" selected>THAILAND</option>   
                                    <?php
                                        foreach ($countryList as $ctrs) {
                                            echo '<option value="'.$ctrs["countryID"].'" data-tokens="'.$ctrs["countryName"].'">'.$ctrs["countryName"].'</option> ';
                                        }
                                    ?> 
                                </select>
                            </div>
                            <div class="col-sm-2" id="error_countryID"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Company Name<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="companyName" id="companyName" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_companyName"></div> 
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Position<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="position" id="position" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_position"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Address :</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" row="3" name="address" id="address" autocomplete="off" ></textarea>
                            </div> 
                            <div class="col-sm-2" id="error_address"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">City :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="city" id="city" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_city"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">State :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="state" id="state" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_state"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Postcode :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="postcode" id="postcode" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_postcode"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Telephone :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="telephone" id="telephone" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_telephone"></div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">Mobile<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8">
                                <input  type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" value="" >
                            </div> 
                            <div class="col-sm-2" id="error_mobile"></div>
                        </div> 
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2">User Group<span style="color:#FF0004;">*</span> :</label>
                            <div class="col-sm-8"> 
                                <select id="usergroupID" class="form-control selectpicker" name="usergroupID"  style="height: 60px;">
                                    <option value="">--select--</option>
                                    <?php
                                        foreach ($usergroup as $usg) {
                                            echo '<option value="'.$usg["usergroupID"].'" >'.$usg["usergroupName"].'</option> ';
                                        }
                                    ?> 
                                </select>
                            </div> 
                            <div class="col-sm-2" id="error_usergroupID"></div>
                        </div> 
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label col-sm-2"></label>
                            <div class="col-sm-8"> 
                                <button type="submit" class="btn btn-primary btn-md"> SAVE </button>
                                <a href="<?php echo base_url()?>user" class="btn btn-danger btn-md" style="margin-left:10px;">BACK</a> 
                            </div>
                        </div>
                    </div>   
                </div>
             </div>
        </div> 
    </form>
<script type="text/javascript" src="<?php echo base_url()?>assets/libs/ajax/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/fileupload/js/bootstrap-filestyle.js"></script> 
<link rel="stylesheet" href="<?php echo base_url()?>assets/libs/ui/jquery-ui.css">
<script src="<?php echo base_url()?>assets/libs/ui/jquery-ui.js"></script>

<script type="text/javascript">
	 
	 
    $('#username').on('change',function(){
        var val = $(this).val(); 
        var userID = $('#userID').val(); 
        if(isEnglishchar(val)==true && val != ''){
            $.ajax({
                url: '<?=base_url()?>user/checkdata/',
                type: 'POST',
                dataType: 'json',
                data: { txt: val,field:'username',id:'0'},
                success: function(rs)
                {     
                  if(rs.length>0){ 
                    $('#error_username').html("<b style='color:#FF0004;'> "+val+" </b><b style='color:#ff0000'> Already in use.</b>");
                    $('#username').val(""); 
                    return false;
                  }else{
                    $('#error_username').html('<i style="color:#318407;font-size:28px;" class="glyphicon glyphicon-ok-sign"></i>');
                  }
                },
                error: function()
                {
                  alert("Not Found !");
                }
            });  
        }else{
            $('#error_username').html("<b style='color:#FF0004;'> Please Key a-z, A-Z, 0-9, @ - _ .</b>"); 
            $('#username').val('');
        }
    }); 

    $('#useremail').on('change',function(){
        var email = $(this).val(); 
        var userID = $('#userID').val(); 
        if(isEnglishchar(email)==true && email != '')
        {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {  
                $('#error_useremail').html("<b style='color:#FF0004;'> Please Check Email Format</b>"); 
                $('#useremail').val("");
            }else{
                $.ajax({
                    url: '<?=base_url()?>user/checkdata/',
                    type: 'POST',
                    dataType: 'json',
                    data: { txt: email,field:'useremail',id:'0'},
                    success: function(rs)
                    {
                      if(rs.length>0){ 
                        $('#error_useremail').html("<b style='color:#FF0004;'> "+email+" </b><b style='color:#ff0000'> Already in use.</b>");
                        $('#useremail').val(""); 
                        return false;
                      }else{
                        $('#error_useremail').html('<i style="color:#318407;font-size:28px;" class="glyphicon glyphicon-ok-sign"></i>');
                      }
                    },
                    error: function()
                    {
                      alert("Not Found !");
                    }
                });  
            }
        }else{
            $('#error_useremail').html("<b style='color:#FF0004;'>Please Key a-z, A-Z, 0-9, @ - _ .</b>"); 
            $('#useremail').val(""); 
        }
    });   


    function isEnglishchar(str){    
        var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@_-.";
        var str_length=str.length;   
        var isEnglish=true;   
        var Char_At="";   
        for(i=0;i<str_length;i++){   
            Char_At=str.charAt(i);   
            if(orgi_text.indexOf(Char_At)==-1){   
                isEnglish=false;   
                break;
            }      
        }   
        return isEnglish; 
    }  
</script>

<script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js" type="text/javascript"></script> 
<!--  END Fair List --> 

<script type="text/javascript">  
function confirmvalid()
{ 
    if($('#fair_name_en').val()==''){
        alert("Please input Fair name (Eng)");
        $('#fair_name_en').focus();
        return false;

    }else if($('#fair_name_th').val()==''){
        alert("Please input Fair name (Th)");
        $('#fair_name_th').focus();
        return false; 

    }else if($('#faircode').val()==''){ 
        alert("Please input Fair CODE");
        $('#faircode').focus();
        return false; 

    }else{ 

        return true;
    } 
    
}

</script> 


