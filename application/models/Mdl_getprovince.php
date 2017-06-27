<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_getprovince extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function getProvince($zipcode) // province and zipcode
	{
		$sql_query ='SELECT z.ZIPCODE,p.PROVINCE_ID,p.PROVINCE_NAME,a.AMPHUR_ID,a.AMPHUR_NAME,d.DISTRICT_ID,d.DISTRICT_NAME
		FROM zipcode z
		INNER JOIN province p
		ON z.PROVINCE_ID = p.PROVINCE_ID
		INNER JOIN amphur a
		ON z.AMPHUR_ID = a.AMPHUR_ID
		INNER JOIN district d
		ON z.DISTRICT_ID=d.DISTRICT_ID
		WHERE z.ZIPCODE ="'.$zipcode.'"';
		$query = $this->db->query($sql_query)->result_array();
		return $query;
	}

	public function getDistrict()
	{
		$sql = "
		SELECT
		z.ZIPCODE,
		p.PROVINCE_ID,
		p.PROVINCE_NAME,
		a.AMPHUR_ID,
		a.AMPHUR_NAME,
		d.DISTRICT_ID,
		d.DISTRICT_NAME
		FROM district d
		INNER JOIN province p
		ON d.PROVINCE_ID = p.PROVINCE_ID
		INNER JOIN amphur a
		ON d.AMPHUR_ID = a.AMPHUR_ID
		INNER JOIN zipcode z
		ON z.DISTRICT_ID=d.DISTRICT_ID
		";
		$query = $this->db->query($sql)->result_array();
		return $query;
	}
}

/* End of file Mdl_getprovince.php */
/* Location: ./application/models/Mdl_getprovince.php */