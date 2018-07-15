<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_checkin extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}


	public function saveAdd()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));

		$bookedCode =  $this->db->query("SELECT fn_gen_sn('CH', 'CH".$now->format('ym')."') AS CODE")->result_array();
		$fileName = '';
		if( !empty($this->input->post('images'))){
			$img  = $this->input->post('images');
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = 'assets/images/imgcard/'.$this->input->post('idcardno').'.png';
			$success = file_put_contents($file, $data);
			$fileName = $this->input->post('idcardno').'.png';
		}else{
			$fileName ="";
		}

		$saveAdd= array(
			'bookedCode' => $bookedCode[0]['CODE'],
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' =>$fileName,
			'titleName' => $this->input->post('gender'),
			'firstName' => $this->input->post('firstName'),
			'middleName' => '',
			'lastName' => $this->input->post('lastName'),
			'birthdate' => $this->input->post('birthdate_y').'-'.$this->input->post('birthdate_m').'-'.$this->input->post('birthdate_d').' 00:00:00',
			'address' => $this->input->post('address'),
			'mobile' => $this->input->post('mobile'),
			'licenseplate' => $this->input->post('licenseplate'),
			'email' => $this->input->post('email'),
			'bookedDate' => $this->packfunction->dtTosql($this->input->post('bookedDate')),
			'checkInAppointDate' => $this->packfunction->dtTosql($this->input->post('checkinDate')),
			'checkOutAppointDate' => $this->packfunction->dtTosql($this->input->post('checkOutDate')),
			'is_breakfast' => $this->input->post('is_breakfast'),
			'bookedType' => $this->input->post('bookedType'),
			'cashPledge' => $this->input->post('cashPledge'),
			'cashPledgePath' => '',
			'comment' => $this->input->post('comment'),
			'status' => 'CHECKIN',
			"createDT"		=>$this->packfunction->dtYMDnow(),
			"createBY"		=>$this->UserName,
			"updateDT"		=>$this->packfunction->dtYMDnow(),
			"updateBY"		=>$this->UserName
			);
		$this->db->insert('ts_booked',$saveAdd);
		$idBooked= $this->db->insert_id();

		$selectRoom = implode('_',$this->input->post('selectRoom'));
		$room = explode('_',$selectRoom);
		for ($i=0; $i < count($room) ; $i++) :
			$saveBookedRoom[$i] = array(
				'bookedID '     => $idBooked,
				'roomID '       => $room[$i],
				'checkinDate '  => $this->packfunction->dtTosql($_POST['checkinDate']),
				'checkoutDate ' => $this->packfunction->dtTosql($this->input->post('checkOutDate')),
				'comment '      => $this->input->post('comment'),
				'status '       => 'CHECKIN',
				"createDT"		    => $this->packfunction->dtYMDnow(),
				"createBY"		    => $this->UserName,
				"updateDT"		    => $this->packfunction->dtYMDnow(),
				"updateBY"		    => $this->UserName
				);
		$this->db->insert('ts_booked_room',$saveBookedRoom[$i]);
		$idBookedRoom[$i] = $this->db->insert_id();

		// Update สถานะห้อง
		$this->packfunction->updateRoom($status='CHECKIN', $roomcode=$room[$i]);


			// Insert ts_booked_room_log
		$startDate = date_create($this->packfunction->dateTosql($_POST['checkinDate']));
		$endDate  = date_create($this->packfunction->dateTosql($this->input->post('checkOutDate')));
		$interval = date_diff($startDate, $endDate);
		$runDay = array();
		while ($startDate <= $endDate) {
			$year = $startDate->format("Y");
			$month = $startDate->format("m");

			if(!array_key_exists($year, $runDay))
				$runDay[$year] = array();
			if(!array_key_exists($month, $runDay[$year]))
				$runDay[$year][$month] = 0;
			$runDay[$year][$month]++;

			$log = array(
				'bookedID '     => $idBooked,
				'bookedroomID' => $idBookedRoom[$i],
				'roomID'       => $room[$i],
				'logDate'      => $startDate->format('Y-m-d').' 12:00:00',
				'comment'      => $this->input->post('comment'),
				'status'       => 'CHECKIN',
				"createDT"	   => $this->packfunction->dtYMDnow(),
				"createBY"	   => $this->UserName,
				"updateDT"	   => $this->packfunction->dtYMDnow(),
				"updateBY"	   => $this->UserName
				);
			$this->db->insert('ts_booked_room_log',$log);

			$startDate->modify("+1 day");

		}


		$dataCashHDR[$i] = array(
			// 'cashhdrID ' => $this->input->post(''),
			'cashCode ' => $bookedCode[0]['CODE'],
			'bookedID ' => $idBooked,
			'roomID ' => $room[$i],
			'cashDate ' => $this->packfunction->dtYMDnow(),
			'totalVat ' => $this->input->post('vat'),
			'checkinDiscount' => $this->input->post('checkindiscount'),
			'totalDiscount ' => $chk_out = ($this->input->post('discount') == 0.00) ? 0.00 : $this->input->post('discount'),
			'totalLast ' => $this->input->post('lastamount'),
			'comment ' => $this->input->post('comment'),
			'status ' => 'PAY',
			"createDT"	   => $this->packfunction->dtYMDnow(),
			"createBY"	   => $this->UserName,
			"updateDT"	   => $this->packfunction->dtYMDnow(),
			"updateBY"	   => $this->UserName
			);
		$this->db->insert('ts_cash_hdr',$dataCashHDR[$i]);
		endfor; // End ts_booked_room
		return $idBooked;
	}

	public function saveCheckin()
	{

		$fileName = '';
		if( !empty($this->input->post('images'))){
			$img  = $this->input->post('images');
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = 'assets/images/imgcard/'.$this->input->post('idcardno').'.png';
			$success = file_put_contents($file, $data);
			$fileName = $this->input->post('idcardno').'.png';
		}else{
			$fileName ="";
		}

		$saveCheckin= array(
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' =>$fileName!="" ? $fileName : $this->input->post('idcardnoPath_old'),
			'titleName' => $this->input->post('gender'),
			'firstName' => $this->input->post('firstName'),
			'lastName' => $this->input->post('lastName'),
			'birthdate' => $this->input->post('birthdate_y').'-'.$this->input->post('birthdate_m').'-'.$this->input->post('birthdate_d').' 00:00:00',
			'address' => $this->input->post('address'),
			'mobile' => $this->input->post('mobile'),
			'licenseplate' => $this->input->post('licenseplate'),
			'email' => $this->input->post('email'),
			'bookedDate' => $this->packfunction->dtTosql($this->input->post('bookedDate')),
			'checkInAppointDate' => $this->packfunction->dtTosql($this->input->post('checkinDate')),
			'checkOutAppointDate' => $this->packfunction->dtTosql($this->input->post('checkOutDate')),
			'is_breakfast' => $this->input->post('is_breakfast'),
			'bookedType' => $this->input->post('bookedType'),
			'cashPledge' => $this->input->post('cashPledge'),
			'cashPledgePath' => '',
			'comment' => $this->input->post('comment'),
			'status' => 'CHECKIN',
			"updateDT"		=>$this->packfunction->dtYMDnow(),
			"updateBY"		=>$this->UserName
			);
		$bookedID = $this->input->post('bookedID');
		$this->db->where('bookedID',$bookedID);
		$this->db->update('ts_booked',$saveCheckin);

		$countRoom = count($this->input->post('roomID'));
		$roomID = $this->input->post('roomID');
		for($i = 0 ;$i < $countRoom; $i++):
			foreach ($this->input->post('bookedroomID') as $sr => $value) {

				$saveCheckRoom[$sr] = array(
					'bookedID '     => $bookedID,
					'roomID '       => $roomID[$sr],
					'checkinDate '  => $this->packfunction->dtTosql($_POST['checkinDate']),
					'checkoutDate ' => $this->packfunction->dtTosql($this->input->post('checkOutDate')),
					'comment '      => $this->input->post('comment'),
					'status '       => 'CHECKIN',
					"updateDT"		    => $this->packfunction->dtYMDnow(),
					"updateBY"		    => $this->UserName
					);
				$bookedroomID[$sr] = $this->input->post('bookedroomID')[$sr];
				$this->db->where('bookedroomID',$bookedroomID[$sr]);
				$this->db->update('ts_booked_room',$saveCheckRoom[$sr]);

			// Update สถานะห้อง
				$this->packfunction->updateRoom($status='CHECKIN', $roomcode=$this->input->post('roomID')[$sr]);

			// เคลียร์ Log เดิม
				$this->db->where('bookedroomID',$bookedroomID[$sr]);
				$this->db->delete('ts_booked_room_log');


			// Insert ts_booked_room_log
				$startDate = date_create($this->packfunction->dateTosql($_POST['checkinDate']));
				$endDate  = date_create($this->packfunction->dateTosql($this->input->post('checkOutDate')));
				$interval = date_diff($startDate, $endDate);
				$runDay = array();
				while ($startDate <= $endDate) {
					$log = array(
						'bookedID '    => $bookedID,
						'bookedroomID' => $bookedroomID[$sr],
						'roomID'       =>  $roomID[$sr],
						'logDate'      => $startDate->format('Y-m-d').' 12:00:00',
						'comment'      => $this->input->post('comment'),
						'status'       => 'CHECKIN',
						"createDT"	   => $this->packfunction->dtYMDnow(),
						"createBY"	   => $this->UserName,
						"updateDT"	   => $this->packfunction->dtYMDnow(),
						"updateBY"	   => $this->UserName
						);
					$this->db->insert('ts_booked_room_log',$log);
					$startDate->modify("+1 day");
				}


		$dataCashHDR[$sr] = array(
			// 'cashhdrID ' => $this->input->post(''),
				// 'cashCode ' => $bookedCode[0]['CODE'],
			'bookedID ' => $bookedID,
			'roomID ' =>  $roomID[$sr],
			'cashDate ' => $this->packfunction->dtYMDnow(),
			'totalVat ' => $this->input->post('vat'),
			'checkinDiscount' => $this->input->post('checkindiscount'),
			'totalDiscount ' => $chk_out = ($this->input->post('discount') == 0.00) ? 0.00 : $this->input->post('discount'),
			'totalLast ' => $this->input->post('lastamount'),
			'comment ' => "TRANSACTIONS BY".$this->UserName,
			'status ' => 'PAY',
			"createDT"	   => $this->packfunction->dtYMDnow(),
			"createBY"	   => $this->UserName,
			"updateDT"	   => $this->packfunction->dtYMDnow(),
			"updateBY"	   => $this->UserName
			);
		$this->db->where('bookedID',$bookedID);
		$this->db->where('roomID' ,  $roomID[$sr]);
		$this->db->update('ts_cash_hdr',$dataCashHDR[$sr]);

		} // End foreach
		endfor;
	}

	public function saveCancle($key='')
	{
		// ยกเลิกใบจอง
		$saveCheckin= array(
			'comment' => 'CANCLE BY '.$this->UserName,
			'status'  => 'CANCLE',
			"updateDT"=>$this->packfunction->dtYMDnow(),
			"updateBY"=>$this->UserName
			);
		$this->db->where('bookedID',$key);
		$this->db->update('ts_booked',$saveCheckin);

		// ยกเลิกห้องที่จอง
		$saveCheckRoom = array(
			'comment' => 'CANCLE BY '.$this->UserName,
			'status'  => 'CANCLE',
			"updateDT"		    => $this->packfunction->dtYMDnow(),
			"updateBY"		    => $this->UserName
			);
		$this->db->where('bookedID',$key);
		$this->db->update('ts_booked_room',$saveCheckRoom);

		// ดึงข้อมูล รายการห้อง
		$sql =" SELECT roomID FROM  ts_booked_room WHERE bookedID='".$key."' ";
		$qr = $this->db->query($sql);
		$rs =  $qr->result_array();
		foreach ($rs as $rid) {
			// Update สถานะห้อง
			$this->packfunction->updateRoom($status='EMPTY', $roomcode=$rid['roomID']);
		}


		$this->db->where('bookedID',$key);
		$this->db->delete('ts_booked_room_log');
	}

	public function saveService(){
		if($_POST){
			$this->db->where('bookedID',$_POST['bookedID']);
			$this->db->delete('ts_service');

			foreach ($_POST['serviceName'] as $sv => $value) {
				$data[$sv] = array(
					'bookedID' 	  => $_POST['bookedID'],
					'serviceName' => $_POST['serviceName'][$sv],
					'price' 	  => $_POST['price'][$sv],
					'amount'      => $_POST['amount'][$sv],
					'unit'		  => $_POST['unit'][$sv],
					'comment' 	  => '',
					'status'  	  => 'ORDER',
					"createDT"	  => $this->packfunction->dtYMDnow(),
					"createBY"	  => $this->UserName,
					"updateDT"	  => $this->packfunction->dtYMDnow(),
					"updateBY"	  => $this->UserName
					);
				$this->db->insert('ts_service',$data[$sv]);
			}
		}
	}

	public function saveCheckout(){

		if($_POST){
			$key = $_POST['bookedID'];
			$this->db->where('bookedID',$_POST['bookedID']);
			$this->db->delete('ts_service');
			if(isset($_POST['serviceName'])){
				foreach ($_POST['serviceName'] as $sv => $value) {
					$data[$sv] = array(
						'bookedID' 	  => $_POST['bookedID'],
						'serviceName' => $_POST['serviceName'][$sv],
						'price' 	  => $_POST['price'][$sv],
						'amount'      => $_POST['amount'][$sv],
						'unit'		  => $_POST['unit'][$sv],
						'type'		  => 'DESTROY',
						'comment' 	  => '',
						'status'  	  => 'ORDER',
						"createDT"	  => $this->packfunction->dtYMDnow(),
						"createBY"	  => $this->UserName,
						"updateDT"	  => $this->packfunction->dtYMDnow(),
						"updateBY"	  => $this->UserName
						);
					$this->db->insert('ts_service',$data[$sv]);
				}
			}
		}

		// ยกเลิกใบจอง
		$saveCheckin= array(
			'comment' => 'CHECKOUT BY '.$this->UserName,
			'status'  => 'CHECKOUT',
			"updateDT"=>$this->packfunction->dtYMDnow(),
			"updateBY"=>$this->UserName
			);
		$this->db->where('bookedID',$key);
		$this->db->update('ts_booked',$saveCheckin);

		// ยกเลิกห้องที่จอง
		$saveCheckRoom = array(
			'comment' => 'CHECKOUT BY '.$this->UserName,
			'status'  => 'CHECKOUT',
			"updateDT"		    => $this->packfunction->dtYMDnow(),
			"updateBY"		    => $this->UserName
			);
		$this->db->where('bookedID',$key);
		$this->db->update('ts_booked_room',$saveCheckRoom);


		// ดึงข้อมูล รายการห้อง
		$sql =" SELECT roomID FROM  ts_booked_room WHERE bookedID='".$key."' ";
		$qr = $this->db->query($sql);
		$rs =  $qr->result_array();
		foreach ($rs as $rid) {
			// Update สถานะห้อง
			$this->packfunction->updateRoom($status='CLEANING', $roomcode=$rid['roomID']);
		}

		$this->db->where('bookedID',$key);
		$this->db->delete('ts_booked_room_log');

		//save ts_cash_dtl
		$cashhdrID = $this->getBillCheckin(MD5($key));
		// print_r($cashhdrID);

		if(count($cashhdrID)>0)
		{
			$datadtl = array(
				// 'cashdtlID' => $_POST[''],
				'cashhdrID' => $cashhdrID[0]['cashhdrID'],
				'bookedID' => $key,
				'cashDate' => $this->packfunction->dtYMDnow(),
				'discount' => $_POST['discount'],
				'vat' => $_POST['vat'],
				'sumtotal' => $_POST['lastamount'],
				'status' => 'PAY',
				"createDT"	  => $this->packfunction->dtYMDnow(),
				"createBY"	  => $this->UserName,
				"updateDT"	  => $this->packfunction->dtYMDnow(),
				"updateBY"	  => $this->UserName
				);
			$this->db->insert('ts_cash_dtl',$datadtl);
			$idcashdtl = $this->db->insert_id();

			if(isset($_POST['serviceName'])){
				foreach ($_POST['serviceName'] as $svk => $rowsvk) {
					$datadtlList[$svk] = array(
						'cashdtlID'  => $idcashdtl,
						'cashName' => $_POST['serviceName'][$svk],
						'price' => $_POST['price'][$svk],
						'amount' => $_POST['amount'][$svk],
						'unit' => $_POST['unit'][$svk],
						'total' => $_POST['lastamount'],
						"createDT"	  => $this->packfunction->dtYMDnow(),
						"createBY"	  => $this->UserName,
						"updateDT"	  => $this->packfunction->dtYMDnow(),
						"updateBY"	  => $this->UserName
						);
					$this->db->insert('ts_cash_dtl_list' , $datadtlList[$svk]);

				}
			}

		}
	}


	public function getBillCode(){
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$billcode =  $this->db->query("SELECT fn_gen_sn('BLS', 'BLS".$now->format('ym')."') AS CODE")->result_array();

		return $billcode[0]['CODE'];
	}

	function base64_to_png( $base64_string, $output_file ) {
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}

	public function getCheckinAll($keyword='')
	{
		$sql = "
		SELECT
		tb.bookedID,
		tb.bookedCode,
		tb.idcardno,
		tb.idcardnoPath,
		tb.titleName,
		tb.firstName,
		tb.middleName,
		tb.lastName,
		tb.birthdate,
		tb.address,
		tb.district,
		tb.amphur,
		tb.province,
		tb.country,
		tb.postcode,
		tb.mobile,
		tb.licenseplate,
		tb.email,
		DATE_FORMAT(tb.bookedDate,'%d/%m/%Y %H:%i') AS bookedDate,
		tb.checkInAppointDate,
		tb.checkOutAppointDate,
		tb.is_breakfast,
		tb.bookedType,
		tb.cashPledge,
		tb.cashPledgePath,
		tb.comment,
		tb.status,
		tb.createDT,
		tb.createBY,
		tb.updateDT,
		tb.updateBY,
		tbr.bookedroomID,
		tbr.roomID,
		DATE_FORMAT(tbr.checkinDate,'%d/%m/%Y %H:%i') AS checkinDate,
		DATE_FORMAT(tbr.checkoutDate,'%d/%m/%Y %H:%i') AS checkoutDate
		FROM ts_booked tb
		INNER JOIN ts_booked_room tbr ON tb.bookedID = tbr.bookedID
		WHERE tb.status <> 'HIDDEN'
		AND tb.status <> 'LATE'
		AND tb.status <> 'CANCLE'
		AND tb.status <> 'CHECKOUT'
		AND CONCAT(tb.bookedCode,tb.idcardno,tb.firstName,' ',tb.lastName,tbr.roomID) LIKE '%".$keyword."%'
		ORDER BY tb.bookedID DESC
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function booked($key){
		$sql = 	"
		SELECT
		tb.bookedID,
		tb.bookedCode,
		tb.idcardno,
		tb.idcardnoPath,
		tb.titleName,
		tb.firstName,
		tb.middleName,
		tb.lastName,
		DATE_FORMAT(tb.birthdate,'%Y') AS birthdate_y,
		DATE_FORMAT(tb.birthdate,'%m') AS birthdate_m,
		DATE_FORMAT(tb.birthdate,'%d') AS birthdate_d,
		tb.address,
		tb.district,
		tb.amphur,
		tb.province,
		tb.country,
		tb.postcode,
		tb.mobile,
		tb.licenseplate,
		tb.email,
		DATE_FORMAT(tb.bookedDate,'%d/%m/%Y %H:%i') AS bookedDate,
		tb.checkInAppointDate,
		tb.checkOutAppointDate,
		DATE_FORMAT(br.checkinDate,'%d/%m/%Y %H:%i') AS checkinDate,
		DATE_FORMAT(br.checkoutDate,'%d/%m/%Y %H:%i') AS checkOutDate,
		tb.is_breakfast,
		tb.bookedType,
		tb.cashPledge,
		tb.cashPledgePath,
		tb.comment,
		tb.status,
		tb.createDT,
		tb.createBY,
		tb.updateDT,
		tb.updateBY
		FROM ts_booked tb
		LEFT JOIN ts_booked_room br ON  tb.bookedID=br.bookedID
		WHERE MD5(tb.bookedID) = '".$key."'
		GROUP BY tb.bookedID,tb.createDT
		-- GROUP BY tb.bookedID
		";
		$query 	= $this->db->query($sql);
		$rs 	= $query->result_array();
		if (count($rs) > 0) {
			return $rs[0];
		}else{
			return [];
		}

	}

	public function bookedRoom($bookedID){
		/*
		SELECT
		rm.bookedroomID,
		rm.bookedID,
		rm.roomID
		FROM ts_booked_room rm
		 */
		$sql = 	"
		SELECT
		tbr.bookedroomID,
		tbr.bookedID,
		tbr.roomID,
		tr.roomtypeID,
		trp.price_month,
		trp.price_day,
		trp.price_short
		FROM ts_booked_room tbr
		INNER JOIN tm_room tr ON tbr.roomID = tr.roomCODE
		INNER JOIN tm_roomtype trp ON tr.roomtypeID = trp.roomtypeID
		WHERE tbr.bookedID = '".$bookedID."' ";
		$query 	= $this->db->query($sql);
		return $query->result_array();
	}

	public function serviceList($key='',$type=''){
		$sql = 	"
		SELECT
		s.serviceID,
		s.bookedID,
		s.serviceName,
		s.price,
		s.unit,
		s.amount,
		s.type,
		tsch.cashhdrID,
		tsch.cashCode,
		tsch.bookedID,
		tsch.roomID,
		tsch.cashDate,
		tsch.totalVat,
		tsch.totalDiscount,
		tsch.totalLast,
		tsch.comment,
		tscd.cashdtlID,
		tscd.cashDate,
		tscd.discount,
		tscd.vat,
		tscd.sumtotal,
		tscd.status,
		tscdl.cashdtllistID,
		tscdl.cashdtlID,
		tscdl.cashName,
		tscdl.price AS tscdlPrice,
		tscdl.amount AS tscdlAmount,
		tscdl.unit AS tscdlUnit,
		tscdl.total AS tscdlTotal
		FROM ts_service s
		INNER JOIN ts_cash_hdr tsch ON tsch.bookedID =  s.bookedID
		INNER JOIN ts_cash_dtl tscd ON tscd.cashhdrID = tsch.cashhdrID
		INNER JOIN ts_cash_dtl_list tscdl ON tscdl.cashdtlID = tscd.cashdtlID
		WHERE MD5(s.bookedID) = '".$key."'
		AND s.type = '".$type."'
		AND s.status<>'CANCLE'
		AND s.status<>'HIDDEN'
		GROUP BY s.serviceID
		";
		$query 	= $this->db->query($sql);
		return $query->result_array();
	}

	public function outdontservice($id='')
	{
		$sql = "
		SELECT
		ts_booked.bookedID,
		ts_booked.bookedCode,
		ts_booked.firstName,
		ts_booked.lastName,
		ts_booked.address,
		ts_booked.mobile,
		ts_booked_room.roomID,
		ts_booked_room.checkinDate,
		ts_booked_room.checkoutDate,
		ts_cash_hdr.cashDate,
		ts_cash_hdr.totalVat,
		ts_cash_hdr.totalDiscount,
		ts_cash_hdr.totalLast,
		ts_cash_dtl.discount
		FROM ts_booked INNER JOIN ts_booked_room ON ts_booked.bookedID = ts_booked_room.bookedID
		INNER JOIN ts_cash_hdr ON ts_booked_room.roomID = ts_cash_hdr.roomID
		INNER JOIN ts_cash_dtl ON ts_booked_room.bookedID = ts_cash_dtl.bookedID
		WHERE MD5(ts_booked.bookedID) = '".$id."'
		GROUP BY ts_booked_room.checkoutDate
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

	public function getBillCheckin($value='')
	{
		$sql = "
		SELECT
		tb.bookedID,
		tb.bookedCode,
		tb.idcardno,
		tb.idcardnoPath,
		tb.titleName,
		tb.firstName,
		tb.middleName,
		tb.lastName,
		tb.birthdate,
		tb.address,
		tb.district,
		tb.amphur,
		tb.province,
		tb.country,
		tb.postcode,
		tb.mobile,
		tb.licenseplate,
		tb.email,
		DATE_FORMAT(tb.bookedDate,'%d/%m/%Y %H:%i') AS bookedDate,
		tb.checkInAppointDate,
		tb.checkOutAppointDate,
		tb.is_breakfast,
		tb.bookedType,
		tb.cashPledge,
		tb.cashPledgePath,
		tb.comment,
		tb.status,
		tb.createDT,
		tb.createBY,
		tb.updateDT,
		tb.updateBY,
		tbr.bookedroomID,
		tbr.roomID,
		DATE_FORMAT(tbr.checkinDate,'%d/%m/%Y %H:%i') AS checkinDate,
		DATE_FORMAT(tbr.checkoutDate,'%d/%m/%Y %H:%i') AS checkoutDate,
		tmrt.bed,
		tmrt.roomtypeCode,
		tmrt.price_month,
		tmrt.price_hour,
		tmrt.price_short,
		tmrt.price_day,
		tsch.cashhdrID,
		tsch.cashCode,
		tsch.roomID AS cashr_roomID,
		tsch.cashDate,
		tsch.totalVat,
		tsch.checkinDiscount,
		tsch.totalDiscount,
		tsch.totalLast,
		tsch.comment,
		tsch.status,
		tsch.createDT
		FROM ts_booked tb
		INNER JOIN ts_booked_room tbr ON tb.bookedID = tbr.bookedID
		INNER JOIN tm_room tmr ON tmr.roomCODE = tbr.roomID
		INNER JOIN tm_roomtype tmrt ON tmrt.roomtypeID = tmr.roomtypeID
		INNER JOIN ts_cash_hdr tsch ON tsch.bookedID  = tb.bookedID
		#WHERE tb.status <> 'HIDDEN'
		#AND tb.status <> 'LATE'
		#AND tb.status <> 'CANCLE'
		#AND tb.status <> 'CHECKOUT'
		WHERE MD5(tb.bookedID) = '".$value."'
		GROUP BY tbr.roomID
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function getCashHDR($id = '')
	{
		$sql = "
		SELECT
		cashhdrID,
		cashCode,
		bookedID,
		roomID,
		cashDate,
		totalVat,
		totalDiscount,
		totalLast,
		comment,
		status,
		createDT,
		createBY,
		updateDT
		FROM ts_cash_hdr
		WHERE MD5(bookedID) = '".$id."'
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function report_checkin($keyword = '')
	{
	// แสดงรายงานยอดเช่าห้อง
		$sql = "
		SELECT
		tb.bookedID,
		tbr.bookedroomID,
		tbr.roomID,
		tb.bookedCode,
		tb.idcardno,
		tb.idcardnoPath,
		tb.titleName,
		tb.firstName,
		tb.middleName,
		tb.lastName,
		tb.birthdate,
		tb.address,
		tb.mobile,
		tb.licenseplate,
		tb.email,
		DATE_FORMAT(tb.bookedDate,'%d/%m/%Y %H:%i') AS bookedDate,
		tb.checkInAppointDate,
		tb.checkOutAppointDate,
		tb.is_breakfast,
		tb.bookedType,
		tb.cashPledge,
		tb.checkPledge,
		tb.cashPledgePath,
		tb.`comment`,
		tb.`status`,
		tb.createDT,
		tb.createBY,
		tb.updateDT,
		tb.updateBY,
		DATE_FORMAT(tbr.checkinDate,'%d/%m/%Y %H:%i') AS checkinDate,
		DATE_FORMAT(tbr.checkoutDate,'%d/%m/%Y %H:%i') AS checkoutDate,
		tch.cashCode,
		tch.cashDate,
		tch.totalVat,
		tch.checkinDiscount,
		tch.totalDiscount,
		tch.totalLast,
		tch.checktotalLast,
		tcd.cashdtLID,
		tcd.discount,
		tcd.vat,
		tcd.sumtotal,
		tcd.checkservice
		FROM ts_booked tb
		INNER JOIN ts_booked_room tbr ON tb.bookedID = tbr.bookedID
		INNER JOIN ts_cash_hdr tch ON tbr.bookedID = tch.bookedID
		LEFT JOIN ts_cash_dtl tcd ON tch.cashhdrID = tcd.cashhdrID
		WHERE tb.status <> 'HIDDEN'
		AND tb.status <> 'LATE'
		AND tb.status <> 'CANCLE'
		AND CONCAT(tb.bookedCode,tb.idcardno,tb.firstName,' ',tb.lastName,tbr.roomID,DATE_FORMAT(tb.checkInAppointDate,'%d/%m/%Y')) LIKE '%".$keyword."%'
		GROUP BY tbr.bookedroomID
		#GROUP BY tb.bookedCode
		ORDER BY tb.updateDT DESC
		";
		$data = $this->db->query($sql)->result_array();
		return $data;

	}

	public function checkPledge()
	{
		$data = array(
			"checkPledge" 	=> $this->input->post('checked'),
			"updateDT"	  => $this->packfunction->dtYMDnow(),
			"updateBY"	  => $this->UserName
			);
		$this->db->where('bookedID',$this->input->post('checkPledge'));
		$this->db->update('ts_booked',$data);
	}


	public function checkrete()
	{
		$data = array(
			"checktotalLast" 	=> $this->input->post('checked'),
			"updateDT"	  => $this->packfunction->dtYMDnow(),
			"updateBY"	  => $this->UserName
			);
		$this->db->where('bookedID',$this->input->post('checkrete'));
		$this->db->update('ts_cash_hdr',$data);
	}

	public function checkservice()
	{
		$data = array(
			"checkService" 	=> $this->input->post('checked'),
			"updateDT"	  => $this->packfunction->dtYMDnow(),
			"updateBY"	  => $this->UserName
			);
		$this->db->where('bookedID',$this->input->post('checkservice'));
		$this->db->update('ts_cash_dtl',$data);
	}

}


