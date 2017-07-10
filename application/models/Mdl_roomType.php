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
		CASE bed
		WHEN 'SINGLE' THEN 'เตียงดี่ยว'
		WHEN 'MULTIPLE' THEN 'เตียงคู่'
		END  bed,
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
		ORDER BY roomtypeID ASC
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

	public function getRoomtypeID($id)
	{
		$sql = "
		SELECT
		tmrt.roomtypeID,
		CASE tmrt.bed
		WHEN 'SINGLE' THEN 'เตียงดี่ยว'
		WHEN 'MULTIPLE' THEN 'เตียงคู่'
		END  bed,
		tmrt.roomtypeCode,
		tmrt.price_month,
		tmrt.price_day,
		tmrt.price_short,
		tmrt.price_hour,
		tmrt.comment,
		tmrt.status,
		tmrt.createDT,
		tmrt.createBY,
		tmrt.updateDT,
		tmrt.updateBY
		FROM tm_roomtype tmrt 
		WHERE  MD5(tmrt.roomtypeID) ='".$id."' ";
		$query = $this->db->query($sql);
		$rs = $query->result_array();
		if(count($rs)>0){
			return $rs[0];
		}else{
			return [];
		}
		
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
			'price_hour'		=> '0.00',
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

	public function saveEdit()
	{
		$data =array(
			'bed'          => $this->input->post('bed'),
			'roomtypeCode' => $this->input->post('roomtypeCode'),
			'price_short'  => $this->input->post('price_short'),
			'price_hour'   => '0.00',
			'price_day'    => $this->input->post('price_day'),
			'price_month'  => $this->input->post('price_month'),
			'status'			    => $this->input->post('status'),
			'comment'		    => $this->input->post('comment'),
			"createDT"		   => $this->packfunction->dtYMDnow(),
			"createBY"		   => $this->UserName,
			"updateDT"		   => $this->packfunction->dtYMDnow(),
			"updateBY"		   => $this->UserName
			);
		$this->db->where('roomtypeID' , $this->input->post('roomtypeID'));
		$this->db->update('tm_roomtype',$data);
	}

	public function deleteRoomtype($id)
	{ 
		$this->db->where('roomtypeID',$id);
		$this->db->delete('tm_roomtype');
	}

}

/* End of file Mdl_roomType.php */
/* Location: ./application/models/Mdl_roomType.php */