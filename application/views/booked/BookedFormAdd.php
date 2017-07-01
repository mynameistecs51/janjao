  <!-- <link href="<?php echo base_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
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
		<label for="idcardno" class="col-sm-2 control-label">เลขประจำประชาชน <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="idcardno" id="idcardno" placeholder="เลขประจำประชาชน 13 หลัก" minlength="13">
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">เพศ</label>
		<div class="col-sm-8" >
			<label><b class="btn btn-success btn-md"><input type="radio" name="gender" id="gender" value="male" class="control-label" checked> ชาย</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-warning btn-md"><input type="radio" name="gender" id="gender" value="Female" class="control-label">  หญิง</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="gender" class="col-sm-2 control-label">ชื่อ-สกุล <b style="color: #FF0000">*</b></label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อ">
		</div>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล">
		</div>
	</div>
	<div class="form-group">
		<label for="birthDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="birthDate" id="birthDate">
		</div>
	</div>
	<div class="form-group">
		<label for="addDress" class="col-sm-2 control-label">ที่อยู่</label>
		<div class="col-sm-8">
			<textarea name="addDress" id="addDress" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="zipcode" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
			<input type="text" name="zipcode" id="zipcode" value=""  class="form-control" placeholder="รหัสไปรษณีย์">
		</div>
		<div class="col-sm-4">
			<select class="form-control" name="province" id="province"> 
			</select>
		</div>
	</div>
	<div class="form-group">  
		<label for="amphur" class="col-sm-2 control-label"></label>
		<div class="col-sm-4">
			<select class="form-control" name="amphur" id="amphur">

			</select>
		</div> 
		<div class="col-sm-4">
			<select class="form-control selectpicker" data-live-search="true" name="district" id="district">

			</select>
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
			<input type="text" class="form-control" name="carNumber" id="carNumber" placeholder="1กก 1111">
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
			<input type="text" class="form-control" id="bookedDate" name="bookedDate" >
		</div>
	</div>
	<div class="form-group">
		<label for="checkinDate" class="col-sm-2 control-label">วันที่ Checkin <b style="color: #FF0000">*</b></label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="checkinDate" name="checkinDate">
		</div>
	<!-- </div>
	<div class="form-group"> -->
		<label for="checkOutDate" class="col-sm-2 control-label">วันที่ Checkout <b style="color: #FF0000">*</b></label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="checkOutDate" name="checkOutDate" >
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
				<input type="text" class="form-control" id="deposit" name="deposit" placeholder="100 200 300 400 500">
			<span class="input-group-addon">บาท</span>
			</div> 
		</div>
	</div>
	<div class="form-group">
		<label for="is_breakfast" class="col-sm-2 control-label">อาหารเช้า</label>
		<div class="col-sm-8">
			<label><b class="btn btn-danger btn-md"> <input type="radio" name="is_breakfast" id="breakfast0" value="0" class="control-label" checked> ไม่รับอาหารเช้า</b></label>
			&nbsp;&nbsp;&nbsp;
			<label><b class="btn btn-success btn-md"> <input type="radio" name="is_breakfast" id="breakfast1" value="1" class="control-label"> รับอาหารเช้า</b></label>
		</div>
	</div>
	<div class="form-group">
		<label for="deposit" class="col-sm-2 control-label">Comment</label>
		<div class="col-sm-8">
			<textarea name="comment" id="comment" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="btnsnap"  id="snap" class="col-sm-2 control-label"><i class="fa fa-camera btn btn-primary " id="snap"> ถ่ายภาพ</i></label>
		<div class="col-sm-10">

			<video id="video" class="" width="260" height="195" autoplay></video>

			<canvas id="canvas"  name="idcardPicture"  class="bg-primary " width="260" height="195"  ></canvas>
			<input type="hidden" name="images" id="images">
		</div>
	</div>
</div>
</div>
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">

	getProvince(); // เปิดใช้งาน function getProvince
	// $('.selectpicker').selectpicker({
	// });

$.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
$('#birthDate').datetimepicker({
	timepicker:true,
	mask:true,
	format:'d-m-Y',
	lang:'th',
});
$('#bookedDate, #checkinDate, #checkOutDate').datetimepicker({
	timepicker:true,
	mask:true,
	format:'d-m-Y H:i:s',
	lang:'th',
});
// start checkinDate form  bookedDate
$('#bookedDate').on('change',function(){
	var startDate = $('#bookedDate').val();
	var expoldeY= startDate.split(' ');
	$( "#checkinDate" ).datetimepicker({
		minDate: expoldeY[0].split('-')[2]+'-'+expoldeY[0].split('-')[1]+'-'+expoldeY[0].split('-')[0],
	});
});

$('#checkinDate').on("change",function() {
	var startDate = $('#checkinDate').val();
	var expoldeY= startDate.split(' ');
	$( "#checkOutDate" ).datetimepicker({
		minDate: expoldeY[0].split('-')[2]+'-'+expoldeY[0].split('-')[1]+'-'+expoldeY[0].split('-')[0],
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
			error:function(res){
				alert("รหัสไปรษณีย์ไม่ถูกต้อง");
				$('input[name=zipcode]').val('').focus();
				$('#province').html('');
				$('#amphur').html('');
				$('#district').html('');
			}
		});
	});
}
</script>