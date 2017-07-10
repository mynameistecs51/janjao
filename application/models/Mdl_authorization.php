<?php
   class Mdl_authorization extends CI_Model
   {
      public function __construct()
      {
		parent::__construct(); 
      }

 public function getMenu($level,$userGroupID){
	  $sql = "
			SELECT 
				a.menuID,
				a.menuConfigID,
				a.userGroupID,
				m.MenuName,
				m.MenuParent,
				m.MenuLevel,
				m.order_no,
				a.canAdd,
				a.canView, 
				a.canEdit, 
				a.canDrop, 
				a.canPrint, 
				a.canApprove, 
				a.status 
			FROM tc_menu_config a 
			LEFT JOIN tm_menu m ON a.menuID = m.MenuID  
			WHERE m.MenuLevel ='$level' 
			AND a.userGroupID='$userGroupID' 
			AND m.status='ON' ";  
         	$query = $this->db->query($sql); 
			return $query->result();
	  }

public function getUsergroup(){
	  $sql = "
				SELECT a.usergroupID,a.usergroupName
				FROM tm_usergroup a
				WHERE a.status='ON'  
				AND a.usergroupID > 1";
// echo $sql;
			$query = $this->db->query($sql);
			return  $query->result();
 	  }
      public function clearstatus($data,$id)
      {
         $this->db->where('menuConfigID', $id);
         $this->db->update("tc_menu_config",$data);

      }
      public function updatestatus($data,$id)
      {
         $this->db->where('menuConfigID', $id);
         $this->db->update("tc_menu_config",$data); 
      }


}?>