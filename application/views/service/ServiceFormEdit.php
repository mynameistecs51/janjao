<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group">
			<label for="roomNumber" class="col-sm-3 control-label">ห้องพัก </label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="roomNumber" value="202" readonly>
			</div>
		</div>
		<div id="rowAdd0">
			<div class="form-group col-sm-12">
				<label for="serviceName" class="col-sm-3 control-label">service name</label>
				<div class=" col-sm-2">
					<input type="text" class="form-control" name="serviceName[]" id="serviceName0" value="น้ำอัดลม">
				</div>
				<label for="price" class="col-sm-1 control-label">price</label>
				<div class=" input-group col-sm-3">
					<input type="number" class="form-control" id="price0" name="price[]" value="20">
					<span class="input-group-addon">Bath.</span>
					<div class=" col-sm-1">
						<button type="button" class="btn btn-danger btn_delete"  id="delete0" title="Delete Service">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div id="rowAdd1">
			<div class="form-group col-sm-12">
				<label for="serviceName" class="col-sm-3 control-label">service name</label>
				<div class=" col-sm-2">
					<input type="text" class="form-control" name="serviceName[]" id="serviceName1" value="แก้ว">
				</div>
				<label for="price" class="col-sm-1 control-label">price</label>
				<div class=" input-group col-sm-3">
					<input type="number" class="form-control" id="price1" name="price[]" value="40">
					<span class="input-group-addon">Bath.</span>
					<div class=" col-sm-1">
						<button type="button" class="btn btn-danger btn_delete"  id="delete1" title="Add Service">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div id="rowAdd2">
			<div class="form-group col-sm-12">
				<label for="serviceName" class="col-sm-3 control-label">service name</label>
				<div class=" col-sm-2">
					<input type="text" class="form-control" name="serviceName[]" id="serviceName2" value="ขนมเลย์">
				</div>
				<label for="price" class="col-sm-1 control-label">price</label>
				<div class=" input-group col-sm-3">
					<input type="number" class="form-control" id="price2" name="price[]" value="40">
					<span class="input-group-addon">Bath.</span>
					<div class=" col-sm-1">
						<button type="button" class="btn btn-danger btn_delete" id="delete2" title="Add Service">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		var num = $('.btn_delete').length;
		for (var i = 0; i < num; i++) {
			btn_delete(i);
			// console.log(i);
		}
	});

	function btn_delete(num) {
		$('#delete'+num).click(function(){
			console.log(num);
			$('#rowAdd'+num).remove();
		});
	}
</script>