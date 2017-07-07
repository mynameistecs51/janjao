<input  type="hidden" name="userID" id="userID" value="" > 
<div class="row form_input" style="text-align:left; margin-bottom:20px">
    <div class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-2">UserName<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
                <input  type="text" class="form-control" name="username" id="username" autocomplete="off" value="" >
            </div> 
            <div class="col-sm-2" id="error_username"></div> 
        </div>  
        <div class="form-group">
            <label class="control-label col-xs-2" for="password">PassWord<span style="color:#FF0004;">*</span></label>
            <div class="col-xs-4">
                <input  id="password" type="password" class="form-control"  name="password" placeholder="input Password"  value="" title="Please input PassWord" >
            </div>
            <div class="col-xs-4">
                <input  id="confirmpassword" type="password" class="form-control"  name="confirmpassword" placeholder="input Confirm Password"   value="" >
            </div>
            <div class="col-xs-2" id="errorConfirmPass" style="font-size: 25px;">
                <i style="color:#FE9A2E;" class="glyphicon glyphicon-exclamation-sign"></i>
            </div> 
        </div> 
        <div class="form-group">
          <label class="control-label col-sm-2">Email<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
                <input  type="email" class="form-control" name="useremail" id="useremail" autocomplete="off" value="" >
            </div> 
            <div class="col-sm-2" id="error_useremail"></div>
        </div>  
        <div class="form-group">
            <label for="select" class="control-label col-xs-2">Title <span style="color:#FF0004;">*</span></label>
            <div class="col-xs-8" id="coluserTitle">
                <select id="userTitle" class="form-control" name="userTitle" title="Please Selected" >
                    <option value="" >--Selected--</option>
                    <option value="MR" >MR.</option>
                    <option value="MS" >MS.</option>
                    <option value="MRS">MRS.</option>
                </select>
            </div> 
            <div class="col-xs-2" id="error_title"></div>
        </div> 
        <div class="form-group">
            <label class="control-label col-sm-2" >Name<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-4">
                <input  id="userFname" type="text" class="form-control"  name="userFname" placeholder="First Name"  value="" >
            </div>
            <div class="col-sm-4">
                <input  id="userLname" type="text" class="form-control"  name="userLname"  placeholder="Last Name" value="" >
            </div>
            <div class="col-sm-2" id="errorName"></div>
        </div> 
        <div class="form-group">
          <label class="control-label col-sm-2">ID Card No :</label>
            <div class="col-sm-8">
                <input  type="text" class="form-control" name="userIdcard" id="userIdcard" autocomplete="off" placeholder="ID Card / Passport No" value="" >
            </div>
            <div class="col-sm-2" id="error_userIdcard"></div>
        </div> 
        <div class="form-group">
          <label class="control-label col-sm-2">Position<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
                <input  type="text" class="form-control" name="position" id="position" autocomplete="off" value="" >
            </div> 
            <div class="col-sm-2" id="error_position"></div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2">Address :</label>
            <div class="col-sm-8">
                <textarea type="text" class="form-control" row="3" name="address" id="address" autocomplete="off" ></textarea>
            </div> 
            <div class="col-sm-2" id="error_address"></div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2">Mobile<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
                <input  type="text" class="form-control" name="mobile" id="mobile" autocomplete="off" value="" >
            </div> 
            <div class="col-sm-2" id="error_mobile"></div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2">User Group<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8"> 
                <select id="usergroupID" class="form-control" name="usergroupID" >
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
</div>
<script type="text/javascript">  

    $('#password,#confirmpassword').on('change',function(){ 
        if($('#password').val().trim() !='' && $('#confirmpassword').val().trim() != ''){
            if($('#password').val()==$('#confirmpassword').val()){
                $('#errorConfirmPass').html('<i style="color:#318407;font-size:28px;" class="glyphicon glyphicon-ok-sign"></i>');
            }else{
                $('#errorConfirmPass').html('<i style="color:#d43f3a;" class="glyphicon glyphicon-remove-sign"></i><b style="color:#ff0000;font-size:13px;"> Confirm Incorrect !</b>');
                $('#confirmpassword').val("");
            }
        }else{
            $('#errorConfirmPass').html('<i style="color:#d43f3a;" class="glyphicon glyphicon-remove-sign"></i><b style="color:#ff0000;font-size:13px;"> Confirm Incorrect !</b>');
                $('#confirmpassword').val("");
        }
    }); 
     
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
<!--  END Fair List --> 

<script type="text/javascript">  
function confirmvalid()
{ 
    if($('#username').val()==''){
        alert("Please input UserName ");
        $('#username').focus();
        return false; 
    }else if($('#password').val()==''){
        alert("Please input password ");
        $('#password').focus();
        return false;
    }else if($('#confirmpassword').val()==''){
        alert("Please input Confirm password ");
        $('#confirmpassword').focus();
        return false; 

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


