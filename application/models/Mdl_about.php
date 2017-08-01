<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_about extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->dtnow = $this->packfunction->dtYMDnow();
	}

	public function getAllabout($keyword ='')
	{
		$sql = "
		SELECT
		tc.companyID,
		tc.address,
		tc.mobile,
		tc.vatNumber,
		tc.comment,
		tc.updateDT,
		tc.updateBY
		FROM tm_company tc
		WHERE CONCAT(MD5(tc.companyID),'',tc.address,tc.mobile,tc.vatNumber) LIKE '%".$keyword."%'
		ORDER BY tc.companyID DESC
		";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	public function saveAdd()
	{
		$data = array(
			'address' => str_replace('\n','<br>',$this->input->post('address')),
			'mobile' => $this->input->post('mobile'),
			'vatNumber' => $this->input->post('vatNumber'),
			'comment' => $this->input->post('comment'),
			"updateDT"		=>$this->packfunction->dtYMDnow(),
			"updateBY"		=>$this->UserName
			);
		$this->db->insert('tm_company',$data);
	}

	public function saveEdit()
	{
		$data = array(
			'address' => str_replace('\n','<br>',$this->input->post('address')),
			'mobile' => $this->input->post('mobile'),
			'vatNumber' => $this->input->post('vatNumber'),
			'comment' => $this->input->post('comment'),
			"updateDT"		=>$this->packfunction->dtYMDnow(),
			"updateBY"		=>$this->UserName
			);
		$this->db->where('companyID',$this->input->post('companyID'));
		$this->db->update('tm_company',$data);
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */