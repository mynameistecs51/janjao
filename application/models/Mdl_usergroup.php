<?php
class Mdl_usergroup extends CI_Model
{
	public function __construct()
	{
	    parent::__construct();
	}

	public function addNewData($data='',$table='')
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}  

	public function updateData($data='',$table='',$id='')
	{ 
		$this->db->where('usergroupID',$id); 
		$this->db->update($table,$data); 
	}  

	public function chk_data($txt='',$chk='',$id=''){
		$sql = ' SELECT '.$chk.' FROM tm_usergroup WHERE '.$chk.' LIKE "'.$txt.'" AND usergroupID <> '.$id.'';
		$query = $this->db->query($sql);  
		return $query->result_array(); 
	}


   public function getList($keyword='')
   {
  		$sql = "
                SELECT  
				a.usergroupID, 
				a.usergroupName, 
				a.usergroupDesc,
				a.status
				FROM  tm_usergroup  a 
				WHERE a.usergroupID > 1
				AND a.status <> 'DISABLE' 
				AND CONCAT(a.usergroupName) LIKE '%".$keyword."%' 
				ORDER BY a.usergroupID ";  
		$query = $this->db->query($sql); 
		return $query->result_array(); 

   }

   public function getLast($key){
   		$sql = "
                SELECT  
				a.usergroupID, 
				a.usergroupName, 
				a.usergroupDesc,
				a.status
				FROM  tm_usergroup  a 
				WHERE MD5(a.usergroupID) = '".$key."' ";
		$query = $this->db->query($sql); 
		return $query->result_array(); 
   } 
   
   public function getDetail($id='')
   {
  		$sql = "
                SELECT  
                a.usergroupID, 
				a.usergroupName, 
				a.usergroupDesc,
				a.status
				FROM  tm_usergroup  a 
				WHERE MD5(a.usergroupID) = '".$id."' ";
		$query = $this->db->query($sql); 
		$rs = $query->result_array();
		if($query->num_rows()>0){
			return $rs[0];
		}else{
			return array();
		}
   }

   public function getmenu(){
   		$sql = "
                SELECT  
				a.MenuID, 
				a.MenuName,
				a.status
				FROM  tm_menu  a   ";
		$query = $this->db->query($sql); 
		return $query->result_array(); 
   }
 

       

         

}?>
