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
	<span class="btn btn-warning btm-sm btn_booking"><i class="state-icon glyphicon glyphicon-check"></i> BOOKING</span>
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="202" value="202" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>204</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="204" value="204" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>206 VIP</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="206" value="206" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>208 VIP</h4><i>out:14/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="208" value="208" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>210 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="210" value="210" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>212 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="212" value="212" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>214 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="214" value="214" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="success" style="width:120px;" >
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>216 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="216" value="216" checked disabled />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox " >
				<button type="button" class="btn btn_room" data-color="warning" style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>218 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="218" value="218" checked disabled />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox " >
				<button type="button" class="btn btn_room" data-color="warning" style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>220 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]" id="220" value="220" checked disabled />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="201" value="201" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>203</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="203" value="203" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>205 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="205" value="205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>207 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="207" value="207" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>209 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="209" value="209" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>211 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="211" value="211" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="215" value="215" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>217 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="217" value="217" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>219 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="219" value="219" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="302" value="302" checked disabled readonly/>
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>304</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="304" value="304" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;" disabled>
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>306 VIP</h4><i>out:15/06/2017</i>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="306" value="306" checked disabled readonly/>
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>308 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="308" value="308" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>310 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="310" value="310" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>312 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="312" value="312" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>314 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="314" value="314" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>316 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="316" value="316" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>318 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="318" value="318" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>320 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="320" value="320" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="301" value="301" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>303</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="303" value="303" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>305 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="305" value="205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>307 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="307" value="307" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>309 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="309" value="309" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>311 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="311" value="311" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="315" value="315" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>317 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="317" value="317" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>319 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="319" value="319" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="402" value="402" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>404</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="404" value="404" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>406 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="406" value="406" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>408 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="408" value="408" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>410 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="410" value="410" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>412 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="412" value="412" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>414 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="414" value="414" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>416 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="416" value="416" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>418 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="418" value="418" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>320 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="320" value="320" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="401" value="401" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>403</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="403" value="403" />
			</span>
		</div>

		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>405 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="405" value="205" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>407 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="407" value="407" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>409 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="409" value="409" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>411 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="411" value="411" />
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
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="415" value="415" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>417 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="417" value="417" />
			</span>
		</div>
		<div class="col-sm-1 " style="margin:10px;">
			<span class="button-checkbox ">
				<button type="button" class="btn btn_room" data-color="danger"  style="width:120px;">
					<i class="fa fa-bed fa-2x" aria-hidden="true"></i>
					<h4>419 VIP</h4>
				</button>
				<input type="checkbox" class="hidden check_room" name="check_room[]"  id="419" value="419" />
			</span>
		</div>

	</div>
</div>

<div class="col-lg-12">
	<hr style="margin-top: 40xp;margin-left: -15px; margin-right: -15px;">
</div>
<div class="div_modal"> <!-- show modal checkinform --> </div>
<script type="text/javascript">
	$(function(){
		checkIn();
		booking();
	});

	function checkIn() {
		var selectRoom=[];
		$('.check_room').on('change',function(){

			if( this.checked){
				selectRoom.push($(this).val());
			}else {
				$(this).each(function(index, el) {
					selectRoom.push($(this).val());
					selectRoom  = $.grep(selectRoom, function( a ) {
						return a !== el.id;
					});
				});
			}
		});
		$('.btn_checkin').click(function(){
			var room = selectRoom.join('_')
			load_page('<?php echo base_url().$this->ctl."/CheckinFormAdd/"; ?>'+room,'.:: Data Checkin::.','#');
		});
	}

	function booking() {
		var selectRoom=[];
		$('.check_room').on('change',function(){

			if( this.checked){
				selectRoom.push($(this).val());
			}else {
				$(this).each(function(index, el) {
					selectRoom.push($(this).val());
					selectRoom  = $.grep(selectRoom, function( a ) {
						return a !== el.id;
					});
				});
			}
		});

		$('.btn_booking').click(function(){
			if(selectRoom.length > 0){
				var room = selectRoom.join('_')
				load_page('<?php echo base_url().$this->ctl."/BookingFormAdd/"; ?>'+room,'.:: Data Booking ::.','<?php echo base_url()."Booked/saveAdd/"; ?>');
			}else{
				alert("กรุณาเลือกห้องพัก !!");
			}
		});
	}

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
		// setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
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
		div+='<button type="reset" class="btn btn-modal " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
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



