  <!-- <link href="<?php echo base_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
  <input type="hidden" class="form-control" name="transaction" value="BOOKED">
  <div class="row form_input" style="text-align:left; margin-bottom:20px">
  	<div class="form-horizontal">
  		<div class="form-group">
  			<label for="selectRoom" class="col-sm-2 control-label">ห้องที่เลือก</label>
  			<div class="col-lg-8">
	  			<div class="row">
	  				<?php
	  				$room =explode('_',$selectRoom);
					echo '<input type="hidden" name="selectRoom" value="'.$selectRoom.'">';  //input hidden selectRoom

					for ($i=0; $i < count($room); $i++) :
						?>
					<div class="col-lg-1 " style="margin-right:40px; margin-bottom:10px;">
						<span class="button-checkbox ">
							<button type="button" class="btn btn_room btn-danger btn-xs" data-color="danger" disabled >
								<i class="fa fa-bed" aria-hidden="true"></i>
								<h4><?php echo 'Room '.$room[$i]; ?></h4>
							</button>
						</span>
					</div>
				<?php endfor;	?>
				</div>
		</div>
	</div>
	<div class="form-group">
		<label for="idcardno" class="col-sm-2 control-label">เลขประจำประชาชน <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="idcardno" id="idcardno" placeholder="เลขประจำประชาชน/ Passport No" required>
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">เพศ</label>
		<div class="col-sm-8" >
			<label><b class="btn btn-success btn-md"><input type="radio" name="gender" id="gender" value="MALE" class="control-label" checked> ชาย</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-warning btn-md"><input type="radio" name="gender" id="gender" value="FEMALE" class="control-label">  หญิง</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">ชื่อ-สกุล <b style="color: #FF0000">*</b></label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อ" required>
		</div>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล" required>
		</div>
	</div>
	<div class="form-group">
		<label for="birthDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
		<div class="col-sm-8"> 
			<div class="row">
				<div class="col-sm-2">
					<select class="form-control" name="birthdate_d" id="birthdate_d" >
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select class="form-control" name="birthdate_m" id="birthdate_m">
						<option value="01">มกราคม</option>
						<option value="02">กุมภาพันธ์</option>
						<option value="03">มีนาคม</option>
						<option value="04">เมษายน</option>
						<option value="05">พฤษภาคม</option>
						<option value="06">มิถุนายน</option>
						<option value="07">กรกฎาคม</option>
						<option value="08">สิงหาคม</option>
						<option value="09">กันยายน</option>
						<option value="10">ตุลาคม</option>
						<option value="11">พฤศจิกายน</option>
						<option value="12">ธันวาคม</option> 
					</select>
				</div>
				<div class="col-sm-2">
					<select class="form-control" name="birthdate_y"  id="birthdate_y">
					<?php 
						$y = $this->packfunction->yearnow()+543;
						for ($i=0; $i < 80; $i++) { 
							echo '<option value="'.$y.'" >'.$y.'</option> ';
							$y--;
						}
					 ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="address" class="col-sm-2 control-label">ที่อยู่</label>
		<div class="col-sm-8">
			<textarea name="address" id="address" class="form-control"></textarea>
		</div>
	</div> 
	<div class="form-group">
		<label for="mobile" class="col-sm-2 control-label">เบอร์มือถือ</label>
		<div class="col-sm-8">
			<input type="tel" class="form-control" id="mobile" name="mobile" minlength="9" placeholder="082-2222222">
		</div>
	</div>
	<div class="form-group">
		<label for="carNumber" class="col-sm-2 control-label">ทะเบียนรถ</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="licenseplate" id="licenseplate" placeholder="1กก 1111">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">อีเมลล์</label>
		<div class="col-sm-8">
			<input type="email" class="form-control" id="email" name="email" placeholder="name@domain.com">
		</div>
	</div>
	<div class="form-group">
		<label for="bookedDate" class="col-sm-2 control-label">วันที่ จอง <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8"> 
			<input type="text" class="form-control" id="bookedDate" name="bookedDate" value="<?php echo $this->packfunction->dtDMYnow(); ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="checkinDate" class="col-sm-2 control-label">วันที่ Checkin <b style="color: #FF0000">*</b></label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="checkinDate" name="checkinDate" value="<?php echo $din; ?>" readonly>
		</div> 
		<label for="checkOutDate" class="col-sm-2 control-label">วันที่ Checkout <b style="color: #FF0000">*</b></label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="checkOutDate" name="checkOutDate" value="<?php echo $dout; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="bookedType" class="col-sm-2 control-label">เช่าแบบ <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8">
			<label><b class="btn btn-info btn-md"> <input type="radio" name="bookedType" id="SHORT" value="SHORT" class="control-label">  ชั่วคราว</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-warning btn-md"> <input type="radio" name="bookedType" id="DAY" value="DAY" class="control-label" checked>  รายวัน</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-primary btn-md"> <input type="radio" name="bookedType" id="MONTH" value="MONTH" class="control-label">  รายเดือน</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="deposit" class="col-sm-2 control-label">เงินมัดจำ <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8">
				<div class="input-group">
				<input type="text" class="form-control" id="deposit" name="deposit" placeholder="300">
			<span class="input-group-addon">บาท</span>
			</div> 
		</div>
	</div>
	<div class="form-group">
		<label for="is_breakfast" class="col-sm-2 control-label">อาหารเช้า</label>
		<div class="col-sm-8">
			<label><b class="btn btn-danger btn-md"> <input type="radio" name="is_breakfast" id="breakfast0" value="NO" class="control-label" checked> ไม่รับอาหารเช้า</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-success btn-md"> <input type="radio" name="is_breakfast" id="breakfast1" value="YES" class="control-label"> รับอาหารเช้า</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="deposit" class="col-sm-2 control-label">Comment</label>
		<div class="col-sm-8">
			<textarea name="comment" id="comment" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="btnsnap" class="col-sm-2 control-label"></label>
		<div class="col-sm-10"> 
			<video id="video" class="" width="260" height="195" autoplay></video> 
			<canvas id="canvas"  name="idcardPicture"  class="bg-primary " width="260" height="195"  ></canvas>
			<input type="hidden" name="images" id="images">
		</div>
	</div>
	<div class="form-group">
		<label for="btnsnap" class="col-sm-2 control-label"></label>
		<div class="col-sm-3" align="center"> 
			<i class="fa fa-camera btn btn-primary "  id="snap"> ถ่ายภาพ <i class="glyphicon glyphicon-menu-right"></i></i>
		</div>
	</div>
</div>
</div>
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript"> 

	$.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
	$('#birthDate').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y',
		lang:'th',
	});
	$('#bookedDate').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y H:i',
		lang:'th',
	});

	function monthai(num){
		var mon = "";
		switch (num) {
		    case "01":
		        mon = "มกราคม";
		        break;
		    case "02":
		        mon = "กุมภาพันธ์";
		        break;
		    case "03":
		        mon = "มีนาคม";
		        break;
		    case "04":
		        mon = "เมษายน";
		        break;
		    case "05":
		        mon = "พฤษภาคม";
		        break;
		    case "06":
		        mon = "มิถุนายน";
		        break;
		    case "07":
		        mon = "กรกฎาคม";
		        break;
		    case "08":
		        mon = "สิงหาคม";
		        break;
		    case "09":
		        mon = "กันยายน";
		        break;
		    case "10":
		        mon = "ตุลาคม";
		        break;
		    case "11":
		        mon = "พฤศจิกายน";
		        break;
		    case "12":
		        mon = "ธันวาคม";
		        break;
		}
		return  mon;
	}

	$('#idcardno').change(function(){
		var idcardno = $(this).val();
		$.ajax({
			url: '<?php echo base_url()."booked/getolddata/";?>',
			data: {idcardno:idcardno},
			type: 'POST',
			dataType: 'json',
			success:function(res){
				if(res.status=='success'){
					$('#firstName').val(res.data.firstName);
					$('#lastName').val(res.data.lastName);
					$('#address').val(res.data.address);
					$('#mobile').val(res.data.mobile);
					$('#licenseplate').val(res.data.licenseplate);
					$('#email').val(res.data.email); 
					var bbd= res.data.birthdateD;
					var bbm= res.data.birthdateM;
					var bby= res.data.birthdateY;

					$('#birthdate_d').append('<option value="'+bbd+'" selected>'+bbd+'</option>');
					$('#birthdate_m').append('<option value="'+bbm+'" selected>'+monthai(bbm)+'</option>');
					$('#birthdate_y').append('<option value="'+bby+'" selected>'+bby+'</option>');
				}else{
					$('#firstName').val("");
					$('#lastName').val("");
					$('#address').val("");
					$('#mobile').val("");
					$('#licenseplate').val("");
					$('#email').val(""); 
				}
			},
			error:function(res){ }
		});
	}); 

	// Grab elements, create settings, etc.
	var video = document.getElementById('video');

	// Get access to the camera!
	if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	    // Not adding `{ audio: true }` since we only want video now
	    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
	    	video.src = window.URL.createObjectURL(stream);
	    	video.play();
	    });
	}

	// Elements for taking the snapshot
	var canvas = document.getElementById('canvas');

	var context = canvas.getContext('2d');  
	var filesup = document.getElementById('images');
	// Trigger photo take
	document.getElementById("snap").addEventListener("click", function() {

		var data = context.drawImage(video, 0, 0, 300, 200);

		var imageData = canvas.toDataURL('image/png');

		filesup.setAttribute('value',imageData);

	});

	function dataURLtoFile(dataurl, filename) {
		var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
		bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
		while(n--){
			u8arr[n] = bstr.charCodeAt(n);
		}
		return new File([u8arr], filename, {type:mime});
	}



// function getProvince(){
// 	$("input[name=zipcode]").change(function(){
// 		$.ajax({
// 			url: '<?php echo base_url().$this->ctl."/getProvince/";?>',
// 			data:"zipcode="+$("input[name=zipcode]").val(),
// 			type: 'POST',
// 			dataType: 'json',
// 			success:function(res){
// 				var district="<option >---เลือกตำบล---</option>";
// 				$.each(res, function( index, value ) {
// 					province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
// 					amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
// 					district += "<option value="+value['DISTRICT_ID']+"> "+value['DISTRICT_NAME']+"</option>";
// 				});
// 				$('#province').html(province);
// 				$('#amphur').html(amphur);
// 				$('#district').html(district);
// 			},
// 			error:function(res){
// 				alert("รหัสไปรษณีย์ไม่ถูกต้อง");
// 				$('input[name=zipcode]').val('').focus();
// 				$('#province').html('');
// 				$('#amphur').html('');
// 				$('#district').html('');
// 			}
// 		});
// 	});
// }
</script>