<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booked extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();

	}

	public function getBookedAll($keyword='',$status='')
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
		DATE_FORMAT(tb.checkInAppointDate,'%d/%m/%Y %H:%i') AS checkInAppointDate,
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
		INNER JOIN ts_booked_room tbr	ON tbr.bookedID = tb.bookedID
		WHERE tbr.status = '".$status."'
		AND CONCAT(tb.bookedCode,tb.idcardno,tb.firstName,' ',tb.lastName,tbr.roomID,DATE_FORMAT(tb.bookedDate,'%d/%m/%Y')) LIKE '%".$keyword."%'
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function saveAdd()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));

		$bookedCode =  $this->db->query("SELECT fn_gen_sn('BK', 'BK".$now->format('ym')."') AS CODE")->result_array();
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
			'bookedCode' 	=> $bookedCode[0]['CODE'],
			'idcardno' 		=> $this->input->post('idcardno'),
			'idcardnoPath'	=>$fileName,
			'titleName'		=> $this->input->post('gender'),
			'firstName' 	=> $this->input->post('firstName'),
			'middleName' 	=> '',
			'lastName' 		=> $this->input->post('lastName'),
			'birthdate' 	=> $this->input->post('birthdate_y').'-'.$this->input->post('birthdate_m').'-'.$this->input->post('birthdate_d').' 00:00:00',
			'address' 		=> $this->input->post('address'),
			'mobile' 		=> $this->input->post('mobile'),
			'licenseplate' 	=> $this->input->post('licenseplate'),
			'email' 		=> $this->input->post('email'),
			'bookedDate' 	=> $this->packfunction->dtTosql($this->input->post('bookedDate')),
			'checkInAppointDate' => $this->packfunction->dtTosql($this->input->post('checkinDate')),
			'checkOutAppointDate'=> $this->packfunction->dtTosql($this->input->post('checkOutDate')),
			'is_breakfast' 	=> $this->input->post('is_breakfast'),
			'bookedType' 	=> $this->input->post('bookedType'),
			'cashPledge' 	=>  $this->input->post('deposit'),
			'cashPledgePath'=> '',
			'comment' 	=> $this->input->post('comment'),
			'status' 	=> 'BOOKED',
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
				'status '       => 'BOOKED',
				"createDT"		=> $this->packfunction->dtYMDnow(),
				"createBY"		=> $this->UserName,
				"updateDT"		=> $this->packfunction->dtYMDnow(),
				"updateBY"		=> $this->UserName
				);
		$this->db->insert('ts_booked_room',$saveBookedRoom[$i]);
		$idBookedRoom[$i] = $this->db->insert_id();

		// Update สถานะห้อง
		$this->packfunction->updateRoom($status='BOOKED', $roomcode=$room[$i]);

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
				'bookedID '    => $idBooked,
				'bookedroomID' => $idBookedRoom[$i],
				'roomID'       => $room[$i],
				'logDate'      => $startDate->format('Y-m-d').' 12:00:00',
				'comment'      => $this->input->post('comment'),
				'status'       => 'BOOKED',
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
			'totalVat ' => '',//$this->input->post('vat'),
			'totalDiscount ' => '',//$this->input->post('discount'),
			'totalLast ' => '',//$this->input->post('lastamount'),
			'comment ' => "TRANSACTIONS BY".$this->UserName,
			'status ' => 'PAY',
			"createDT"	   => $this->packfunction->dtYMDnow(),
			"createBY"	   => $this->UserName,
			"updateDT"	   => $this->packfunction->dtYMDnow(),
			"updateBY"	   => $this->UserName
			);
		$this->db->insert('ts_cash_hdr',$dataCashHDR[$i]);
		endfor; // End ts_booked_room

	}

	public function saveUpdate()
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
			'status' => 'BOOKED',
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
				'status '       => 'BOOKED',
				"updateDT"		=> $this->packfunction->dtYMDnow(),
				"updateBY"		=> $this->UserName
				);
			$bookedroomID[$sr] = $this->input->post('bookedroomID')[$sr];
			$this->db->where('bookedroomID',$bookedroomID[$sr]);
			$this->db->update('ts_booked_room',$saveCheckRoom[$sr]);

			// Update สถานะห้อง
			$this->packfunction->updateRoom($status='BOOKED', $roomcode=$this->input->post('roomID')[$sr]);

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
					'status'       => 'BOOKED',
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


	function base64_to_png( $base64_string, $output_file ) {  //create picture
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}

	function getRoom($floor='',$checkinDate='',$checkoutDate=''){
		$df = $checkinDate[6].$checkinDate[7].$checkinDate[8].$checkinDate[9].'-'.$checkinDate[3].$checkinDate[4].'-'.$checkinDate[0].$checkinDate[1].' '.$checkinDate[11].$checkinDate[12].':'.$checkinDate[14].$checkinDate[15];
		$dt = $checkoutDate[6].$checkoutDate[7].$checkoutDate[8].$checkoutDate[9].'-'.$checkoutDate[3].$checkoutDate[4].'-'.$checkoutDate[0].$checkoutDate[1].' '.$checkoutDate[11].$checkoutDate[12].':'.$checkoutDate[14].$checkoutDate[15];

		$sql = "
		SELECT
		r.roomID,
		r.roomtypeID,
		rt.roomtypeCode,
		rt.price_day,
		rt.price_month,
		rt.price_short,
		rt.bed,
		r.roomCODE,
		r.transaction AS transclean,
		IFNULL(log.status,'EMPTY') AS transaction,
		r.floor,
		IFNULL(DATE_FORMAT(br.checkinDate,'%d/%m/%Y'),'') AS checkinDate,
		IFNULL(DATE_FORMAT(br.checkoutDate,'%d/%m/%Y'),'') AS checkoutDate,
		IFNULL(log.total,0) AS total,
		r.status,
		DATE_FORMAT(DATE_ADD(r.updateDT,INTERVAL 30 MINUTE),'%d/%m/%Y %H:%i') AS checkdt,
		DATE_FORMAT(r.updateDT,'%d/%m/%Y  %H:%i') AS updateDT
		FROM tm_room r
		LEFT JOIN tm_roomtype rt ON r.roomtypeID=rt.roomtypeID
		LEFT JOIN (
			SELECT br.bookedroomID,br.roomID,br.checkinDate,br.checkoutDate
			FROM ts_booked_room br
			INNER JOIN (
					SELECT roomID,MAX(bookedroomID) AS bookedroomID
					FROM ts_booked_room
					WHERE status <> 'CANCLE'
					GROUP BY roomID
			) AS a ON br.bookedroomID=a.bookedroomID
		) AS br ON r.roomCODE=br.roomID
		LEFT JOIN (
			SELECT
			lg.roomID,
			COUNT(lg.logroomdateID) AS total,
			CASE
				WHEN COUNT(lg.logroomdateID) > 0 THEN lg.status
				ELSE 'EMPTY'
			END AS `status`
			FROM ts_booked_room_log lg
			WHERE lg.logDate BETWEEN '".$df.":01' AND '".$dt.":00'
			GROUP by lg.roomID
		) AS log ON r.roomCODE=log.roomID
		WHERE r.floor = '".$floor."'
		GROUP BY r.roomID
		ORDER BY r.roomID ASC ";
		$data = $this->db->query($sql);
		return $data->result_array();
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
		WHERE MD5(tb.bookedID) = '".$key."' ";
		$query 	= $this->db->query($sql);
		$rs 	= $query->result_array();
		if (count($rs) > 0) {
			return $rs[0];
		}else{
			return [];
		}

	}

	public function bookedRoom($bookedID){
		# SELECT
		# rm.bookedroomID,
		# rm.bookedID,
		#rm.roomID
		#FROM ts_booked_room rm
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

	public function updateRoomStatus($numRoom)
	{
		$this->db->where('roomCODE',$numRoom);
		$this->db->update('tm_room',array('transaction'=>'EMPTY'));
	}

	// public function report_checkout($value = "")
	// {
	// 	$sql = "
	// 	SELECT
	// 	tb.bookedID,
	// 	tb.bookedCode,
	// 	tb.idcardno,
	// 	tb.idcardnoPath,
	// 	tb.titleName,
	// 	tb.firstName,
	// 	tb.middleName,
	// 	tb.lastName,
	// 	tb.birthdate,
	// 	tb.address,
	// 	tb.cashPledge,
	// 	tb.status,
	// 	tb.createDT,
	// 	tbr.roomID,
	// 	tbr.checkinDate,
	// 	tbr.checkoutDate,
	// 	tch.totalLast,
	// 	tcd.sumtotal,
	// 	tcd.discount
	// 	FROM
	// 	ts_booked tb
	// 	INNER JOIN ts_booked_room  tbr ON tb.bookedID =	tbr.bookedID
	// 	INNER JOIN ts_cash_hdr tch ON tbr.bookedID =	tch.bookedID
	// 	INNER JOIN ts_cash_dtl tcd ON tch.cashhdrID =		tcd.cashhdrID
	// 	";
	// 	$query = $this->db->query($sql)->result_array();
	// 	return $query;
	// }

}

