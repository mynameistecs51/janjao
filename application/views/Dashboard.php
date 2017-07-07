<link href="<?php echo base_url()?>assets/css/jquery.datetimepicker.css" rel="stylesheet">
<!-- Page Name -->
<div class="col-lg-2">
	<i style="font-size: 15px;"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $topPageName; ?> </i>
</div>
<div class="col-lg-10 search-top" align="right">
	<div class="sh-right">
		<form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>home/search/">
			<button  type="submit" class="btn btn-primary" style="float: right;">Search</button>
			CheckIn Date :
			<input type="text" class="form-control"  id="dtcheckin" style="width: 138px;margin-right: 10px;" placeholder="Check In" name="dtcheckin" value="<?php echo $dtcheckin; ?>">
			CheckOut Date :
			<input type="text" class="form-control"  id="dtcheckout" style="width: 138px;margin-right: 10px;" placeholder="Check Out" name="dtcheckout" value="<?php echo $dtcheckout; ?>">
			<!--  
			Room Type :
			<select class="form-control" name="roomType" style="width: 120px;margin-right: 10px;">
				<option value="STANDARD" <?php echo $roomType=='STANDARD'? 'selected':''; ?> >STANDARD</option>
				<option value="VIP" <?php echo $roomType=='VIP'? 'selected':''; ?>  >VIP</option>
			</select>
			Status :
			<select class="form-control" name="roomstatus" style="width: 120px;margin-right: 10px;">
				<option value="ALL"   <?php echo $roomstatus=='ALL'? 'selected':''; ?>  >ALL</option>
				<option value="EMPTY" <?php echo $roomstatus=='EMPTY'? 'selected':''; ?>  >EMPTY</option>
				<option value="BOOKED"  <?php echo $roomstatus=='BOOKED'? 'selected':''; ?>  >BOOKED</option>
				<option value="CHECKIN" <?php echo $roomstatus=='CHECKIN'? 'selected':''; ?>  >CHECKIN</option>
				<option value="CHECKOUT" <?php echo $roomstatus=='CHECKOUT'? 'selected':''; ?>  >CHECKOUT</option>
				<option value="CLEANING" <?php echo $roomstatus=='CLEANING'? 'selected':''; ?>  >CLEANING</option>
			</select>
			-->
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
<div class="col-lg-12" >
	<div class=" col-sm-12 text-center"  >

	<?php 
		$html ='';
		foreach ($getfloor2 as $f2) {  
			if($f2['bed']=="SINGLE"){
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}else{
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i>
								<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}

			if($f2['transaction']=='EMPTY' && $f2['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f2['roomCODE'].'</h4>'.$f2['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f2['roomCODE'].'" data-price="'.$f2['roomPrice'].'" value="'.$f2['roomCODE'].'" />
								</span>
							</div> ';
			}else if($f2['transaction']=='BOOKED' && $f2['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="warning"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f2['roomCODE'].'</h4><i >IN:'.$f2['checkinDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f2['roomCODE'].'" data-price="'.$f2['roomPrice'].'" value="'.$f2['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f2['transaction']=='CHECKIN' && $f2['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="danger"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f2['roomCODE'].'</h4><i >out:'.$f2['checkoutDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f2['roomCODE'].'" data-price="'.$f2['roomPrice'].'" value="'.$f2['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f2['transaction']=='CHECKOUT' && $f2['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f2['roomCODE'].' </h4>'.$f2['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f2['roomCODE'].'" data-price="'.$f2['roomPrice'].'" value="'.$f2['roomCODE'].'" />
								</span>
							</div> ';

			}else if($f2['transaction']=='CLEANING' && $f2['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="success" style="width:120px;">
										'.$bed.'
										<h4>'.$f2['roomCODE'].' </h4>'.$f2['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f2['roomCODE'].'"  data-price="'.$f2['roomPrice'].'" value="'.$f2['roomCODE'].'" checked disabled readonly />
								</span>
							</div> '; 
			}else if($f2['roomtypeCode']=='STAIRCASE'){
				$html .=' <div class="col-sm-1 " style="margin:10px;"> </div> ';
			}
		
		
	  	} 
	  	echo $html;
	  	?>  
	</div>
</div>

<div class="col-lg-12" >
	<h3 >FLOOR 3 </h3>
</div>
<div class="col-lg-12" >
	<div class=" col-sm-12 text-center"  >
		<?php 
		$html ='';
		foreach ($getfloor3 as $f3) {  
			if($f3['bed']=="SINGLE"){
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}else{
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i>
								<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}

			if($f3['transaction']=='EMPTY' && $f3['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f3['roomCODE'].'</h4>'.$f3['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f3['roomCODE'].'"  data-price="'.$f3['roomPrice'].'" value="'.$f3['roomCODE'].'" />
								</span>
							</div> ';
			}else if($f3['transaction']=='BOOKED' && $f3['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="warning"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f3['roomCODE'].'</h4><i>in:'.$f3['checkinDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f3['roomCODE'].'"  data-price="'.$f3['roomPrice'].'" value="'.$f3['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f3['transaction']=='CHECKIN' && $f3['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="danger"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f3['roomCODE'].'</h4><i >out:'.$f3['checkoutDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f3['roomCODE'].'"  data-price="'.$f3['roomPrice'].'" value="'.$f3['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f3['transaction']=='CHECKOUT' && $f3['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f3['roomCODE'].' </h4>'.$f3['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f3['roomCODE'].'"  data-price="'.$f3['roomPrice'].'"  value="'.$f3['roomCODE'].'" />
								</span>
							</div> ';

			}else if($f3['transaction']=='CLEANING' && $f3['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="success" style="width:120px;">
										'.$bed.'
										<h4>'.$f3['roomCODE'].' </h4>'.$f3['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f3['roomCODE'].'" data-price="'.$f3['roomPrice'].'"  value="'.$f3['roomCODE'].'" checked disabled readonly />
								</span>
							</div> '; 
			}else if($f3['roomtypeCode']=='STAIRCASE'){
				$html .=' <div class="col-sm-1 " style="margin:10px;"> </div> ';
			}
		
		
	  	} 
	  	echo $html;
	  	?>  

	</div>
</div>

<div class="col-lg-12">
	<h3 >FLOOR 4 </h3>
</div>
<div class="col-lg-12" >
	<div class=" col-sm-12 text-center"  >
		<?php 
		$html ='';
		foreach ($getfloor4 as $f4) {  
			if($f4['bed']=="SINGLE"){
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}else{
				$bed = '		<i class="fa fa-bed fa-2x" aria-hidden="true">&nbsp;</i>
								<i class="fa fa-bed fa-2x" aria-hidden="true"></i>';
			}

			if($f4['transaction']=='EMPTY' && $f4['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f4['roomCODE'].'</h4>'.$f4['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f4['roomCODE'].'" data-price="'.$f4['roomPrice'].'" value="'.$f4['roomCODE'].'" />
								</span>
							</div> ';
			}else if($f4['transaction']=='BOOKED' && $f4['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="warning"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f4['roomCODE'].'</h4><i >in:'.$f4['checkinDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f4['roomCODE'].'" data-price="'.$f4['roomPrice'].'"  value="'.$f4['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f4['transaction']=='CHECKIN' && $f4['roomtypeCode']!='STAIRCASE'){
				$html .= '
						<div class="col-sm-1 " style="margin:10px;">
							<span class="button-checkbox ">
								<button type="button" class="btn btn_room" data-color="danger"   style="width:120px;" disabled>
								'.$bed.'
								<h4>'.$f4['roomCODE'].'</h4><i >out:'.$f4['checkoutDate'].'</i>
								</button>
								<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f4['roomCODE'].'" data-price="'.$f4['roomPrice'].'"  value="'.$f4['roomCODE'].'" checked disabled readonly/>
							</span>
						</div>';

			}else if($f4['transaction']=='CHECKOUT' && $f4['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="danger" style="width:120px;">
										'.$bed.'
										<h4>'.$f4['roomCODE'].' </h4>'.$f4['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f4['roomCODE'].'" data-price="'.$f4['roomPrice'].'"  value="'.$f4['roomCODE'].'" />
								</span>
							</div> ';

			}else if($f4['transaction']=='CLEANING' && $f4['roomtypeCode']!='STAIRCASE'){
					$html .= ' 
							<div class="col-sm-1 " style="margin:10px;">
								<span class="button-checkbox ">
									<button type="button" class="btn btn_room" data-color="success" style="width:120px;">
										'.$bed.'
										<h4>'.$f4['roomCODE'].' </h4>'.$f4['roomtypeCode'].'
									</button>
									<input type="checkbox" class="hidden check_room" name="check_room[]"  id="'.$f4['roomCODE'].'" data-price="'.$f4['roomPrice'].'"  value="'.$f4['roomCODE'].'" checked disabled readonly />
								</span>
							</div> '; 
			}else if($f4['roomtypeCode']=='STAIRCASE'){
				$html .=' <div class="col-sm-1 " style="margin:10px;"> </div> ';
			}
		
		
	  	} 
	  	echo $html;
	  	?>  

	</div>
</div> 

<div class="col-lg-12">
	<hr style="margin-top: 40px;margin-left: -15px; margin-right: -15px;">
</div>
<div class="div_modal"> <!-- show modal checkinform --> </div>
<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
	$(function(){
		checkIn();
		booking();

	});
	$.datetimepicker.setLocale('th');
	$('#dtcheckin, #dtcheckout').datetimepicker({
		timepicker:true,
		mask:true,
		format:'d/m/Y H:i',
		lang:'th',
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
			var dtcheckin = $('#dtcheckin').val();
			var dtcheckout = $('#dtcheckout').val();  
			var din =  dtcheckin[0]+dtcheckin[1]+'_'+dtcheckin[3]+dtcheckin[4]+'_'+dtcheckin[6]+dtcheckin[7]+dtcheckin[8]+dtcheckin[9]+'T'+dtcheckin[11]+dtcheckin[12]+dtcheckin[13]+dtcheckin[14]+dtcheckin[15];
			var dout = dtcheckout[0]+dtcheckout[1]+'_'+dtcheckout[3]+dtcheckout[4]+'_'+dtcheckout[6]+dtcheckout[7]+dtcheckout[8]+dtcheckout[9]+'T'+dtcheckout[11]+dtcheckout[12]+dtcheckout[13]+dtcheckout[14]+dtcheckout[15];
			
			if(selectRoom.length > 0){
				var room = selectRoom.join('_')
				load_page('<?php echo base_url().$this->ctl."/checkinformadd/"; ?>'+room+'/'+din+'/'+dout+'/','.:: Data Checkin::.','<?php echo base_url()."checkin/saveAdd/"; ?>',''+dtcheckin+'',''+dtcheckout+'');
			}else{
				alert("กรุณาเลือกห้องพัก !!");
			}
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
			var dtcheckin = $('#dtcheckin').val();
			var dtcheckout = $('#dtcheckout').val();  
			var din =  dtcheckin[0]+dtcheckin[1]+'_'+dtcheckin[3]+dtcheckin[4]+'_'+dtcheckin[6]+dtcheckin[7]+dtcheckin[8]+dtcheckin[9]+'T'+dtcheckin[11]+dtcheckin[12]+dtcheckin[13]+dtcheckin[14]+dtcheckin[15];
			var dout = dtcheckout[0]+dtcheckout[1]+'_'+dtcheckout[3]+dtcheckout[4]+'_'+dtcheckout[6]+dtcheckout[7]+dtcheckout[8]+dtcheckout[9]+'T'+dtcheckout[11]+dtcheckout[12]+dtcheckout[13]+dtcheckout[14]+dtcheckout[15];
			
			if(selectRoom.length > 0){
				var room = selectRoom.join('_')
				load_page('<?php echo base_url().$this->ctl."/bookingformadd/"; ?>'+room+'/'+din+'/'+dout+'/','.:: Data Booking ::.','<?php echo base_url()."booked/saveAdd/"; ?>',''+dtcheckin+'',''+dtcheckout+'');
			}else{
				alert("กรุณาเลือกห้องพัก !!");
			}
		});
	}

	function load_page(loadUrl,texttitle,urlsend,dtcheckin,dtcheckout){
		var screenname= texttitle;
		var url = loadUrl;
		var n=0;
		$('.div_modal').html('');
		modal_form(n,screenname,urlsend,dtcheckin,dtcheckout);
		$('#myModal'+n+' .modal-body').html('<img id="ajaxLoaderModal" src="<?php echo base_url(); ?>assets/images/loader.gif"/>');
		var modal = $('#myModal'+n), modalBody = $('#myModal'+n+' .modal-body');
		modal.on('show.bs.modal', function () {
			modalBody.load(url);
		}).modal({backdrop: 'static',keyboard: true});
		// setInterval(function(){$('#ajaxLoaderModal').remove()},5100);
	}

	function modal_form(n,screenname,url,dtcheckin,dtcheckout)
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
		div+='<button type="submit" id="save" class="btn btn-success "><span class="   glyphicon glyphicon-floppy-saved"> บันทึก</span></button>';
		div+='<button type="reset" class="btn btn-danger " data-dismiss="modal"><span class="glyphicon glyphicon-floppy-remove"> ยกเลิก</span></button>';
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



