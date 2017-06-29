<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_checkin extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}


	public function saveAdd()
	{
		$bookedCode = $this->db->query("SELECT fn_gen_sn('TS', 'TS1706') AS CODE")->result_array();
		$img = $this->input->post('images');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = 'assets/images/imgcard/'.$this->input->post('idcardno').'.png';
		$success = file_put_contents($file, $data);

		$saveAdd= array(
			'bookedCode' => $bookedCode[0]['CODE'],
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' => $this->input->post('idcardno').'.png',
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
			'bookedDate' => $this->packfunction->dtYMDnow(),
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
		$idCheckin= $this->db->insert_id();
	// }

	// public function saveAddBookedRoom($idCheckin)
	// {
		$selectRoom = $this->input->post('selectRoom');
		$room = explode('_',$selectRoom);
		for ($i=0; $i < count($room) ; $i++) :
			$saveCheckin[$i] = array(
				'bookedID '     => $idCheckin,
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
		$this->db->insert('ts_booked_room',$saveCheckin[$i]);
		$idCheckinRoom[$i] = $this->db->insert_id();
		endfor;
	// }

	// public function saveAddBookedRoomLog($idCheckinRoom)
	// {
		$selectRoom = $this->input->post('selectRoom');
		$room = explode('_',$selectRoom);
		for ($i=0; $i < count($room) ; $i++) :
			$saveCheckinLog[$i] = array(
				'bookedroomID' => $idCheckinRoom[$i],
				'roomID'       => $room[$i],
				'logDate'      => $this->packfunction->dtYMDnow(),
				'comment'      => $this->input->post('comment'),
				'status'       => 'BOOKED',
				"createDT"		   => $this->packfunction->dtYMDnow(),
				"createBY"		   => $this->UserName,
				"updateDT"		   => $this->packfunction->dtYMDnow(),
				"updateBY"		   => $this->UserName
				);
		$this->db->insert('ts_booked_room_log',$saveCheckinLog[$i]);
		endfor;
	}

	function base64_to_png( $base64_string, $output_file ) {
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}
}

/* End of file Mdl_checkin.php */
/* Location: ./application/models/Mdl_checkin.php */