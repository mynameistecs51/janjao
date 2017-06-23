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
		$data = array(
			'bookedID' => '',
			'bookedCode' => '',
			'idcardno' => $this->input->post('idcardno'),
			'idcardnoPath' => $_FILES['images'],
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
		print_r($data);
	}

}

/* End of file Mdl_booked.php */
/* Location: ./application/models/Mdl_booked.php */