<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booked extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();

	}

	public function getBookedAll()
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
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function saveAdd()
	{
		$bookedCode =  $this->db->query("SELECT fn_gen_sn('TS', 'TS1706') AS CODE")->result_array();
		$fileName = '';
		if( !empty($this->input->post('images'))){
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
			'birthdate' => $this->packfunction->dtTosql($this->input->post('birthDate')),
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
			'status' => 'ON',
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
		endfor;

		$selectRoom = $this->input->post('selectRoom');
		$room = explode('_',$selectRoom);
		for ($i=0; $i < count($room) ; $i++) :
			$saveBookedRoomLog[$i] = array(
				'bookedroomID' => $idBookedRoom[$i],
				'roomID'       => $room[$i],
				'logDate'      => $this->packfunction->dtYMDnow(),
				'comment'      => $this->input->post('comment'),
				'status'       => 'BOOKED',
				"createDT"		   => $this->packfunction->dtYMDnow(),
				"createBY"		   => $this->UserName,
				"updateDT"		   => $this->packfunction->dtYMDnow(),
				"updateBY"		   => $this->UserName
				);
		$this->db->insert('ts_booked_room_log',$saveBookedRoomLog[$i]);
		endfor;
	}

	function base64_to_png( $base64_string, $output_file ) {  //create picture
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}

	function getRoom($floor='',$zone=''){
		$sql = "
		SELECT
		r.roomID,
		r.roomtypeID,
		rt.roomtypeCode,
		rt.bed,
		r.roomCODE,
		r.transaction,
		r.floor,
		'28/06/2017' AS checkinDate,
		'30/06/2017' AS checkoutDate
		FROM tm_room r
		LEFT JOIN tm_roomtype rt ON r.roomtypeID=rt.roomtypeID
		WHERE r.status='ON'
		AND r.floor = '".$floor."'
		ORDER BY r.roomID ASC
		";
		$data = $this->db->query($sql);
		return $data->result_array();
	}

}

/* End of file Mdl_booked.php */
/* Location: ./application/models/Mdl_booked.php */