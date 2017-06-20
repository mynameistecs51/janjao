<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group">
			<label for="idCard" class="col-sm-2 control-label">เลขประจำประชาชน</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="idCard" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="sex" class="col-sm-2 control-label">เพศ</label>
			<div class="col-sm-2" >
				<label><input type="radio" name="sex" id="sex" value="male" class="control-label"> <b class="btn btn-primary btn-md">  ชาย</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="sex" id="sex" value="Female" class="control-label"> <b class="btn btn-warning btn-md"> หญิง</b></label>
			</div>
		<!-- </div>
		<div class="form-group"> -->
			<!-- <label for="name" class="col-sm-1 control-label">ชื่อ</label> -->
			<div class="col-sm-2">
				<input type="text" class="form-control" id="name" placeholder="ชื่อ">
			</div>
		<!-- </div>
		<div class="form-group"> -->
			<!-- <label for="lastname" class="col-sm-1 control-label">นามสกุล</label> -->
			<div class="col-sm-2">
				<input type="text" class="form-control" id="lastname" placeholder="นามสกุล">
			</div>
		</div>
		<div class="form-group">
			<label for="brithDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
			<div class="col-sm-2">
				<select name="birthDate" id="birthDate" class="form-control" >
					<?php for ($i=1; $i <= 31 ; $i++) :?>
						<option value="<?php echo $i ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
					option
				</select>
			</div>
			<!-- <label for="brithDate" class="col-sm-1 control-label">เดือน</label> -->
			<div class="col-sm-2">
				<select name="month" id="month" class="form-control" >
					<?php foreach ($getMonth as $numMonth => $valMonth) :?>
						<option value="<?php echo $numMonth; ?>"><?php echo $valMonth; ?></option>
					<?php endforeach; ?>
					option
				</select>
			</div>
			<!-- <label for="brithDate" class="col-sm-1 control-label">พ.ศ.</label> -->
			<div class="col-sm-2">
				<select name="year" id="year" class="form-control" >
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
				<!-- <input type="text" class="form-control" id="addDress" placeholder="1211300153330"> -->
			</div>
		</div>
		<div class="form-group">
			<label for="province" class="col-sm-2 control-label">จังหวัด</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="province" placeholder="1211300153330">
			</div>
		<!-- </div>
		<div class="form-group"> -->
			<label for="district" class="col-sm-2 control-label">อำเภอ</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="district" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="tumbon" class="col-sm-2 control-label">ตำบล</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="tumbon" placeholder="1211300153330">
			</div>
		<!-- </div>
		<div class="form-group"> -->
			<label for="postCode" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="postCode" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">เบอร์มือถือ</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">ทะเบียนรถ</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">อีเมลล์</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">วันที่ จอง</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">วันที่ Checkin</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">วันที่ Checkout</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
			</div>
		</div>
		<div class="form-group">
			<label for="checkinType" class="col-sm-2 control-label">เช่าแบบ</label>
			<div class="col-sm-6">
				<label><input type="radio" name="checkinType" id="Time" value="male" class="control-label"> <b class="btn btn-info btn-md">  ชั่วคราว</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="checkinType" id="Date" value="Female" class="control-label"> <b class="btn btn-warning btn-md"> รายวัน</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="checkinType" id="Month" value="Female" class="control-label"> <b class="btn btn-primary btn-md"> รายเดือน</b></label>
			</div>
		</div>
		<div class="form-group">
			<label for="inputtext3" class="col-sm-2 control-label">มัดจำ</label>
			<div class="input-group col-sm-6">
				<input type="text" class="form-control" id="inputtext3" placeholder="1211300153330">
				<span class="input-group-addon"> บาท</span>
			</div>
		</div>
		<div class="form-group">
			<label for="btnsnap"  id="snap" class="col-sm-2 control-label"><i class="fa fa-camera btn btn-primary " id="snap"> ถ่ายภาพ</i></label>
			<div class="col-sm-10">

				<video id="video" class="bg-info " width="300" height="200" autoplay></video>

				<canvas id="canvas"  class="bg-primary " width="300" height="200"  ></canvas>
			</div>
		</div>
	</div>
</div>
</clearfix">
<script type="text/javascript">
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

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 300, 200);
});
</script>