<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group col-sm-12">
			<label for="roomtypeName" class="col-sm-3 control-label">เลขห้อง </label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="roomtypeName" value="<?php echo $getRoom['roomCODE']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="roomtype" class="col-sm-3 control-label">ประเภทห้องพัก</label>
			<div class="col-sm-4">
				<select name="roomtype" class="form-control" id="roomtype">
					<?php foreach ($roomType as $key => $rowRoomType): ?>
						<option><?php echo $rowRoomType['roomtypeCode']." -".$rowRoomType['bed']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="roomtypeName" class="col-sm-3 control-label">ชั้น </label>
			<div class="col-sm-4">
				<select name="roomtype" class="form-control" id="roomtype">
					<?php $selected = ($getRoom['floor'] == 2)? 'selected':''; ?>
					<option value="2" <?php echo $selected; ?>>FLOOR 2</option>
					<?php $selected = ($getRoom['floor'] == 3)? 'selected':''; ?>
					<option value="3" <?php echo $selected; ?>>FLOOR 3</option>
					<?php $selected = ($getRoom['floor'] == 4)? 'selected':''; ?>
					<option value="4" <?php $selected; ?>>FLOOR 4</option>
					option
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="status" class="col-sm-3 control-label">สถานะ</label>
			<div class=" col-sm-4">
				<?php $checked = ($getRoom['status'] == 'ON')? 'checked': ""; ?>
				<label><input type="radio" name="status" id="statuson" value="ON" class="control-label" <?php echo $checked; ?>> <b class="btn btn-primary btn-md">  เปิดใช้งาน</b></label>
				&nbsp;&nbsp;&nbsp;
				<?php $checked = ($getRoom['status'] == 'OFF')? 'checked': ""; ?>
				<label><input type="radio" name="status" id="statusoff" value="OFF" class="control-label"> <b class="btn btn-warning btn-md" <?php echo $checked; ?>> ยังไม่เปิดใช้งาน</b></label>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="comment" class="col-sm-3 control-label">comment</label>
			<div class="  col-sm-4">
				<textarea name="comment" class="form-control" id="comment"></textarea>
			</div>
		</div>
	</div>
</div>
