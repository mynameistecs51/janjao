<?php if(isset($userDtl['userID'])){ ?>
<div class="form-horizontal">
    <input  type="hidden" name="userID" id="userID" value="<?php echo $userDtl['userID'] ?>" >
    <div class="row text-center" style="margin-top: 10px;"> 
        <div class="col-lg-12" align="left"> 
            <div class="row">   
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">UserName<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" name="username" id="username" autocomplete="off" value="<?php echo $userDtl['username'] ?>" >
                        </div> 
                        <div class="col-sm-2" id="error_username"></div> 
                    </div> 
                </div> 
            	<div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Email<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8">
                            <input  type="email" class="form-control" name="useremail" id="useremail" autocomplete="off" value="<?php echo $userDtl['useremail'] ?>" >
                        </div> 
                        <div class="col-sm-2" id="error_useremail"></div> 
                    </div> 
                </div> 
                <div class="col-lg-12"> 
                    <div class="form-group">
                        <label for="select" class="control-label col-xs-2">Title <span style="color:#FF0004;">*</span></label>
                        <div class="col-xs-<?php if($userDtl['userTitle']!='MR' && $userDtl['userTitle']!='MS'  && $userDtl['userTitle']!='MRS'  && $userDtl['userTitle']!='' ){ echo '4'; }else{ echo '8'; } ?>" id="coluserTitle">
                            <select id="userTitle" class="form-control selectpicker" name="userTitle" title="Please Selected" >
                                <option value="" <?php if($userDtl['userTitle']==''){ echo 'selected'; } ?> >--Selected--</option>
                                <option value="MR" <?php if($userDtl['userTitle']=='MR'){ echo 'selected'; } ?> >MR.</option>
                                <option value="MS" <?php if($userDtl['userTitle']=='MS'){ echo 'selected'; } ?> >MS.</option>
                                <option value="MRS" <?php if($userDtl['userTitle']=='MRS'){ echo 'selected'; } ?>  >MRS.</option>
                            </select>
                        </div> 
                        <div class="col-xs-2" id="error_title"></div>
                    </div>
                </div>  
                <div class="col-lg-12"> 
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Name<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-4">
                            <input  id="userFname" type="text" class="form-control"  name="userFname" placeholder="First Name"  value="<?php echo $userDtl['userFname']; ?>" >
                        </div> 
                        <div class="col-sm-4">
                            <input  id="userLname" type="text" class="form-control"  name="userLname"  placeholder="Last Name" value="<?php echo $userDtl['userLname']; ?>" >
                        </div>
                        <div class="col-sm-2" id="errorName"></div>
                    </div>
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">ID Card No :</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" name="userIdcard" id="userIdcard" autocomplete="off" placeholder="ID Card / Passport No" value="<?php echo $userDtl['userIdcard'] ?>" >
                        </div>
                        <div class="col-sm-2" id="error_userIdcard"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Position<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" name="position" id="position" autocomplete="off" value="<?php echo $userDtl['position'] ?>" >
                        </div> 
                        <div class="col-sm-2" id="error_position"></div>
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Address :</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" row="3" name="address" id="address" autocomplete="off" ><?php echo $userDtl['address'] ?></textarea>
                        </div> 
                        <div class="col-sm-2" id="error_address"></div>
                    </div> 
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">Mobile<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" value="<?php echo $userDtl['mobile'] ?>" >
                        </div> 
                        <div class="col-sm-2" id="error_mobile"></div>
                    </div> 
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-sm-2">User Group<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8"> 
                            <select id="usergroupID" class="form-control selectpicker" name="usergroupID" >
                                <option value="">--select--</option>
                                <?php
                                    foreach ($usergroup as $usg) {
                                        if($userDtl['usergroupID']==$usg["usergroupID"]){ 
                                            echo '<option value="'.$usg["usergroupID"].'" selected>'.$usg["usergroupName"].'</option> ';
                                        }else{
                                            echo '<option value="'.$usg["usergroupID"].'" >'.$usg["usergroupName"].'</option> ';
                                        }
                                    }
                                ?> 
                            </select>
                        </div> 
                        <div class="col-sm-2" id="error_usergroupID"></div>
                    </div> 
                </div> 
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputEmail" class="control-label col-sm-2">Status<span style="color:#FF0004;">*</span> :</label>
                        <div class="col-sm-8">
                            <input type="radio" name="status" class="control-label status" style="margin-left: 10px;" value="ON"  <?php echo $userDtl['status']=='ON'  ? 'checked' : ''; ?> >  ON  
                            <input type="radio" name="status" class="control-label status" style="margin-left: 10px;" value="OFF" <?php echo $userDtl['status']=='OFF' ? 'checked' : ''; ?> >  OFF 
                        </div>
                    </div>
                </div>  
            </div>
         </div>
    </div> 
</div>  
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
                data: { txt: val,field:'username',id:userID},
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
                    data: { txt: email,field:'useremail',id:userID},
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
    if($('#username').val()==''){
        alert("Please input UserName ");
        $('#username').focus();
        return false; 
/*
    }else if($('#password').val()==''){
        alert("Please input password ");
        $('#password').focus();
        return false;
    }else if($('#confirmpassword').val()==''){
        alert("Please input Confirm password ");
        $('#confirmpassword').focus();
        return false; 
*/
    }else if($('#useremail').val()==''){
        alert("Please input Email");
        $('#useremail').focus();
        return false; 

    }else if($('#userTitle').val()==''){ 
        alert("Please Select Title");
        $('#userTitle').focus();
        return false; 

    }else if($('#userFname').val()==''){
        alert("Please input First Name");
        $('#userFname').focus();
        return false; 

    }else if($('#userLname').val()==''){
        alert("Please input Last Name");
        $('#userLname').focus();
        return false; 
    }else if($('#position').val()==''){
        alert("Please Input Position ");
        $('#position').focus();
        return false;

    }else{ 

        return true;
    }
    
}

</script> 


<?php }else{ // isset 
        redirect('user/');
      }
?>


