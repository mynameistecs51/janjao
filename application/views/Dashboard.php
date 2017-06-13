<!-- Page Name -->
<div class="col-lg-2">
	<i style="font-size: 15px;"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $topPageName; ?> </i>
</div>
<div class="col-lg-10 search-top" align="right">
	<div class="sh-right">
		<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>event/search/">
			<button  type="submit" class="btn btn-primary" style="float: right;">Search</button>
			CheckIn Date :
			<input type="text" class="form-control"  id="keyword" style="width: 138px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $this->packfunction->dtcheckin() ?>">
			CheckOut Date :
			<input type="text" class="form-control"  id="keyword" style="width: 138px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $this->packfunction->dtcheckout() ?>">
			Room Type :
			<select class="form-control" style="width: 120px;margin-right: 10px;">
				<option value="STANDARD" selected>STANDARD</option>
				<option value="VIP">VIP</option>
			</select>
			Status :
			<select class="form-control" style="width: 120px;margin-right: 10px;">
				<option value="ALL" selected>ALL</option>
				<option value="EMPTY">EMPTY</option>
				<option value="BOOKED">BOOKED</option>
				<option value="CHECKIN">CHECKIN</option>
				<option value="CHECKIN">CHECKOUT</option>
				<option value="CLEANING">CLEANING</option>
			</select>
		</form>
	</div>
</div>
<hr class="bd-header">
<!-- Page Content -->
<div class="col-lg-6" style="font-size: 16px;margin-bottom: 15px;">
	<i class="btn btn-warning btn-sm">&nbsp;&nbsp;</i> จอง,
	<i class="btn btn-danger btn-sm" disabled>&nbsp;&nbsp;</i> เข้าพัก,
	<i class="btn btn-success btn-sm">&nbsp;&nbsp;</i> กำลังทำความสะอาด,
	<i class="btn btn-default btn-sm">&nbsp;&nbsp;</i> ว่าง
</div>
<div class="col-lg-6" style="font-size: 16px;margin-bottom: 15px;" align="right">
	<span class="btn btn-warning btm-sm"><i class="state-icon glyphicon glyphicon-check"></i> BOOKING</span>
	<span class="btn btn-danger btm-sm btn_checkin"><i class="state-icon glyphicon glyphicon-check"></i> CHECKIN</span>
</div>

<div class="col-lg-12">
	<h3 >FLOOR 2 </h3>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"   style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>202</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room202" value="room202" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>204</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room204" value="room204" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>206 VIP</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room206" value="room206" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>208 VIP</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room208" value="room208" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>210 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='0' id="room210" value="room210" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>212 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='0' id="room212" value="room212" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>214 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room214" value="room214" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="success" style="width:120px;" >
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>216 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="room216" value="room216" checked disabled />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox " >
				<button type="button" class="btn btn_room" data-color="warning" style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>218 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="room218" value="room218" checked disabled />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox " >
				<button type="button" class="btn btn_room" data-color="warning" style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>220 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="room220" value="room220" checked disabled />
			</span>
		</div>

	</div>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>201 </h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room201" value="room201" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>203</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room203" value="room203" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>205 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room205" value="room205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>207 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room207" value="room207" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>209 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room209" value="room209" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>211 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room211" value="room211" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">

		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>215 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room215" value="room215" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>217 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room217" value="room217" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>219 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room219" value="room219" />
			</span>
		</div>

	</div>
</div>

<div class="col-lg-12">
	<h3 >FLOOR 3 </h3>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>302 </h4><i>out:15/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room302" value="room302" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>304</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room304" value="room304" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>306 VIP</h4><i>out:15/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room306" value="room306" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>308 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room308" value="room308" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>310 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room310" value="room310" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>312 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room312" value="room312" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>314 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room314" value="room314" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>316 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room316" value="room316" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>318 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room318" value="room318" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>320 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room320" value="room320" />
			</span>
		</div>

	</div>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>301 </h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room301" value="room301" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>303</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room303" value="room303" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>305 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room305" value="room205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>307 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room307" value="room307" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>309 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room309" value="room309" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>311 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room311" value="room311" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">

		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>315 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room315" value="room315" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>317 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room317" value="room317" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>319 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room319" value="room319" />
			</span>
		</div>

	</div>
</div>

<div class="col-lg-12">
	<h3 >FLOOR 4 </h3>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>402 </h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room402" value="room402" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>404</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room404" value="room404" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>406 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room406" value="room406" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>408 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room408" value="room408" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>410 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room410" value="room410" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>412 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room412" value="room412" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>414 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room414" value="room414" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>416 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room416" value="room416" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>418 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room418" value="room418" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>320 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room320" value="room320" />
			</span>
		</div>

	</div>
</div>
<div class="col-lg-12">
	<div class=" col-sm-12 text-center"  >
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i><i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>401 </h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room401" value="room401" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>403</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room403" value="room403" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>405 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room405" value="room205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>407 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room407" value="room407" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>409 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room409" value="room409" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>411 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room411" value="room411" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">

		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>415 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room415" value="room415" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>417 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room417" value="room417" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>419 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" data-status='1' id="room419" value="room419" />
			</span>
		</div>

	</div>
</div>
<div class="div_modal"> <!-- show modal checkinform --> </div>
<script type="text/javascript">
	$(function(){
		var selectRoom =[];
		$('.button-checkbox > .check_room').on('change',function(){

			var numCheck = $(this).is(':checked')?$(this).val():'';
			selectRoom.push(numCheck);
		});
		$('.btn_checkin').click(function(){
			load_page('<?php echo base_url()."/home/CheckinForm/"; ?>','.:: Data Checkin::.','#');
			// console.log(selectRoom.filter(String));
		});
	});


	function load_page(loadUrl,texttitle,urlsend){
		var screenname= texttitle;
		var url = loadUrl;
		var n=0;
		$('.div_modal').html('');
		modal_form(n,screenname,urlsend);
		$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
		var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
		modal.on('show.bs.modal', function () {
			modalBody.load(url);
		}).modal({backdrop: 'static',keyboard: true});
		setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
	}

	function modal_form(n,screenname,url)
	{
		var div='';
		div+='<form action="'+url+'"  role="form" data-toggle="validator" id="form" method="post" enctype="multipart/form-data">';
		div+='<!-- Modal -->';
		div+='<div class="modal modal-wide fade" id="myModal'+n+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		div+='<div class="modal-dialog" style="width:90%;">';
		div+='<div class="modal-content">';
		div+='<div class="modal-header bg-primary" style="color:#FFFFFF;">';
		div+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
		div+='<h4 class="modal-title">'+screenname+'</h4>';
		div+='</div>';
		div+='<div class="modal-body">';
		div+='</div>';
		div+='<div class="modal-footer" style="text-align:center; background:#F6CECE;">';
		div+='<button type="submit" id="save" class="btn btn-modal"><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
		div+='<button type="reset" class="btn btn-modal" data-dismiss="modal"><span class="   glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
		div+='</div>';
		div+='</div><!-- /.modal-content -->';
		div+='</div><!-- /.modal-dialog -->';
		div+='</div><!-- /.modal -->';
		div+='</form>';
		$('.div_modal').html(div);
	}



        // status ckecked button room //
        $(function () {
        	$('.button-checkbox').each(function () {

            // Settings
            var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
            	on: {
            		icon: 'glyphicon glyphicon-check'
            	},
            	off: {
            		icon: 'glyphicon glyphicon-unchecked'
            	}
            };

            // Event Handlers
            $button.on('click', function () {
            	$checkbox.prop('checked', !$checkbox.is(':checked'));
            	$checkbox.triggerHandler('change');
            	updateDisplay();
            });
            $checkbox.on('change', function () {
            	updateDisplay();
            });

            // Actions
            function updateDisplay() {
            	var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $button.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                	$button
                	.removeClass('btn-default')
                	.addClass('btn-' + color + ' active');
                }
                else {
                	$button
                	.removeClass('btn-' + color + ' active')
                	.addClass('btn-default');
                }
              }

            // Initialization
            function init() {

            	updateDisplay();

                // Inject the icon if applicable
                if ($button.find('.state-icon').length == 0) {
                	$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                }
              }
              init();
            });
        });
      </script>



