<?php
class Mdl_user extends CI_Model
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
		$this->db->where('userID',$id); 
		$this->db->update($table,$data); 
	} 
        
       
	public function getUserGroup()
	{
		$sql = "
	            SELECT a.usergroupID, a.usergroupName
				FROM tm_usergroup a
				WHERE a.usergroupID >1
				AND a.status =  'ON'
				LIMIT 30 "; 
		$query = $this->db->query($sql);  
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	public function chk_data($txt='',$chk='',$id=''){
		$sql = ' SELECT '.$chk.' FROM tm_user WHERE '.$chk.' LIKE "'.$txt.'" AND userID <> '.$id.'';
		$query = $this->db->query($sql);  
		return $query->result_array(); 
	}


   public function getList($keyword='')
   {
  		$sql = "
                SELECT  
				a.userID, 
				g.usergroupName,
				a.username, 
				a.useremail, 
				a.userFname, 
				a.userLname, 
				CONCAT(a.userFname,' ',a.userLname) AS fullname,
				c.countryName
				FROM  tm_user  a
				INNER JOIN tm_usergroup g ON a.usergroupID = g.usergroupID
				INNER JOIN ts_country c ON a.countryID=c.countryID
				WHERE a.userID > 1 ";
		if($keyword != ''){
			$sql .= " AND CONCAT(g.usergroupName,a.username,a.useremail,a.userFname,' ',a.userLname,c.countryName) LIKE '%".$keyword."%' ";
		}
		$sql .= " ORDER BY a.userID  DESC  LIMIT 40";  
		$query = $this->db->query($sql); 
		return $query->result_array(); 

   }

   public function getLast($key){
   		$sql = "
                SELECT  
				a.userID, 
				g.usergroupName,
				a.username, 
				a.useremail, 
				a.userFname, 
				a.userLname, 
				CONCAT(a.userFname,' ',a.userLname) AS fullname,
				c.countryName
				FROM  tm_user  a
				INNER JOIN tm_usergroup g ON a.usergroupID = g.usergroupID
				INNER JOIN ts_country c ON a.countryID=c.countryID
				WHERE MD5(a.userID) = '".$key."' "; 
		$query = $this->db->query($sql); 
		return $query->result_array(); 
   } 
   

   
   public function getDetail($id='')
   {
  		$sql = "
                SELECT  
                a.userID,
				a.username,
				a.password,
				a.useremail,
				a.userIdcard,
				a.userTitle,
				a.userFname,
				a.userMname,
				a.userLname,
				a.countryID,  
				a.address,
				a.city,
				a.state,
				a.postcode,
				a.mobile, 
				a.imgProfile,
				a.imgPassport,
				a.usergroupID,
				a.status,
				g.usergroupName,
				c.countryName
				FROM  tm_user  a
				LEFT JOIN tm_usergroup g ON a.usergroupID = g.usergroupID
				LEFT JOIN ts_country c ON a.countryID=c.countryID
				WHERE MD5(a.userID) = '".$id."' ";  
		$query = $this->db->query($sql); 
		$rs = $query->result_array();
		if($query->num_rows()>0){
			return $rs[0];
		}else{
			return array();
		}
   }
 

       

         

}?>
