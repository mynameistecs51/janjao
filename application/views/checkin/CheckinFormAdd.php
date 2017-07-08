  <!-- <link href="<?php echo base_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
  <input type="hidden" class="form-control" name="transaction" value="CHECKIN">
  <div class="row form_input" style="text-align:left; margin-bottom:20px">
  	<div class="form-horizontal">
  		<div class="form-group">
  			<label for="selectRoom" class="col-lg-2 control-label">ห้องที่เลือก</label>
  			<div class="col-lg-8">
  				<div class="row">
  					<div class="col-lg-12">
  						<?php
  						foreach ($selectRoom as $key => $room) :?>
  						<input type="hidden" name="selectRoom" value="<?php echo $room[0]['roomcode']; ?>">  <!-- //input hidden selectRoom -->
  						<button type="button" class="btn roomSelect btn-danger btn-xs" data-color="danger" data-room="<?php echo $room[0]['roomcode'] ?>" data-priceshort="<?php echo $room[0]['price_short']; ?>" data-priceday="<?php echo $room[0]['price_day']; ?>" data-pricemonth="<?php echo $room[0]['price_month']; ?>"  disabled >
  							<i class="fa fa-bed" aria-hidden="true"></i>
  							<h4><?php echo 'Room '.$room[0]['roomcode']; ?></h4>
  						</button>
  					<?php endforeach; ?>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="idcardno" class="col-sm-2 control-label">เลขประจำประชาชน <b style="color: #FF0000">*</b></label>
  		<div class="col-sm-8">
  			<input type="text" class="form-control" name="idcardno" id="idcardno" placeholder="เลขประจำประชาชน/ Passport No" >
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
  			<input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อ">
  		</div>
  		<div class="col-sm-4">
  			<input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล">
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="birthDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
  		<div class="col-sm-8">
  			<div class="row">
  				<div class="col-sm-2">
  					<select class="form-control" name="birthdate_d" required>
  						<option value="" selected>--วันที่--</option>
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
  					<select class="form-control" name="birthdate_m" required>
  						<option value="" selected>--เดือน--</option>
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
  					<select class="form-control" name="birthdate_y" required>
  						<option value="" selected>--พ.ศ.--</option>
  						<?php
  						$y = $this->packfunction->yearnow()+543;
  						for ($i=0; $i < 80; $i++) {
  							echo '<option value="'.$y.'">'.$y.'</option> ';
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
  		<label for="licenseplate" class="col-sm-2 control-label">ทะเบียนรถ</label>
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
  			<input type="text" class="form-control" id="bookedDate" name="bookedDate" value="<?php echo $this->packfunction->dtDMYnow(); ?> ">
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="checkinDate" class="col-sm-2 control-label">วันที่ Checkin <b style="color: #FF0000">*</b></label>
  		<div class="col-sm-3">
  			<input type="text" class="form-control" id="checkinDate" name="checkinDate" value="<?php echo $din; ?>" readonly >
  		</div>
  		<label for="checkOutDate" class="col-sm-2 control-label">วันที่ Checkout <b style="color: #FF0000">*</b></label>
  		<div class="col-sm-3">
  			<input type="text" class="form-control" id="checkOutDate" name="checkOutDate" value="<?php echo $dout; ?>" readonly >
        <input type="hidden" class="form-control" id="checkOutDate_old" value="<?php echo $dout; ?>" readonly >
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="bookedType" class="col-sm-2 control-label">เช่าแบบ <b style="color: #FF0000">*</b></label>
  		<div class="col-sm-8">
  			<label><b class="btn btn-info btn-md"> <input type="radio" name="bookedType" id="SHORT" value="SHORT" class="control-label bookedType">  ชั่วคราว</b></label>
  			&nbsp;&nbsp;&nbsp;
  			<label><b class="btn btn-warning btn-md"> <input type="radio" name="bookedType" id="DAY" value="DAY" class="control-label bookedType" checked>  รายวัน</b></label>
  			&nbsp;&nbsp;&nbsp;
  			<label><b class="btn btn-primary btn-md"> <input type="radio" name="bookedType" id="MONTH" value="MONTH" class="control-label bookedType">  รายเดือน</b></label>
  		</div>
  	</div>
  	<div class="form-group">
  		<label for="deposit" class="col-sm-2 control-label">เงินมัดจำ <b style="color: #FF0000">*</b></label>
  		<div class="col-sm-8">
  			<div class="input-group">
  				<input type="text" class="form-control" id="cashPledge" name="cashPledge" placeholder="300" value="">
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
  		<label for="btnsnap" class="col-sm-2 control-label"></label>
  		<div class="col-sm-10">
  			<video id="video" class="" width="260" height="195" autoplay></video>
  			<canvas id="canvas"  name="idcardPicture"  class="bg-primary " width="260" height="195" ></canvas>
  			<input type="hidden" name="images" id="images" value="">

  		</div>
  	</div>
  	<div class="form-group">
  		<label for="btnsnap" class="col-sm-2 control-label"></label>
  		<div class="col-sm-3" align="center">
  			<i class="fa fa-camera btn btn-primary "  id="snap"> ถ่ายภาพ <i class="glyphicon glyphicon-menu-right"></i></i>
  		</div>
  	</div>
  	<!-- </div> -->
  	<!-- </div> -->
  	<hr>
  	<!-- add service price total -->
  	<div class="form-group" align="right">
  		<label for="idcardno" class="col-lg-2 control-label"></label>
  		<div class="col-lg-8">
  			<div class="col-lg-6">ภาษีมูลค่าเพิ่ม</div><div class="col-lg-5"><input type="text" name="vat" id="vat" class="form-control" value="7" style="text-align: right;height: 28px;"></div><div class="col-lg-1">%</div>
  			<div class="col-lg-12" style="height: 5px;"></div>
  			<div class="col-lg-6">ส่วนลด</div><div class="col-lg-5"><input type="text" name="discount" id="discount" class="form-control" value="0.00" style="text-align: right;height: 28px;"></div><div class="col-lg-1">บาท</div>
  			<div class="col-lg-12" style="height: 5px;"></div>
  			<div class="col-lg-6">เงินมัดจำ</div><div class="col-lg-5"><input type="text" name="deposit" id="deposit"  class="form-control" value="0.00" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
  			<div class="col-lg-12" style="height: 5px;"></div>
  			<div class="col-lg-6">ยอดสุทธิ</div><div class="col-lg-5"><input type="text" name="lastamount" id="lastamount"  class="form-control" value="0.00" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
  			<div class="col-lg-12" style="height: 5px;"></div>
  			<div class="col-lg-6">รับเงิน</div><div class="col-lg-5"><input type="text" name="pay" id="pay" class="form-control" value="0.00" style="text-align: right;height: 28px;"></div><div class="col-lg-1">บาท</div>
  			<div class="col-lg-12" style="height: 5px;"></div>
  			<div class="col-lg-6">เงินทอน</div><div class="col-lg-5"><input type="text" name="change" id="change" class="form-control" value="0.00" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
  		</div>
  		<label for="idcardno" class="col-lg-2 control-label"></label>
  		<!-- </div> -->


  		<div class="form-group" align="center">
  			<div class="col-lg-12"><br><br><br>
  				<label><span id="saveandprint" class="btn btn-secondary">  <input type="checkbox" name="isprint" value="YES" checked> <i class="glyphicon glyphicon-print"></i> พิมพ์ใบเสร็จรับเงิน</span></label>
  			</div>
  		</div>
  	</div>
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">

sumtotal();

$("#myModal0").on("hidden.bs.modal", function () {
    // location.reload();
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

$(function() {
	var diff ;
	$.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
	$('#bookedDate').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y H:i',
		lang:'th',
	});
  /*
	$('#checkinDate').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y H:i',
		lang:'th',
	});

	$('#checkOutDate').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y H:i',
		lang:'th',
	});

	// start checkinDate form  bookedDate
	$('#bookedDate').on('change',function(){
		var startDate = $('#bookedDate').val();
		var expoldeY= startDate.split(' ');
		$( "#checkinDate" ).datetimepicker({
			minDate: expoldeY[0].split('/')[2]+'-'+expoldeY[0].split('/')[1]+'-'+expoldeY[0].split('/')[0],
		});
	});

	$('#checkinDate').on("change",function() {
		var startDate = $('#checkinDate').val();
		var expoldeY= startDate.split(' ');
		$( "#checkOutDate" ).datetimepicker({
			minDate: expoldeY[0].split('/')[2]+'-'+expoldeY[0].split('/')[1]+'-'+expoldeY[0].split('/')[0],
		});
	});

	$('#checkOutDate').on("change",function() {
		var startDate = $('#bookedDate').val();
		var expoldeY= startDate.split(' ');
		$( "#checkinDate" ).datetimepicker({
			minDate: expoldeY[0].split('/')[2]+'-'+expoldeY[0].split('/')[1]+'-'+expoldeY[0].split('/')[0],
		});
	}); 
  */
});

    function calculateDay() {
      // คำนวนวันที่ count day
      var startDate = $('#checkinDate').val();
      var dateStart= startDate.split(' ');
      var d1 = new Date(dateStart[0].split('/')[2]+'-'+dateStart[0].split('/')[1]+'-'+dateStart[0].split('/')[0]);

      var endDate = $('#checkOutDate').val();
      var dateEnd= endDate.split(' ');
      var d2 = new Date(dateEnd[0].split('/')[2]+'-'+dateEnd[0].split('/')[1]+'-'+dateEnd[0].split('/')[0]);

          diff = 0;
          if (d1 && d2) {
            diff = diff + Math.floor(( (d2.getTime()) - (d1.getTime()) ) / 86400000); // ms per day
          }
          
          return diff;
    }

    $('#vat, #discount, #cashPledge, #pay').on("keyup",function() {
    	sumtotal();
    });

    $('#cashPledge').on("keyup",function() {
    	var val = $(this).val(); 
    	$("#deposit").val(val);  //ให้ไปแสดงใน ช่องคำนวน(แสดงเฉย ๆ เพราะ นำcashPledge ข้างบนไปคิด)

    	sumtotal();
    });

    $('.bookedType').on("change",function() {
      var cin = $('#checkinDate').val();  // เก็บค่าวันที่ Checkin

      if($(this).val()=='SHORT'){
        // ถ้าเลือกเป็นชั่วคราว  ใส่ค่า Checkout เท่ากับวัน Checkin
        $('#checkOutDate').val(cin);

      }else if($(this).val()=='MONTH'){
        // ถ้าเลือกเป็นรายเดือน เดือน  ต้องบวกวัน Checkout เป็นวันที่นั้น ของเดือนถัดไป 
        var year = cin[6]+cin[7]+cin[8]+cin[9];
        var month = cin[3]+cin[4];
        var day = cin[0]+cin[1];
        var out = calendarAddMonth(year+'-'+month+'-'+day,1); 
        $('#checkOutDate').val(out+ ' 12:00');

      }else{
        var old = $('#checkOutDate_old').val();
        $('#checkOutDate').val(old); 
      }

    	sumtotal(); 

    });

    function calendarAddMonth(dateStr, month){  
      //Create date object from input date
      var date = new Date(dateStr);   
      //Add month
      date.setMonth(date.getMonth()+month); 

      var m = date.getMonth()+1; 
      if(m < 10){
        var valm = '0'+m;
      }else{
        var valm = m;
      }

      var d = date.getDate();
      if(d < 10){
        var vald = '0'+d;
      }else{
        var vald = d;
      }
      return vald+"/"+valm+"/"+date.getFullYear();
    } 



    function sumtotal(){
    	var totalsum    = 0;
    	var priceshort  = 0;
    	var priceday    = 0;
    	var pricemonth  = 0;
    	var totalprice  = 0;
    	var totalamount = 0;
    	var totalsum    = 0;

    	$('.roomSelect').each(function(i,n){
    		priceshort = priceshort + parseInt($(n).data('priceshort'));
    		priceday   = priceday + parseInt($(n).data('priceday'));
    		pricemonth = pricemonth + parseInt($(n).data('pricemonth'));
    	});



      var diff = calculateDay(); // หาจำนวนวัน 
    	// เช่าแบบ * จำนวนวัน
    	if($('.bookedType:checked').val()=='SHORT'){
    		totalsum = priceshort;
    	}else if($('.bookedType:checked').val()=='DAY'){
    		totalsum = priceday * diff;
    	}else if($('.bookedType:checked').val()=='MONTH'){
    		totalsum = pricemonth;
    	} 
      //  alert('priceshort='+priceshort+' priceday='+priceday+' pricemonth='+pricemonth);

      var vat = $('#vat').val()!="" ? parseInt($('#vat').val()):0;
      var pay = $('#pay').val()!="" ? parseInt($('#pay').val()):0;
      var discount = $('#discount').val()!="" ? parseInt($('#discount').val()):0; // ส่วนลด
      var cashPledge = $('#cashPledge').val()!="" ? parseInt($('#cashPledge').val()):0;  // เงินมัดจำ
      var last=0;

      if(vat > 0){
      	var to = totalsum > 0 ? totalsum:1;
        last = cashPledge+totalsum+((to/100)*vat); // เงินมัดจำ + ยอดรวมค่าห้อง  + Vat
        $('#lastamount').val(parseInt(last).toFixed(2));

      }else{
      	$('#lastamount').val(parseInt(totalsum+cashPledge).toFixed(2));
      }

      var dis = (parseInt(discount)+parseInt(pay))-last;

      $('#change').val(dis.toFixed(2));

    }

  </script>





