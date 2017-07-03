<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_room extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getRoomAll()
	{
		$sql = "
		SELECT
		tm_r.roomID,
		tm_r.floor,
		tm_r.zone,
		tm_r.roomCODE,
		tm_r.transaction,
		tm_r.comment,
		tm_r.status,
		tm_r.createDT,
		tm_r.createBY,
		tm_r.updateDT,
		tm_r.updateBy,
		tm_r.roomtypeID,
		tm_rt.bed,
		tm_rt.roomtypeCode,
		tm_rt.price_month,
		tm_rt.price_day,
		tm_rt.price_short,
		tm_rt.price_hour,
		tm_rt.status
		FROM tm_room tm_r
		INNER JOIN tm_roomtype tm_rt
		ON tm_r.roomtypeID = tm_rt.roomtypeID
		ORDER BY tm_r.roomCODE ASC
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

	public function getRoomID($id)
	{
		$sql = "
		SELECT
		tm_r.roomID,
		tm_r.floor,
		tm_r.zone,
		tm_r.roomCODE,
		tm_r.transaction,
		tm_r.comment,
		tm_r.status,
		tm_r.createDT,
		tm_r.createBY,
		tm_r.updateDT,
		tm_r.updateBy,
		tm_r.roomtypeID,
		tm_rt.bed,
		tm_rt.roomtypeCode,
		tm_rt.price_month,
		tm_rt.price_day,
		tm_rt.price_short,
		tm_rt.price_hour,
		tm_rt.status
		FROM tm_room tm_r
		INNER JOIN tm_roomtype tm_rt
		ON tm_r.roomtypeID = tm_rt.roomtypeID
		WHERE MD5(tm_r.roomID) = '".$id."'
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}

}

/* End of file Mdl_room.php */
/* Location: ./application/models/Mdl_room.php */