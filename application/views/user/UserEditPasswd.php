<?php
if(isset($userDtl['userID'])){ ?>
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
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-sm-2">รหัสผ่านเดิม<span style="color:#FF0004;">*</span> :</label>
							<div class="col-sm-8">
								<input  type="email" class="form-control" name="old_passwwd" id="old_passwwd" autocomplete="off" value="" >
							</div>
							<div class="col-sm-2" id="error_ole_passwd"></div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-sm-2">รหัสผ่านใหม่<span style="color:#FF0004;">*</span> :</label>
							<div class="col-sm-8">
								<input  type="email" class="form-control" name="new_passwd" id="new_passwd" autocomplete="off" value="" >
							</div>
							<div class="col-sm-2" id="error_useremail"></div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-sm-2">ยืนยันรหัสผ่านใหม่<span style="color:#FF0004;">*</span> :</label>
							<div class="col-sm-8">
								<input  type="email" class="form-control" name="conf_new_passwd" id="conf_new_passwd" autocomplete="off" value="" >
							</div>
							<div class="col-sm-2" id="error_useremail"></div>
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
			}else if($('#old_password').val()==''){
				alert("Please input old_password ");
				$('#old_password').focus();
				return false;
			}else if($('#conf_new_passwd').val()==''){
				alert("Please input Confirm password ");
				$('#conf_new_passwd').focus();
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


