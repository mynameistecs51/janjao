<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group col-sm-12">
			<label for="roomCODE" class="col-sm-2 control-label">เลขห้อง </label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="roomCODE" name="roomCODE"  value="">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="floor" class="col-sm-2 control-label">ชั้น </label>
			<div class="col-sm-8">
				<select name="floor" class="form-control" id="floor">
					<option value="1">FLOOR 1</option>
					<option value="2">FLOOR 2</option>
					<option value="3">FLOOR 3</option>
					<option value="4">FLOOR 4</option>
					option
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="zone" class="col-sm-2 control-label">โซน</label>
			<div class=" col-sm-8">
				<label>
					<input type="radio" name="zone" id="zoneleft" value="LEFT" class="control-label" checked > <b class="btn btn-primary btn-md"> ซ้าย</b>
				</label>
				&nbsp;&nbsp;&nbsp;
				<label>
					<input type="radio" name="zone" id="zoneright" value="RIGHT" class="control-label" > <b class="btn btn-warning btn-md"> ขวา</b>
				</label>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="roomtype" class="col-sm-2 control-label">ประเภทห้องพัก</label>
			<div class="col-sm-8">
				<select name="roomtype" class="form-control" id="roomtype">
					<?php foreach ($roomType as $key => $rowRoomType): ?>
						<option value="<?php echo $rowRoomType['roomtypeID']; ?>" ><?php echo $rowRoomType['roomtypeCode']." -".$rowRoomType['bed']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="status" class="col-sm-2 control-label">สถานะ</label>
			<div class=" col-sm-8">
				<label>
					<input type="radio" name="status" id="statuson" value="ON" class="control-label" checked> <b class="btn btn-success btn-md">  เปิดใช้งาน</b>
				</label>
				&nbsp;&nbsp;&nbsp;
				<label>
					<input type="radio" name="status" id="statusoff" value="OFF" class="control-label">
					<b class="btn btn-danger btn-md"  > ยังไม่เปิดใช้งาน</b></label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label for="comment" class="col-sm-2 control-label">comment</label>
				<div class="  col-sm-8">
					<textarea name="comment" class="form-control" id="comment"></textarea>
				</div>
			</div>
		</div>
	</div>