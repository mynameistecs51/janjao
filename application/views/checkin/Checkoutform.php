<link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet"> 
<input type="hidden" name="bookedID" id="bookedID" value="<?php echo $checkinDtl['bookedID']; ?>"> 

<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">  
  		<div class="form-group">
  			<label for="selectRoom" class="col-lg-2 control-label">ห้องที่เลือก</label>
  			<div class="col-lg-10 ">
  				<div class="row">
  					<?php foreach ($checkinRoomDtl as $crd) {?>
  					<div class="col-lg-1" style="margin-right:20px;">
  						<span class="button-checkbox ">
  							<button type="button" class="btn btn_room btn-danger btn-xs" data-color="danger" disabled >
  								<i class="fa fa-bed" aria-hidden="true"></i>
  								<h4><?php echo 'Room ' . $crd['roomID']; ?></h4>
  							</button>
  						</span>
  					</div>
  					<input type="hidden" name="bookedroomID[]" value="<?php echo $crd['bookedroomID']; ?>">
  					<input type="hidden" name="roomID[]" value="<?php echo $crd['roomID']; ?>">
  					<?php }?>
  				</div>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="idcardno" class="col-lg-2 control-label">เลขประจำประชาชน <b style="color: #FF0000">*</b></label>
  			<div class="col-sm-8">
  				<input type="text" class="form-control" name="idcardno" id="idcardno" placeholder="เลขประจำประชาชน/ Passport No" value="<?php echo $checkinDtl['idcardno'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="gender" class="col-sm-2 control-label">เพศ</label>
  			<div class="col-sm-8" >
  				<label><b class="btn btn-success btn-md"><input type="radio" name="gender" id="gender" value="MALE" class="control-label" <?php echo $checkinDtl['titleName'] == 'MALE' ? 'checked' : ''; ?> disabled> ชาย</b></label>
  				&nbsp;&nbsp;&nbsp;
  				<label><b class="btn btn-warning btn-md"><input type="radio" name="gender" id="gender" value="FEMALE" class="control-label" <?php echo $checkinDtl['titleName'] == 'FEMALE' ? 'checked' : ''; ?> disabled>  หญิง</b></label>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="gender" class="col-sm-2 control-label">ชื่อ-สกุล <b style="color: #FF0000">*</b></label>
  			<div class="col-sm-4">
  				<input type="text" class="form-control" id="firstName" name="firstName" placeholder="ชื่อ" value="<?php echo $checkinDtl['firstName'] ?>" readonly>
  			</div>
  			<div class="col-sm-4">
  				<input type="text" class="form-control" id="lastName" name="lastName" placeholder="นามสกุล" value="<?php echo $checkinDtl['lastName'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="birthDate" class="col-sm-2 control-label">วัน เดือน ปี เกิด</label>
  			<div class="col-sm-8">
  				<div class="row">
  					<div class="col-sm-2">
  						<select class="form-control" name="birthdate_d" disabled>
  							<option value="01" <?php echo $checkinDtl['birthdate_d'] == '01' ? 'selected' : ''; ?>>01</option>
  							<option value="02" <?php echo $checkinDtl['birthdate_d'] == '02' ? 'selected' : ''; ?>>02</option>
  							<option value="03" <?php echo $checkinDtl['birthdate_d'] == '03' ? 'selected' : ''; ?>>03</option>
  							<option value="04" <?php echo $checkinDtl['birthdate_d'] == '04' ? 'selected' : ''; ?>>04</option>
  							<option value="05" <?php echo $checkinDtl['birthdate_d'] == '05' ? 'selected' : ''; ?>>05</option>
  							<option value="06" <?php echo $checkinDtl['birthdate_d'] == '06' ? 'selected' : ''; ?>>06</option>
  							<option value="07" <?php echo $checkinDtl['birthdate_d'] == '07' ? 'selected' : ''; ?>>07</option>
  							<option value="08" <?php echo $checkinDtl['birthdate_d'] == '08' ? 'selected' : ''; ?>>08</option>
  							<option value="09" <?php echo $checkinDtl['birthdate_d'] == '09' ? 'selected' : ''; ?>>09</option>
  							<option value="10" <?php echo $checkinDtl['birthdate_d'] == '10' ? 'selected' : ''; ?>>10</option>
  							<option value="11" <?php echo $checkinDtl['birthdate_d'] == '11' ? 'selected' : ''; ?>>11</option>
  							<option value="12" <?php echo $checkinDtl['birthdate_d'] == '12' ? 'selected' : ''; ?>>12</option>
  							<option value="13" <?php echo $checkinDtl['birthdate_d'] == '13' ? 'selected' : ''; ?>>13</option>
  							<option value="14" <?php echo $checkinDtl['birthdate_d'] == '14' ? 'selected' : ''; ?>>14</option>
  							<option value="15" <?php echo $checkinDtl['birthdate_d'] == '15' ? 'selected' : ''; ?>>15</option>
  							<option value="16" <?php echo $checkinDtl['birthdate_d'] == '16' ? 'selected' : ''; ?>>16</option>
  							<option value="17" <?php echo $checkinDtl['birthdate_d'] == '17' ? 'selected' : ''; ?>>17</option>
  							<option value="18" <?php echo $checkinDtl['birthdate_d'] == '18' ? 'selected' : ''; ?>>18</option>
  							<option value="19" <?php echo $checkinDtl['birthdate_d'] == '19' ? 'selected' : ''; ?>>19</option>
  							<option value="20" <?php echo $checkinDtl['birthdate_d'] == '20' ? 'selected' : ''; ?>>20</option>
  							<option value="21" <?php echo $checkinDtl['birthdate_d'] == '21' ? 'selected' : ''; ?>>21</option>
  							<option value="22" <?php echo $checkinDtl['birthdate_d'] == '22' ? 'selected' : ''; ?>>22</option>
  							<option value="23" <?php echo $checkinDtl['birthdate_d'] == '23' ? 'selected' : ''; ?>>23</option>
  							<option value="24" <?php echo $checkinDtl['birthdate_d'] == '24' ? 'selected' : ''; ?>>24</option>
  							<option value="25" <?php echo $checkinDtl['birthdate_d'] == '25' ? 'selected' : ''; ?>>25</option>
  							<option value="26" <?php echo $checkinDtl['birthdate_d'] == '26' ? 'selected' : ''; ?>>26</option>
  							<option value="27" <?php echo $checkinDtl['birthdate_d'] == '27' ? 'selected' : ''; ?>>27</option>
  							<option value="28" <?php echo $checkinDtl['birthdate_d'] == '28' ? 'selected' : ''; ?>>28</option>
  							<option value="29" <?php echo $checkinDtl['birthdate_d'] == '29' ? 'selected' : ''; ?>>29</option>
  							<option value="30" <?php echo $checkinDtl['birthdate_d'] == '30' ? 'selected' : ''; ?>>30</option>
  							<option value="31" <?php echo $checkinDtl['birthdate_d'] == '31' ? 'selected' : ''; ?>>31</option>
  						</select>
  					</div>
  					<div class="col-sm-4">
  						<select class="form-control" name="birthdate_m" disabled>
  							<option value="01" <?php echo $checkinDtl['birthdate_m'] == '01' ? 'selected' : ''; ?>>มกราคม</option>
  							<option value="02" <?php echo $checkinDtl['birthdate_m'] == '02' ? 'selected' : ''; ?>>กุมภาพันธ์</option>
  							<option value="03" <?php echo $checkinDtl['birthdate_m'] == '03' ? 'selected' : ''; ?>>มีนาคม</option>
  							<option value="04" <?php echo $checkinDtl['birthdate_m'] == '04' ? 'selected' : ''; ?>>เมษายน</option>
  							<option value="05" <?php echo $checkinDtl['birthdate_m'] == '05' ? 'selected' : ''; ?>>พฤษภาคม</option>
  							<option value="06" <?php echo $checkinDtl['birthdate_m'] == '06' ? 'selected' : ''; ?>>มิถุนายน</option>
  							<option value="07" <?php echo $checkinDtl['birthdate_m'] == '07' ? 'selected' : ''; ?>>กรกฎาคม</option>
  							<option value="08" <?php echo $checkinDtl['birthdate_m'] == '08' ? 'selected' : ''; ?>>สิงหาคม</option>
  							<option value="09" <?php echo $checkinDtl['birthdate_m'] == '09' ? 'selected' : ''; ?>>กันยายน</option>
  							<option value="10" <?php echo $checkinDtl['birthdate_m'] == '10' ? 'selected' : ''; ?>>ตุลาคม</option>
  							<option value="11" <?php echo $checkinDtl['birthdate_m'] == '11' ? 'selected' : ''; ?>>พฤศจิกายน</option>
  							<option value="12" <?php echo $checkinDtl['birthdate_m'] == '12' ? 'selected' : ''; ?>>ธันวาคม</option>
  						</select>
  					</div>
  					<div class="col-sm-2">
  						<select class="form-control" name="birthdate_y" disabled>
  							<?php
  							$y = $this->packfunction->yearnow() + 543;
  							for ($i = 0; $i < 80; $i++) {
  								if ($checkinDtl['birthdate_y'] == $y) {
  									echo '<option value="' . $y . '" selected>' . $y . '</option> ';
  								} else {
  									echo '<option value="' . $y . '">' . $y . '</option> ';
  								}
  								$y--;
  							}
  							?>
  						</select>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="addDress" class="col-sm-2 control-label">ที่อยู่</label>
  			<div class="col-sm-8">
  				<textarea name="address" id="address" class="form-control" placeholder="" readonly><?php echo $checkinDtl['address'] ?></textarea>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="mobile" class="col-sm-2 control-label">เบอร์มือถือ</label>
  			<div class="col-sm-8">
  				<input type="text" class="form-control" id="mobile" name="mobile"  placeholder="082-2222222" value="<?php echo $checkinDtl['mobile'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="carNumber" class="col-sm-2 control-label">ทะเบียนรถ</label>
  			<div class="col-sm-8">
  				<input type="text" class="form-control" name="licenseplate" id="licenseplate" placeholder="1กก 1111" value="<?php echo $checkinDtl['licenseplate'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="email" class="col-sm-2 control-label">อีเมลล์</label>
  			<div class="col-sm-8">
  				<input type="email" class="form-control" id="email" name="email" placeholder="name@domain.com" value="<?php echo $checkinDtl['email'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="bookedDate" class="col-sm-2 control-label">วันที่ จอง <b style="color: #FF0000">*</b></label>
  			<div class="col-sm-8">
  				<input type="text" class="form-control" id="bookedDate" name="bookedDate" value="<?php echo $checkinDtl['bookedDate'] ?>" readonly>
  			</div>
  		</div>
  		<div class="form-group">
  			<label for="checkinDate" class="col-sm-2 control-label">วันที่ Checkin <b style="color: #FF0000">*</b></label>
  			<div class="col-sm-8">
  				<input type="text" class="form-control" id="checkinDate" name="checkinDate" value="<?php echo $checkinDtl['checkinDate'] ?>" readonly>
  			</div>
	 	</div>
	
		<div class="form-group">
			<label for="bookedType" class="col-sm-2 control-label">เช่าแบบ <b style="color: #FF0000">*</b></label>
			<div class="col-sm-8">
				<label><b class="btn btn-info btn-md"> <input type="radio" name="bookedType" id="SHORT" value="SHORT" class="control-label" <?php echo $checkinDtl['bookedType'] == 'SHORT' ? 'checked' : ''; ?> disabled>  ชั่วคราว</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><b class="btn btn-warning btn-md"> <input type="radio" name="bookedType" id="DAY" value="DAY" class="control-label" <?php echo $checkinDtl['bookedType'] == 'DAY' ? 'checked' : ''; ?>  disabled>  รายวัน</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><b class="btn btn-primary btn-md"> <input type="radio" name="bookedType" id="MONTH" value="MONTH" class="control-label" <?php echo $checkinDtl['bookedType'] == 'MONTH' ? 'checked' : ''; ?> disabled>  รายเดือน</b></label>
			</div>
		</div>
		<div class="form-group">
			<label for="deposit" class="col-sm-2 control-label">เงินมัดจำ <b style="color: #FF0000">*</b></label>
			<div class="col-sm-8">
				<div class="input-group">
					<input type="text" class="form-control" id="cashPledge" name="cashPledge" placeholder="300" value="<?php echo $checkinDtl['cashPledge'] ?>" readonly>
					<span class="input-group-addon">บาท</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="is_breakfast" class="col-sm-2 control-label">อาหารเช้า</label>
			<div class="col-sm-8">
				<label><b class="btn btn-danger btn-md"> <input type="radio" name="is_breakfast" id="breakfast0" value="NO" class="control-label" <?php echo $checkinDtl['is_breakfast'] == 'NO' ? 'checked' : ''; ?> disabled> ไม่รับอาหารเช้า</b></label>
				&nbsp;&nbsp;&nbsp;
				<label><b class="btn btn-success btn-md"> <input type="radio" name="is_breakfast" id="breakfast1" value="YES" class="control-label" <?php echo $checkinDtl['is_breakfast'] == 'YES' ? 'checked' : ''; ?> disabled> รับอาหารเช้า</b></label>
			</div>
		</div>
		<div class="form-group">
			<label for="deposit" class="col-sm-2 control-label">Comment</label>
			<div class="col-sm-8">
				<textarea name="comment" id="comment" class="form-control"><?php echo $checkinDtl['comment']; ?></textarea>
			</div>
		</div>
		<?php if ($checkinDtl['idcardnoPath'] != "") {?>
		<div class="form-group">
			<label for="imgbadge" class="col-sm-2 control-label">บัตร</label>
			<div class="col-sm-8">
				<img src="<?php echo base_url() . "assets/images/imgcard/" . $checkinDtl['idcardnoPath']; ?>"  id="imgbadge" width="260" height="195" style="margin-top:0px;"></img>
			</div>
		</div> 
		<?php }?> 
		<div class="form-group">
			<hr>
		</div>
		<div class="form-group"> 
			<label for="checkOutDate" class="col-sm-2 control-label">วันที่ Checkout <b style="color: #FF0000">*</b></label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="checkOutDate" name="checkOutDate" value="<?php echo $checkinDtl['checkOutDate'] ?>">
			</div>
		</div> 

		<div class="form-group">
			<label for="idcardno" class="col-lg-2 control-label">รายการที่ชำระเพิ่ม <b style="color: #FF0000">*</b></label>
			<div class="col-lg-8">
				<table id="servicelist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
				<thead>
					<tr>
						<th style="text-align: center;width: 40px;">No.</th>
						<th style="text-align: center;">NAME </th>
						<th style="text-align: center;width:  80px;">PRICE</th>
						<th style="text-align: center;width:  80px;">UNIT</th>
						<th style="text-align: center;width:  80px;">AMOUNT</th>
						<th style="text-align: center;width:  120px;">TOTAL</th>  
						<th style="text-align: center;width:  50px;">#</th>
					</tr>
				</thead>
				<tbody> 
					<?php 
					$totalprice = 0.00; $totalamount = 0.00; $totalsum = 0.00;
					$n = 1;
					if(count($serviceDtl)>0){ ?>
					<?php foreach ($serviceDtl as $rs) {  ?>
						<tr id="<?php echo $n; ?>">
							<td><?php echo $n; ?></td>
							<td><input type="text" name="serviceName[]" class="form-control servicename" id="servicename<?php echo $n; ?>" placeholder="ผ้าห่ม" value="<?php echo $rs['serviceName']; ?>" required></td>
							<td><input type="text" name="price[]" class="form-control price" id="price<?php echo $n; ?>" placeholder="0.00"  value="<?php echo $rs['price']; ?>" required></td>
							<td><input type="text" name="unit[]" class="form-control unit" id="unit<?php echo $n; ?>" placeholder="ผืน"  value="<?php echo $rs['unit']; ?>" required></td>
							<td><input type="text" name="amount[]" class="form-control amount" id="amount<?php echo $n; ?>" placeholder="0"  value="<?php echo $rs['amount']; ?>" required></td>
							<td><input type="text" name="total[]" class="form-control total" id="total<?php echo $n; ?>"  placeholder="0.00" value="<?php echo number_format($rs['price']*$rs['amount'],2); ?>" required readonly></td>
							<td><span class="btn btn-danger btn-xs delrow" id="delrow<?php echo $n; ?>" ><i class="fa fa-trash-o fa-2x"></i></span></td>
						</tr>
					<?php 
						$totalprice += $rs['price']; 
						$totalamount += $rs['amount']; 
						$totalsum += ($rs['price']*$rs['amount']);
					?>
					<?php $n++; } ?>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr align="right">
						<td colspan="2" > Total :</td> 
						<td><span id="totalprice"><?php echo number_format($totalprice,2); ?></span></td>
						<td></td>
						<td><span id="totalamount"><?php echo number_format($totalamount); ?></span></td>
						<td><span id="totalsum"><?php echo number_format($totalsum,2); ?></span></td>
						<td></td>
					</tr>
				</tfoot>
				</table>
				<span class="btn btn-primary btn-sm " id="addrows"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ </span>
			</div>
			</div>  
		</div> 
		<div class="form-group" align="right"> 
			<label for="idcardno" class="col-lg-2 control-label"></label>
			<div class="col-lg-8">
				<div class="col-lg-6">ภาษีมูลค่าเพิ่ม</div><div class="col-lg-5"><input type="text" name="vat" id="vat" class="form-control" value="7" style="text-align: right;height: 28px;"></div><div class="col-lg-1">%</div>
				<div class="col-lg-12" style="height: 5px;"></div>
				<div class="col-lg-6">ยอดสุทธิ</div><div class="col-lg-5"><input type="text" name="lastamount" id="lastamount"  class="form-control" value="<?php echo number_format($totalsum,2); ?>" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
			 	<div class="col-lg-12" style="height: 5px;"></div>
				<div class="col-lg-6">ส่วนลด</div><div class="col-lg-5"><input type="text" name="discount" id="discount" class="form-control" value="0.00" style="text-align: right;height: 28px;"></div><div class="col-lg-1">บาท</div>
				<div class="col-lg-12" style="height: 5px;"></div> 
				<div class="col-lg-6">เงินมัดจำ</div><div class="col-lg-5"><input type="text" name="deposit" id="deposit"  class="form-control" value="<?php //echo $checkinDtl['cashPledge']; ?>200.00" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
				<div class="col-lg-12" style="height: 5px;"></div>
				<div class="col-lg-6">รับเงิน</div><div class="col-lg-5"><input type="text" name="pay" id="pay" class="form-control" value="0.00" style="text-align: right;height: 28px;"></div><div class="col-lg-1">บาท</div>
				<div class="col-lg-12" style="height: 5px;"></div>
				<div class="col-lg-6">เงินทอน</div><div class="col-lg-5"><input type="text" name="change" id="change" class="form-control" value="0.00" style="text-align: right;height: 28px;" readonly></div><div class="col-lg-1">บาท</div>
			</div>
			<label for="idcardno" class="col-lg-2 control-label"></label>
		</div> 



		<div class="form-group" align="center">
			<div class="col-lg-12"><br><br><br>
				<label><span id="saveandprint" class="btn btn-secondary">  <input type="checkbox" name="isprint" value="YES" checked> <i class="glyphicon glyphicon-print"></i> พิมพ์ใบเสร็จรับเงิน</span></label>
			</div>
		</div>
</div> 
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$(function() {  
		$('#servicelist tbody tr').each(function(i,n){
			var val = $(n).attr('id'); 
			removerow(val);
			chnrowval(val);
		});

		$.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ. 
		$('#checkOutDate').datetimepicker({
			timepicker:true,
			mask:true,
			format:'d/m/Y H:i',
			lang:'th',
		});
	});  



  	function confirmvalid(){
  		if($('#servicelist tbody tr').length==0){
  			alert('กรุณาเลือก เพิ่มรายการ !');
  			return false;
  		}else{
  			return true;
  		}
  		
  	} 

	$('#addrows').on("click",function() {
		var max = 0; 
        $('#servicelist tbody tr').each(function(i,n){  
          var val = $(n).attr('id'); 
          var id = parseInt(val);
          if(id > max){ max = id; } 
        });
        var n = max+1;

		var html = '';
			html += '<tr id="'+n+'">';
			html += '<td>'+n+'</td>';
			html += '<td><input type="text" name="serviceName[]" class="form-control servicename" id="servicename'+n+'" placeholder="ผ้าห่ม" value="" required></td>';
			html += '<td><input type="text" name="price[]" class="form-control price" id="price'+n+'" placeholder="0.00"  value="" required></td>';
			html += '<td><input type="text" name="unit[]" class="form-control unit" id="unit'+n+'" placeholder="ผืน"  value="" required></td>';
			html += '<td><input type="text" name="amount[]" class="form-control amount" id="amount'+n+'" placeholder="0"  value="" required></td>';
			html += '<td><input type="text" name="total[]" class="form-control total" id="total'+n+'"  placeholder="0.00" value="" required readonly></td>';
			html += '<td><span class="btn btn-danger btn-xs " id="delrow'+n+'" ><i class="fa fa-trash-o fa-2x"></i></span></td>';
			html += '</tr>';
			$('#servicelist tbody').append(html);
			removerow(n);
			chnrowval(n);

	});

	function removerow(n){
		$('#delrow'+n).on("click",function() {
			if(confirm("ยืนยันการลบรายการ !")==true){
				$('#servicelist tbody tr#'+n).remove();
				sumtotal();
			} 
		});
	}

	function chnrowval(n){
		$('#price'+n+', #amount'+n).on("change",function() { 
			var price = $('#price'+n).val()!="" ? $('#price'+n).val():0;
			var amount = $('#amount'+n).val()!="" ? $('#amount'+n).val():0;
			var sum = parseInt(price)*parseInt(amount);
			$('#total'+n).val(sum.toFixed(2));
			sumtotal();
		});
	}

	$('#vat, #discount, #pay').on("keyup",function() {
		sumtotal();
	});

	function sumtotal(){
		var totalprice = 0; 
		var totalamount = 0; 
		var totalsum = 0;
		$('#servicelist tbody tr').each(function(i,n){
			var id = $(n).attr('id'); 
			var price = $('#price'+id).val()!="" ? $('#price'+id).val():0;
			var amount = $('#amount'+id).val()!="" ? $('#amount'+id).val():0;
			var total = $('#total'+id).val()!="" ? $('#total'+id).val():0; 
			totalprice += parseInt(price);
			totalamount += parseInt(amount);
			totalsum += parseInt(total);
		}); 
		$('#totalprice').html(totalprice.toFixed(2));
		$('#totalamount').html(totalamount);
		$('#totalsum').html(totalsum.toFixed(2));
		var vat = $('#vat').val()!="" ? $('#vat').val():0;
		var pay = $('#pay').val()!="" ? $('#pay').val():0;
		var discount = $('#discount').val()!="" ? $('#discount').val():0;
		var deposit = $('#deposit').val()!="" ? $('#deposit').val():0;

		var last =0
		if(vat > 0){
      var to = totalsum > 0 ? totalsum:1;
			last = totalsum+((to/100)*vat); 
			$('#lastamount').val(last.toFixed(2));
		}else{
			$('#lastamount').val(totalsum.toFixed(2));
		} 

		var dis = (parseInt(discount)+parseInt(deposit)+parseInt(pay))-last;
		$('#change').val(dis.toFixed(2));

	}
	

 
</script>