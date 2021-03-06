  <!-- <link href="<?php echo base_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet"> 
  <input type="hidden" name="bookedID" id="bookedID" value="<?php echo $checkinDtl['bookedID']; ?>"> 

  <div class="row form_input" style="text-align:left; margin-bottom:20px">
  <div class="form-horizontal">
  	<div class="form-group">
		<label for="mobile" class="col-sm-2 control-label">BOOKED No.</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="bookedCode" name="bookedCode" value="<?php echo $checkinDtl['bookedCode']; ?>" readonly>
		</div>
	</div>

	<div class="form-group">
		<label for="idcardno" class="col-lg-2 control-label">รายการที่ขอเพิ่ม <b style="color: #FF0000">*</b></label>
		<div class="col-sm-8">
			<table id="servicelist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
			<thead>
				<tr>
					<th style="text-align: center;width: 40px;">No.</th>
					<th style="text-align: center;">NAME </th>
					<th style="text-align: center;width:  80px;">PRICE</th>
					<th style="text-align: center;width:  80px;">UNIT</th>
					<th style="text-align: center;width:  80px;">AMOUNT</th>
					<th style="text-align: center;width:  120px;">TOTAL</th>  
					<th style="text-align: center;width:  50px;">#</th>
				</tr>
			</thead>
			<tbody> 
				<?php 
				$totalprice = 0.00; $totalamount = 0.00; $totalsum = 0.00;
				$n = 1;
				if(count($serviceDtl)>0){ ?>
				<?php foreach ($serviceDtl as $rs) {  ?>
					<tr id="<?php echo $n; ?>">
						<td><?php echo $n; ?></td>
						<td><input type="text" name="serviceName[]" class="form-control servicename" id="servicename<?php echo $n; ?>" placeholder="ผ้าห่ม" value="<?php echo $rs['serviceName']; ?>" required></td>
						<td><input type="text" name="price[]" class="form-control price" id="price<?php echo $n; ?>" placeholder="0.00"  value="<?php echo $rs['price']; ?>" required></td>
						<td><input type="text" name="unit[]" class="form-control unit" id="unit<?php echo $n; ?>" placeholder="ผืน"  value="<?php echo $rs['unit']; ?>" required></td>
						<td><input type="text" name="amount[]" class="form-control amount" id="amount<?php echo $n; ?>" placeholder="0"  value="<?php echo $rs['amount']; ?>" required></td>
						<td><input type="text" name="total[]" class="form-control total" id="total<?php echo $n; ?>"  placeholder="0.00" value="<?php echo number_format($rs['price']*$rs['amount'],2); ?>" required readonly></td>
						<td><span class="btn btn-danger btn-xs delrow" id="delrow<?php echo $n; ?>" ><i class="fa fa-trash-o fa-2x"></i></span></td>
					</tr>
				<?php 
					$totalprice += $rs['price']; 
					$totalamount += $rs['amount']; 
					$totalsum += ($rs['price']*$rs['amount']);
				?>
				<?php $n++; } ?>
				<?php }else{ ?>
					<tr id="1">
						<td>1</td>
						<td><input type="text" name="serviceName[]" class="form-control servicename" id="servicename1" placeholder="ผ้าห่ม" value="" required></td>
						<td><input type="text" name="price[]" class="form-control price" id="price1" placeholder="0.00"  value="" required></td>
						<td><input type="text" name="unit[]" class="form-control unit" id="unit1" placeholder="ผืน"  value="" required></td>
						<td><input type="text" name="amount[]" class="form-control amount" id="amount1" placeholder="0"  value="" required></td>
						<td><input type="text" name="total[]" class="form-control total" id="total1"  placeholder="0.00" value="" required readonly></td>
						<td><span class="btn btn-danger btn-xs " id="delrow1" ><i class="fa fa-trash-o fa-2x"></i></span></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr align="right">
					<td colspan="2" > Total :</td> 
					<td><span id="totalprice"><?php echo number_format($totalprice,2); ?></span></td>
					<td></td>
					<td><span id="totalamount"><?php echo number_format($totalamount); ?></span></td>
					<td><span id="totalsum"><?php echo number_format($totalsum,2); ?></span></td>
					<td></td>
				</tr>
			</tfoot>
			</table>
			<span class="btn btn-primary btn-sm " id="addrows"> <i class="glyphicon glyphicon-plus-sign"></i> เพิ่มรายการ </span>
		</div>
	</div>  
</div>
</div>
<div class="form-group" align="center">
	<label><span id="saveandprint" class="btn btn-secondary">  <input type="checkbox" name="isprint" value="YES" checked> <i class="glyphicon glyphicon-print"></i> พิมพ์ใบเสร็จรับเงิน</span></label>
</div>
<!-- <script src="<?php echo base_url()?>assets/js/bootstrap-select.min.js"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$(function() {  
		$('#servicelist tbody tr').each(function(i,n){
			var val = $(n).attr('id'); 
			removerow(val);
			chnrowval(val);
		});
	});  

  	function confirmvalid(){
  		if($('#servicelist tbody tr').length==0){
  			alert('กรุณาเลือก เพิ่มรายการ !');
  			return false;
  		}else{
  			return true;
  		}
  		
  	} 

	$('#addrows').on("click",function() {
		var max = 0; 
        $('#servicelist tbody tr').each(function(i,n){  
          var val = $(n).attr('id'); 
          var id = parseInt(val);
          if(id > max){ max = id; } 
        });
        var n = max+1;

		var html = '';
			html += '<tr id="'+n+'">';
			html += '<td>'+n+'</td>';
			html += '<td><input type="text" name="serviceName[]" class="form-control servicename" id="servicename'+n+'" placeholder="ผ้าห่ม" value="" required></td>';
			html += '<td><input type="text" name="price[]" class="form-control price" id="price'+n+'" placeholder="0.00"  value="" required></td>';
			html += '<td><input type="text" name="unit[]" class="form-control unit" id="unit'+n+'" placeholder="ผืน"  value="" required></td>';
			html += '<td><input type="text" name="amount[]" class="form-control amount" id="amount'+n+'" placeholder="0"  value="" required></td>';
			html += '<td><input type="text" name="total[]" class="form-control total" id="total'+n+'"  placeholder="0.00" value="" required readonly></td>';
			html += '<td><span class="btn btn-danger btn-xs " id="delrow'+n+'" ><i class="fa fa-trash-o fa-2x"></i></span></td>';
			html += '</tr>';
			$('#servicelist tbody').append(html);
			removerow(n);
			chnrowval(n);

	});

	function removerow(n){
		$('#delrow'+n).on("click",function() {
			if(confirm("ยืนยันการลบรายการ !")==true){
				$('#servicelist tbody tr#'+n).remove();
				sumtotal();
			} 
		});
	}

	function chnrowval(n){
		$('#price'+n+', #amount'+n).on("change",function() { 
			var price = $('#price'+n).val()!="" ? $('#price'+n).val():0;
			var amount = $('#amount'+n).val()!="" ? $('#amount'+n).val():0;
			var sum = parseInt(price)*parseInt(amount);
			$('#total'+n).val(sum.toFixed(2));
			sumtotal();
		});
	}

	function sumtotal(){
		var totalprice = 0; 
		var totalamount = 0; 
		var totalsum = 0;
		$('#servicelist tbody tr').each(function(i,n){
			var id = $(n).attr('id'); 
			var price = $('#price'+id).val()!="" ? $('#price'+id).val():0;
			var amount = $('#amount'+id).val()!="" ? $('#amount'+id).val():0;
			var total = $('#total'+id).val()!="" ? $('#total'+id).val():0;

			totalprice += parseInt(price);
			totalamount += parseInt(amount);
			totalsum += parseInt(total);
		}); 
		$('#totalprice').html(totalprice.toFixed(2));
		$('#totalamount').html(totalamount);
		$('#totalsum').html(totalsum.toFixed(2));

	}
	

 
</script>