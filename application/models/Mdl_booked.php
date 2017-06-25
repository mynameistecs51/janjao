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
		// $img = $_POST['images'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = 'assets/images/imgcard/test2.png';
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
		// $idcardnoPath = $this->base64_to_png($this->input->post('images'),'test.png');  //อันนี้มันติด data permission รับข้อมูลมาจาก imageData จาก BookedFormAdd

		$data1= array(
			'bookedID' => '',
			'bookedCode' => '',
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' => '',
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
			'bookedType' => '',
			'cashPledge' => '',
			'cashPledgePath' => '',
			'comment' => '',
			'status' => '',
			'createDT' =>$this->dtnow,
			'createBY' => '',
			'updateDT' => $this->dtnow,
			'updateBY' => '',
			);
		echo "<pre>";
		// print_r(base64_decode($_POST['images']));

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