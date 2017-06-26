<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_booked extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();

	}

	public function saveAdd()
	{

		$img = $this->input->post('images');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = 'assets/images/imgcard/'.$this->input->post('idcardno').'.png';
		$success = file_put_contents($file, $data);

		$saveAdd= array(
			'bookedCode' => '1',
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' => $this->input->post('idcardno').'.png',
			'titleName' => $this->input->post('gender'),
			'firstName' => $this->input->post('firstName'),
			'middleName' => '',
			'lastName' => $this->input->post('lastName'),
			'birthdate' => $this->input->post('birthDate-birthMonth-birthYear'),
			'address' => $this->input->post('addDress'),
			'district' => $this->input->post('district'),
			'province' => $this->input->post('province'),
			'country' => '',
			'postcode' => $this->input->post('zipcode'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'bookedDate' => $this->input->post('bookedDate'),
			'checkInAppointDate' => $this->input->post('checkinDate'),
			'checkOutAppointDate' => $this->input->post('checkOutDate'),
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
	// }

	// public function saveAddBookedRoom($idBooked)
	// {
		$selectRoom = $this->input->post('selectRoom');
		$room = explode('_',$selectRoom);
		for ($i=0; $i < count($room) ; $i++) :
			$saveBookedRoom[$i] = array(
				'bookedID '     => $idBooked,
				'roomID '       => $room[$i],
				'checkinDate '  => $_POST['checkinDate'],
				'checkoutDate ' => $this->input->post('checkOutDate'),
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
	// }

	// public function saveAddBookedRoomLog($idBookedRoom)
	// {
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

	function base64_to_png( $base64_string, $output_file ) {
		fopen($base64_string,'w');
		$ifp = fopen( $output_file, "r+" );
		fwrite( $ifp, base64_decode( $base64_string) );
		fclose( $ifp );
		return( $output_file );
	}

}

/* End of file Mdl_booked.php */
/* Location: ./application/models/Mdl_booked.php */