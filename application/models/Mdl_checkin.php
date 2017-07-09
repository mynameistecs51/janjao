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

		$selectRoom = $this->input->post('selectRoom');
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

		$dataCashHDR = array(
			// 'cashhdrID ' => $this->input->post(''),
			'cashCode ' => $bookedCode[0]['CODE'],
			'bookedID ' => $idBooked,
			'roomID ' => $room[$i],
			'cashDate ' => $this->packfunction->dtYMDnow(),
			'totalVat ' => $this->input->post('vat'),
			'totalDiscount ' => $this->input->post('discount'),
			'totalLast ' => $this->input->post('lastamount'),
			'comment ' => $this->input->post('comment'),
			'status ' => 'PAY',
			"createDT"	   => $this->packfunction->dtYMDnow(),
			"createBY"	   => $this->UserName,
			"updateDT"	   => $this->packfunction->dtYMDnow(),
			"updateBY"	   => $this->UserName
			);
		$this->db->insert('ts_cash_hdr',$dataCashHDR);
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



		foreach ($this->input->post('bookedroomID') as $sr => $value) {

			$saveCheckRoom[$sr] = array(
				'bookedID '     => $bookedID,
				'roomID '       => $this->input->post('roomID')[$sr],
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
					'roomID'       => $this->input->post('roomID')[$sr],
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
		} // End ts_booked_room
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


		$this->db->where('bookedID',$key);
		$this->db->delete('ts_booked_room_log');

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
		GROUP BY tb.bookedID ";
		$query 	= $this->db->query($sql);
		$rs 	= $query->result_array();
		if (count($rs) > 0) {
			return $rs[0];
		}else{
			return [];
		}

	}

	public function bookedRoom($bookedID){
		$sql = 	"
		SELECT
		rm.bookedroomID,
		rm.bookedID,
		rm.roomID
		FROM ts_booked_room rm
		WHERE rm.bookedID = '".$bookedID."' ";
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
		s.type
		FROM ts_service s
		WHERE MD5(s.bookedID) = '".$key."'
		AND s.type = '".$type."'
		AND s.status<>'CANCLE'
		AND s.status<>'HIDDEN' ";
		$query 	= $this->db->query($sql);
		return $query->result_array();
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
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

}


