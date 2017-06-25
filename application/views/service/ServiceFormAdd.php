<div class="row form_input" style="text-align:left; margin-bottom:20px">
	<div class="form-horizontal">
		<div class="form-group">
			<label for="roomNumber" class="col-sm-3 control-label">ห้องพัก </label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="roomNumber" value="202" readonly>
			</div>
		</div>
		<div class="show_add">
			<!-- Ass service -->
		</div>
		<div class="form-group col-sm-12">
			<label for="serviceName" class="col-sm-3 control-label">service name</label>
			<div class=" col-sm-2">
				<input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="น้ำอัดลม">
			</div>
			<label for="price" class="col-sm-1 control-label">price</label>
			<div class=" input-group col-sm-3">
				<input type="number" class="form-control" id="price" name="price" placeholder="20">
				<span class="input-group-addon">Bath.</span>
				<div class=" col-sm-1">
					<button type="button" class="btn btn-warning btn_plus" id="plus0" title="Add Service">
						<i class="fa fa-plus"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$(".btn_plus").click(function(){
			var num = $('.rowAdd').length+1;
			var html ='<div class="rowAdd" id="rowAdd'+num+'">';
			html +='<div class="form-group col-sm-12">';
			html +='<label for="serviceName" class="col-sm-3 control-label">service name</label>';
			html +='<div class=" col-sm-2">';
			html +='	<input type="text" class="form-control" name="serviceName[]" id="serviceName'+num+'" placeholder="น้ำอัดลม">';
			html +='</div>';
			html +='<label for="price" class="col-sm-1 control-label">price</label>';
			html +='<div class=" input-group col-sm-3">';
			html +='	<input type="number" class="form-control" id="price'+num+'" name="price[]" placeholder="20">';
			html +='	<span class="input-group-addon">Bath.</span>';
			html+= '	<div class="col-sm-1">';
			html+= '		<button type="button" class="btn btn-danger delete" id="delete'+num+'" title="เพิ่มนักวิจัย">';
			html+= '			<i class="fa fa-minus"></i>';
			html+= '		</button>';
			html+= '	</div>';
			html +='</div>';
			html +='</div>';
			html+= '</div>';
			$('.show_add').append(html);
			btn_delete(num);
		});
	});

	function btn_delete(num) {
		$('#delete'+num).click(function(){
			$('#rowAdd'+num).remove();
		});
	}
</script>