<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<input type="hidden" name="roomID" value="<?php echo $getRoom['roomID']; ?>">
		<div class="form-group col-sm-12">
			<label for="roomCODE" class="col-sm-2 control-label">เลขห้อง </label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="roomCODE" name="roomCODE"  value="<?php echo $getRoom['roomCODE']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="floor" class="col-sm-2 control-label">ชั้น </label>
			<div class="col-sm-8">
				<select name="floor" class="form-control" id="floor">
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
			<label for="zone" class="col-sm-2 control-label">โซน</label>
			<div class=" col-sm-8">
				<?php  $zone = ($getRoom['zone'] == 'LEFT')? 'checked':''; ?>
				<label><input type="radio" name="zone" id="zoneleft" value="LEFT" class="control-label" <?php echo $zone; ?>> <b class="btn btn-primary btn-md">  ซ้าย</b></label>
				&nbsp;&nbsp;&nbsp;
				<?php $zone = ($getRoom['zone'] == 'RIGHT')? 'checked':''; ?>
				<label><input type="radio" name="zone" id="zoneright" value="RIGHT" class="control-label" <?php echo $zone; ?>> <b class="btn btn-warning btn-md"> ขวา</b></label>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="roomtype" class="col-sm-2 control-label">ประเภทห้องพัก</label>
			<div class="col-sm-8">
				<select name="roomtype" class="form-control" id="roomtype">
					<?php foreach ($roomType as $key => $rowRoomType): ?>
						<?php $select = ($getRoom['roomtypeID'] == $rowRoomType['roomtypeID'])?'selected':''; ?>
						<option value="<?php echo $rowRoomType['roomtypeID']; ?>" <?php echo $select; ?> ><?php echo $rowRoomType['roomtypeCode']." -".$rowRoomType['bed']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="transaction" class="col-sm-2 control-label">สถานะการใช้ห้อง</label>
			<input type="hidden" name="transaction" value="<?php echo $getRoom['transaction']; ?>">
			<div class=" col-sm-8">
				<span class="form-control"><?php echo $getRoom['transaction']; ?></span>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="status" class="col-sm-2 control-label">สถานะ</label>
			<div class=" col-sm-8">
				<?php $check = ($getRoom['status'] == 'ON')? 'checked':''; ?>
				<label><input type="radio" name="status" id="statuson" value="ON" class="control-label" <?php echo $check; ?> > <b class="btn btn-success btn-md">  เปิดใช้งาน</b></label>
				&nbsp;&nbsp;&nbsp;
				<?php  $check = ($getRoom['status'] == 'OFF')? 'checked':''; ?>
				<label><input type="radio" name="status" id="statusoff" value="OFF" class="control-label"<?php echo $check; ?>> <b class="btn btn-danger btn-md"  > ยังไม่เปิดใช้งาน</b></label>
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