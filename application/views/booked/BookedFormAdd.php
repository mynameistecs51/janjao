<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group">
			<label for="selectRoom" class="col-sm-2 control-label">ห้องที่เลือก</label>
			<div class="col-sm-10">
				<?php
				$room =explode('_',$selectRoom);
				echo '<input type="hidden" name="selectRoom" value="'.$selectRoom.'">';  //input hidden selectRoom

				for ($i=0; $i < count($room); $i++) :
					?>
				<div class="col-sm-1 " style="margin:10px;">
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
	<div class="form-group">
		<label for="idcardno" class="col-sm-2 control-label">เลขประจำประชาชน</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="idcardno" id="idcardno" placeholder="1234567890987" minlength="13">
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">เพศ</label>
		<div class="col-sm-2" >
			<label><input type="radio" name="gender" id="gender" value="male" class="control-label" checked> <b class="btn btn-primary btn-md">  ชาย</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="gender" id="gender" value="Female" class="control-label"> <b class="btn btn-warning btn-md"> หญิง</b></label>
		</div>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อ">
		</div>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล">
		</div>
	</div>
	<div class="form-group">
		<label for="birthDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
		<div class="col-sm-2">
			<select name="birthDate" id="birthDate" class="form-control" >
				<?php for ($i=1; $i <= 31 ; $i++) :?>
					<option value="<?php echo $i ?>"><?php echo $i; ?></option>
				<?php endfor; ?>
				option
			</select>
		</div>
		<div class="col-sm-2">
			<select name="birthMonth" id="birthMonth" class="form-control" >
				<?php foreach ($getMonth as $numMonth => $valMonth) :?>
					<option value="<?php echo $numMonth; ?>"><?php echo $valMonth; ?></option>
				<?php endforeach; ?>
				option
			</select>
		</div>
		<!-- <label for="birthDate" class="col-sm-1 control-label">พ.ศ.</label> -->
		<div class="col-sm-2">
			<select name="birthYear" id="birthYear" class="form-control" >
				<?php foreach ($getYear as $EngYear => $ThaiYear) :?>
					<option value="<?php echo $EngYear; ?>"><?php echo $ThaiYear; ?></option>
				<?php endforeach; ?>
				option
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="addDress" class="col-sm-2 control-label">ที่อยู่</label>
		<div class="col-sm-6">
			<textarea name="addDress" id="addDress" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="zipcode" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
		<div class="col-sm-2">
			<input type="text" name="zipcode" id="zipcode" value=""  class="form-control" placeholder="รหัสไปรษณีย์">
		</div>
		<label for="province" class="col-sm-2 control-label">จังหวัด</label>
		<div class="col-sm-2">
			<select class="form-control" name="province" id="province">

			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="amphur" class="col-sm-2 control-label">อำเภอ</label>
		<div class="col-sm-2">
			<select class="form-control" name="amphur" id="amphur">

			</select>
		</div>
		<label for="district" class="col-sm-2 control-label">ตำบล</label>
		<div class="col-sm-2">
			<select class="form-control" name="district" id="district">

			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="mobile" class="col-sm-2 control-label">เบอร์มือถือ</label>
		<div class="col-sm-6">
			<input type="tel" class="form-control" id="mobile" name="mobile" minlength="10" placeholder="1211300153330">
		</div>
	</div>
	<div class="form-group">
		<label for="carNumber" class="col-sm-2 control-label">ทะเบียนรถ</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="carNumber" id="carNumber" placeholder="1211300153330">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">อีเมลล์</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" placeholder="1211300153330">
		</div>
	</div>
	<div class="form-group">
		<label for="bookedDate" class="col-sm-2 control-label">วันที่ จอง</label>
		<div class="col-sm-6">
			<input type="datetime-local" class="form-control" id="bookedDate" name="bookedDate" placeholder="1211300153330">
		</div>
	</div>
	<div class="form-group">
		<label for="checkinDate" class="col-sm-2 control-label">วันที่ Checkin</label>
		<div class="col-sm-2">
			<input type="datetime-local" class="form-control" id="checkinDate" name="checkinDate" placeholder="1211300153330">
		</div>
	<!-- </div>
	<div class="form-group"> -->
		<label for="checkOutDate" class="col-sm-2 control-label">ถึงวันที่ Checkout</label>
		<div class="col-sm-2">
			<input type="datetime-local" class="form-control" id="checkOutDate" name="checkOutDate" placeholder="1211300153330">
		</div>
	</div>
	<div class="form-group">
		<label for="bookedType" class="col-sm-2 control-label">เช่าแบบ</label>
		<div class="col-sm-6">
			<label><input type="radio" name="bookedType" id="SHORT" value="SHORT" class="control-label"> <b class="btn btn-info btn-md">  ชั่วคราว</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="bookedType" id="DAY" value="DAY" class="control-label" checked> <b class="btn btn-warning btn-md"> รายวัน</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="bookedType" id="MONTH" value="MONTH" class="control-label"> <b class="btn btn-primary btn-md"> รายเดือน</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="deposit" class="col-sm-2 control-label">เงินมัดจำ</label>
		<div class="input-group col-sm-6">
			<input type="text" class="form-control" id="deposit" name="deposit" placeholder="1211300153330">
			<span class="input-group-addon">บาท</span>
		</div>
	</div>
	<div class="form-group">
		<label for="is_breakfast" class="col-sm-2 control-label">อาหารเช้า</label>
		<div class="col-sm-6">
			<label><input type="radio" name="is_breakfast" id="breakfast0" value="0" class="control-label" checked> <b class="btn btn-danger btn-md">  ไม่รับอาหารเช้า</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="is_breakfast" id="breakfast1" value="1" class="control-label"> <b class="btn btn-success btn-md"> รับอาหารเช้า</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="deposit" class="col-sm-2 control-label">Comment</label>
		<div class="input-group col-sm-6">
				<textarea name="comment" id="comment" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="btnsnap"  id="snap" class="col-sm-2 control-label"><i class="fa fa-camera btn btn-primary " id="snap"> ถ่ายภาพ</i></label>
		<div class="col-sm-10">

			<video id="video" class="bg-info " width="300" height="200" autoplay></video>

			<canvas id="canvas"  name="idcardPicture"  class="bg-primary " width="300" height="200"  ></canvas>
			<input type="hidden" name="images" id="images">
		</div>
	</div>
</div>
</div>

<script type="text/javascript">

	getProvince(); // เปิดใช้งาน function getProvince

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
  var video = document.getElementById('video');

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

function getProvince(){
	$("input[name=zipcode]").change(function(){
		$.ajax({
			url: '<?php echo base_url().$this->ctl."/getProvince/";?>',
			data:"zipcode="+$("input[name=zipcode]").val(),
			type: 'POST',
			dataType: 'json',
			success:function(res){
				var district="<option >---เลือกตำบล---</option>";
				$.each(res, function( index, value ) {
					province = "<option value="+value['PROVINCE_ID']+"> "+value['PROVINCE_NAME']+"</option>";
					amphur = "<option value="+value['AMPHUR_ID']+"> "+value['AMPHUR_NAME']+"</option>";
					district += "<option value="+value['DISTRICT_ID']+"> "+value['DISTRICT_NAME']+"</option>";
				});
				$('#province').html(province);
				$('#amphur').html(amphur);
				$('#district').html(district);

			},
			error:function(err){
				alert("รหัสไปรษณีย์ไม่ถูกต้อง"+$(this).val());
				$('input[name=zipcode]').val('').focus();
				$('#province').html('');
				$('#amphur').html('');
				$('#district').html('');
			}
		});
	});
}
</script>