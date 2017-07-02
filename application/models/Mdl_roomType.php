<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_roomType extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();
	}

	public function getRoomTypeAll()
	{
		$sql = "
		SELECT
		roomtypeID,
		bed,
		roomtypeCode,
		price_month,
		price_day,
		price_short,
		price_hour,
		comment,
		status,
		createDT,
		createBY,
		updateDT,
		updateBY
		FROM tm_roomtype
		ORDER BY roomtypeID DESC
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

	public function saveAdd()
	{
		$data = array(
			// 'roomtypeID'	   => $this->input->post(),
			'bed'				  => $this->input->post('bed'),
			'roomtypeCode'  => $this->input->post('roomtypeCode'),
			'price_month' 	 => $this->input->post('price_month'),
			'price_day' 		  => $this->input->post('price_day'),
			'price_short'	  => $this->input->post('price_short'),
			'price_hour'		=> $this->input->post('price_hour'),
			'comment' 		    => $this->input->post('comment'),
			'status' 			    => $this->input->post('status'),
			"createDT"		    => $this->packfunction->dtYMDnow(),
			"createBY"		    => $this->UserName,
			"updateDT"		    => $this->packfunction->dtYMDnow(),
			"updateBY"		    => $this->UserName
			);
		$this->db->insert('tm_roomtype', $data);
		redirect('roomtype','refresh');
	}

}

/* End of file Mdl_roomType.php */
/* Location: ./application/models/Mdl_roomType.php */