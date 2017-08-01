<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<input type="hidden" name="companyID" value="<?php echo $aboutList['companyID'];?>">
		<div class="form-group col-sm-12">
			<label for="floor" class="col-sm-2 control-label">ที่อยู่ </label>
			<div class="col-sm-8">
				<textarea name="address" class="form-control"><?php echo $aboutList['address']; ?></textarea>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="roomtype" class="col-sm-2 control-label">Mobile</label>
			<div class="col-sm-8">
				<input type="mobile" name="mobile" class="form-control" value="<?php echo $aboutList['mobile']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="status" class="col-sm-2 control-label">Vat Number</label>
			<div class=" col-sm-8">
				<input type="text" name="vatNumber" class="form-control" value="<?php echo $aboutList['vatNumber']; ?>">
			</div>
		</div>
		<div class="form-group col-sm-12">
			<label for="comment" class="col-sm-2 control-label">comment</label>
			<div class="  col-sm-8">
				<textarea name="comment" class="form-control" id="comment"><?php echo $aboutList['comment']; ?></textarea>
			</div>
		</div>
	</div>
</div>