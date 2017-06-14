
<div class="col-sm-12 ">
	<div class="col-sm-3">	</div>
	<div class="col-sm-6">

		<table width="100%" border='1' border-color="#fff"  id="example" >
			<caption >
				<table width="100%" >
					<tr>
						<td class="col-sm-4" style="width: 30%;"></td>
						<td class="col-sm-4" align="center"> <b>ใบเสร็จรับเงิน </b></td>
						<td class="col-sm-4" style="width: 30%;"></td>
					</tr>
					<tr>
						<td class="col-sm-3" colspan="2"  style="widows: 100%;text-align: left;">
							จันทร์เจ้า โฮเทล <br>
							666 หมู่ 6	ถ.โพนพิสัย ต.หมากแข้ง 	อ.เมือง จ.อุดรธานี 41000 <br>
							โทร 0910571616 <br>
							หมายเลขผู้เสียภาษี  111111111111
						</td>
						<td class="col-sm-3 " style="widows: 100%;text-align: right;">
							<label > ต้นฉบับ</label>
							<br>
							<label style="width: 40%;padding-left: 0px;text-align: left;">เลขที่ </label>
							<label style="padding-right: 0%;text-align: right;"> 123456789</label>
							<br>
							<label style="width: 40%;padding-left: 0px;text-align: left;">วันที่ </label>
							<label style="padding-right: 0%;text-align: right;"><?php echo date('d-m-y'); ?></label>
							<br>
							<label style="width: 40%;padding-left: 0px;text-align: left;">ออกโดย </label>
							<label style="padding-right: 0%;text-align: right;">Administrator</label>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<span><b>ชื่อลูกค้า</b>   ไชยวัฒน์ ไชยวัฒน์</span>
							<br>
							<span><b>ที่อยู่</b> 	ราชภัฏอุดรธานี</span>
						</td>
					</tr>
				</table>
			</caption>
			<thead>
				<tr   style="background:#E6E6E6">
					<th>ที่</th>
					<th>รายการ</th>
					<th>จำนวน</th>
					<th>หน่วยละ</th>
					<th>จำนวนเงิน</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>ห้อง 202</td>
					<td>ห้องเตียงคู่</td>
					<td>500 Bath.</td>
					<td>500 Bath.</td>
				</tr>
				<tr>
					<td>2</td>
					<td>ห้อง 203</td>
					<td>ห้องเตียงเดี่ยว</td>
					<td>500 Bath.</td>
					<td>500 Bath.</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="center">รวม</td>
					<td >1000 Bath.</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<div class="col-sm-12">
	<div class="col-sm-5"></div>
	<p class="text-center">
		<button class="btn btn-primary btn_print"><span class="fa fa-print"> ปริ๊น</span></button>
	</p>
</div>
<script type="text/javascript">
	// var data = document.getElementById('example');
	// newWin = window.open("");
	// newWin.document.write(data.outerHTML);
	// newWin.print();
	// newWin.close();
</script>