<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group col-sm-12">
          <label class="control-label col-sm-2">ประเภทห้องพัก<span style="color:#FF0004;">*</span> :</label>
            <div class="col-sm-8">
            	<div class="row">
                	<input type="text" class="form-control" name="roomtypeCode" id="roomtypeCode" value="">
            	</div>
            </div>  
        </div>   
		<div class="form-group col-sm-12">
			<label for="bed" class="col-sm-2 control-label">ประเภทเตียง </label>
			<div class="input-group col-sm-5">
				<div class="col-sm-8">
					<label><b class="btn btn-info btn-md"> <input type="radio" name="bed" id="SINGLE" value="SINGLE" class="control-label" checked>  เตียงเดียว</b></label>
					&nbsp;&nbsp;&nbsp;
					<label><b class="btn btn-warning btn-md"> <input type="radio" name="bed" id="MULTIPLE" value="MULTIPLE" class="control-label" >  เตียงคู่</b></label>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="price_short" class="col-sm-2 control-label">ราคา/ชั่วคราว</label>
			<div class="input-group col-sm-8">
				<input type="number" class="form-control" name="price_short" id="price_short" >
				<sapn class="input-group-addon">บาท</sapn>
			</div>
		</div> 
		<div class="form-group col-sm-12">
			<label for="price_day" class="col-sm-2 control-label">ราคา/วัน</label>
			<div class="input-group  col-sm-8">
				<input type="number" class="form-control" name="price_day" id="price_day" >
				<span class="input-group-addon">บาท</span>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="price_month" class="col-sm-2 control-label">ราคา/เดือน</label>
			<div class="input-group  col-sm-8">
				<input type="number" class="form-control" name="price_month" id="price_month" >
				<span class="input-group-addon">บาท</span>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="status" class="col-sm-2 control-label">สถานะ</label>
			<div class="input-group col-sm-5">
				<div class="col-sm-8">
					<label><b class="btn btn-success btn-md"> <input type="radio" name="status" id="on" value="ON" class="control-label" checked>  เปิดใช้งาน</b></label>
					&nbsp;&nbsp;&nbsp;
					<label><b class="btn btn-danger btn-md"> <input type="radio" name="status" id="off" value="OFF" class="control-label" >  ไม่เปิดใช้งาน</b></label>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
          <label class="control-label col-sm-2">comment</label>
            <div class="col-sm-8">
            	<div class="row">
                	<textarea name="comment" class="form-control" id="comment"></textarea>
            	</div>
            </div>  
        </div> 
	</div>
</div>
