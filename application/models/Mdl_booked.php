<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booked extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();

	}

	public function getBookedAll($keyword='')
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
					tb.province,
					tb.country,
					tb.postcode,
					tb.mobile,
					tb.email,
					tb.bookedDate,
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
					tbr.checkinDate,
					tbr.checkoutDate,
					tbr.comment,
					tbr.status
				FROM ts_booked tb
				INNER JOIN ts_booked_room tbr
				ON tbr.bookedID = tb.bookedID
				WHERE tbr.status = 'BOOKED'
				AND CONCAT(tb.bookedCode,tb.idcardno,tb.firstName,' ',tb.lastName,tbr.roomID) LIKE '%".$keyword."%'
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
			'bookedCode' => $bookedCode[0]['CODE'],
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' =>$fileName,
			'titleName' => $this->input->post('gender'),
			'firstName' => $this->input->post('firstName'),
			'middleName' => '',
			'lastName' => $this->input->post('lastName'),
			'birthdate' => $this->input->post('birthdate_y').'-'.$this->input->post('birthdate_m').'-'.$this->input->post('birthdate_d').' 00:00:00',
			'address' => $this->input->post('addDress'),
			'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'country' => '',
			'postcode' => $this->input->post('zipcode'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'bookedDate' => $this->packfunction->dtTosql($this->input->post('bookedDate')),
			'checkInAppointDate' => $this->packfunction->dtTosql($this->input->post('checkinDate')),
			'checkOutAppointDate' => $this->packfunction->dtTosql($this->input->post('checkOutDate')),
			'is_breakfast' => $this->input->post('is_breakfast'),
			'bookedType' => $this->input->post('bookedType'),
			'cashPledge' => '',
			'cashPledgePath' => '',
			'comment' => $this->input->post('comment'),
			'status' => 'BOOKED',
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


		endfor; // End ts_booked_room

		

	}

	function base64_to_png( $base64_string, $output_file ) {  //create picture
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}

	function getRoom($floor='',$checkinDate='',$checkoutDate=''){
		$df = $checkinDate[6].$checkinDate[7].$checkinDate[8].$checkinDate[9].'-'.$checkinDate[3].$checkinDate[4].'-'.$checkinDate[0].$checkinDate[1]; //.' '.$checkinDate[11].$checkinDate[12].':'.$checkinDate[14].$checkinDate[15];
		$dt = $checkoutDate[6].$checkoutDate[7].$checkoutDate[8].$checkoutDate[9].'-'.$checkoutDate[3].$checkoutDate[4].'-'.$checkoutDate[0].$checkoutDate[1]; //.' '.$checkoutDate[11].$checkoutDate[12].':'.$checkoutDate[14].$checkoutDate[15];
		$sql = "
		SELECT
		r.roomID,
		r.roomtypeID,
		rt.roomtypeCode,
		rt.bed,
		r.roomCODE, 
		IFNULL(log.status,'EMPTY') AS transaction, 
		r.floor,
		IFNULL(DATE_FORMAT(br.checkinDate,'%d/%m/%Y'),'') AS checkinDate,
		IFNULL(DATE_FORMAT(br.checkoutDate,'%d/%m/%Y'),'') AS checkoutDate,
		IFNULL(log.total,0) AS total
		FROM tm_room r
		LEFT JOIN tm_roomtype rt ON r.roomtypeID=rt.roomtypeID
		LEFT JOIN ts_booked_room br ON r.roomCODE=br.roomID
		LEFT JOIN (
			SELECT 
				lg.roomID,
			    COUNT(lg.logroomdateID) AS total,
			    lg.status
			FROM ts_booked_room_log lg 
			WHERE lg.logDate BETWEEN '".$df." 11:59:00' AND '".$dt." 13:00:00'
			GROUP by lg.roomID
		) AS log ON r.roomCODE=log.roomID
		WHERE r.status<>'DISABLE'
		AND r.floor = '".$floor."'
		ORDER BY r.roomID ASC
		";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

}

/* End of file Mdl_booked.php */
/* Location: ./application/models/Mdl_booked.php */