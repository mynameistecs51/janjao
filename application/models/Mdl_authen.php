<?php
   class Mdl_authen extends CI_Model
   {
      public function __construct()
      {
		      parent::__construct();
          $this->dbname='ditp-center';
      } 

      public function doInsert($table, $data)
      {
         return $this->db->insert($table, $data);
      } 
 
      public function doCheckValidUserLogin($UserName='', $password='')
      { 
        $sql = "
                  SELECT userID,usergroupID,UserName,UserEmail,userFname
                  FROM qr_checklogin
                  where UserName='".$UserName."' 
                  AND Password='".$password."' 
                "; 

        $query = $this->db->query($sql);  
        if($query->num_rows()>0){
          return $query->result_array();
        }else{
          return array();
        }
      }

      public function getLastLogin($id_memp)
      {
        $id_mpst = 0;
        $sql = "
          SELECT  CONCAT( DATE_FORMAT(max(dt_create),'%d'),' ',
             CASE DATE_FORMAT(max(dt_create),'%m')
                WHEN 01 THEN 'มกราคม'
                WHEN 02 THEN 'กุมภาพันธ์'
                WHEN 03 THEN 'มีนาคม'
                WHEN 04 THEN 'เมษายน'
                WHEN 05 THEN 'พฤษภาคม'
                WHEN 06 THEN 'มิถุนายน'
                WHEN 07 THEN 'กรกฎาคม'
                WHEN 08 THEN 'สิงหาคม'
                WHEN 09 THEN 'กันยายน'
                WHEN 10 THEN 'ตุลาคม'
                WHEN 11 THEN 'พฤศจิกายน'
                WHEN 12 THEN 'ธันวาคม'
                END
             ,' ',DATE_FORMAT(max(dt_create),'%Y')+543,
             ' ',DATE_FORMAT(max(dt_create),'%H:%i'),' น.'
             ) AS dt_create
             FROM tlog_lgn
             WHERE id_memp = " . $id_memp . "
                AND is_login = 1;";
        $rs = $this->db->query($sql);
        if ($rs->num_rows() > 0 )
        {
          $row = $rs->row();
          $lastLogin = $row->dt_create;
        }
        else
        {
          $lastLogin = false;
        };
        return $lastLogin;
      }

      public function getDataUser($id_memp)
      {
          $sql = "
            SELECT
             a.id_memp,
             a.memp_code,
             CONCAT(a.firstname_th,' ',a.lastname_th) AS name_th,
             CONCAT(a.firstname_en,' ',a.lastname_en) AS name_en,
             c.name_th AS mpst_name,
             a.id_mpst,
             a.id_mdept,
             d.name_th AS mdept_name,
             d.mdept_code,
             a.birthdate,
             a.email,
             a.SessionUserName,
             a.status,
             a.mobile
            FROM
            memp a
            LEFT JOIN mpst c ON a.id_mpst=c.id_mpst
             LEFT JOIN mdept d ON a.id_mdept=d.id_mdept
            WHERE a.id_memp='$id_memp' " ;
            //   echo $sql;
          $query = $this->db->query($sql);
          return $query->row();
      }

      
       


}?>
