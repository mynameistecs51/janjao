<?php
class Mdl_packFunction extends CI_Model
{
  private $loop = 0;
  private $datefrom;
  private $dateto;
  public function __construct()
  {
      parent::__construct();
  }

  public function getTableFields($tb){
    return $this->db->list_fields($tb);
  }

  public function insertData($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  public function updateData($data,$table,$fild,$id){
    $this->db->where($fild,$id);
    $this->db->update($table,$data);
  }

  public function getuserlogo($id=''){
    $this->db->where('UserID',$id);
    $this->db->select('IFNULL(UserLogo,"userlogo.png") AS UserLogo');
    $query=$this->db->get('tm_user',1);
    return $query->result_array();
  }

  public function getInfo($tb='', $id=''){
    $field = $this->db->list_fields($tb);
    $this->db->where($field[0],$id);
    $this->db->select('*');
    $query=$this->db->get($tb,1);
    if($query->num_rows()>0){
      return $query->result_array();
    }else{
      return array();
    }
  }

  public function getSerialNo($eventCode='',$snCode='',$accountType='',$dayNum=''){ 
        $ref = $snCode.$dayNum.$accountType; 
        $sql = " SELECT fn_gen_sn('".$snCode."','".$accountType."','".$dayNum."','".$ref."') AS code "; 
        $query = $this->db->query($sql); 
        $rs = $query->result_array();  
          if($query->num_rows()>0){
            return $rs[0]['code'];
          }else{
            return "";
          }
  }

   public function getEventList($username='')
   {
      $sql =  "
                SELECT 
                  a.eventID,
                  a.fair_name_en AS events_name, 
                  a.fair_name_en, 
                  a.sncode,
                  a.subdomain,
                  a.first_page,
                  a.venue_en, 
                  a.fair_year,
                  a.edit_deadline_exhibitor_date,
                  a.pre_from_date,
                  a.pre_to_date,
                  a.trade_from_date,
                  a.trade_to_date,
                  a.public_from_date,
                  a.public_to_date,
                  a.fairlogo_path,
                  a.fairbanner_path,
                  a.fair_contact,
                  a.fair_email,
                  a.fair_tel,
                  a.fair_website,
                  a.badge_showtitle,
                  a.badge_showfname,
                  a.badge_showmname,
                  a.badge_showlname,
                  a.badge_showcompany,
                  a.badge_showcountry,
                  a.badge_haveProfilePhoto,
                  a.badge_haveqrcode,
                  a.badge_haveabarcode,
                  a.badge_type,
                  a.badge_header_path,
                  a.badge_body_path,
                  a.badge_footer_buyer_path,
                  a.badge_footer_mission_path,
                  a.badge_footer_vip_path,
                  a.badge_footer_other_path,
                  a.email_issendmail,
                  a.email_contact_name,
                  a.email_from_email,
                  a.email_from_name,
                  a.email_direction_detail,
                  a.email_note,
                  a.outsys_visitor_url,
                  a.outsys_mission_url,
                  a.outsys_exhibitor_url,
                  a.is_question,
                  a.is_seminer, 
                  DATE_FORMAT(a.pre_from_date,'%d %M %Y') AS pre_day_start,
                  DATE_FORMAT(a.pre_to_date,'%d %M %Y') AS pre_day_end,
                  DATE_FORMAT(a.trade_from_date,'%d %M %Y') AS trade_start,
                  DATE_FORMAT(a.trade_to_date,'%d %M %Y') AS trade_end, 
                  DATE_FORMAT(a.public_from_date,'%d %M %Y') AS public_start,
                  DATE_FORMAT(a.public_to_date,'%d %M %Y') AS public_end,    
                  a.status, 
                  a.updateDT, 
                  a.updateBY
                FROM ts_event a 
                WHERE a.status = 'ON' 
                ORDER BY first_page ASC, a.pre_from_date DESC "; 
              $query = $this->db->query($sql); 

              if($query->num_rows()>0){
                return $query->result_array();
              }else{
                return array();
              }
   }

  public function getCountryList()
  {
        $sql =  "
          SELECT  a.countryID, 
                  a.countryName
          FROM ts_country a
          WHERE a.status = 'ON' 
          ORDER BY a.countryName ASC";

        $query = $this->db->query($sql);
        return $query->result_array();
  }

   
   
  public function convert_date($val)
  {
        $date = str_replace('/', '-',trim($val));
        $year = $date[6].$date[7].$date[8].$date[9];
        $format_date = $year.'-'.$date[3].$date[4].'-'.$date[0].$date[1];
        return $format_date;
  }

  public function getBtnAu($page='',$userGroupID='')
  {
          $sql =  "
              SELECT 
                b.MenuURL,
                a.canAdd,
                a.canView,
                a.canEdit,
                a.canDrop, 
                a.canPrint, 
                a.canApprove
              FROM tc_menu_config a
              INNER JOIN tm_menu b ON a.menuID=b.MenuID
              WHERE a.status='ON'
              AND b.MenuURL='".$page."'
              AND a.userGroupID='".$userGroupID."'
            ";
         // echo $sql;
          $query = $this->db->query($sql);  
          if($query->num_rows()>0){
              return $query->result_array();
          }else{
              return array('canAdd'=>'OFF','canView'=>'OFF','canEdit'=>'OFF','canDrop'=>'OFF','canPrint'=>'OFF','canPrint'=>'canApprove');
          }

  }

  public function checkAuthen($MenuURL='', $userGroupID='')
  {
      $sql =  "
          SELECT 
            b.MenuURL 
          FROM tc_menu_config a
          INNER JOIN tm_menu b ON a.menuID=b.MenuID
          WHERE a.status='ON'
          AND b.MenuURL='".$MenuURL."'
          AND a.userGroupID='".$userGroupID."'
        ";
  //    echo $sql;
      $query = $this->db->query($sql);  
      if($query->num_rows()>0){
          return true;
      }else{
          return false;
      } 
  }


  public function getMenu($userGroupID='',$isLv='',$isPar='')
  {
    $sql = "
        SELECT 
          tm_menu.MenuID,
          tm_menu.MenuName, 
          tm_menu.MenuType, 
          tc_menu_config.userGroupID, 
          tm_menu.MenuParent, 
          tm_menu.MenuURL, 
          tm_menu.MenuLevel, 
          tc_menu_config.canAdd, 
          tc_menu_config.canView, 
          tc_menu_config.canEdit, 
          tc_menu_config.canDrop, 
          tc_menu_config.canPrint, 
          tc_menu_config.canApprove
        FROM tc_menu_config 
        INNER JOIN tm_menu ON tc_menu_config.menuID = tm_menu.MenuID
        WHERE tc_menu_config.status='ON'
        AND tm_menu.status='ON'
        AND tc_menu_config.userGroupID='".$userGroupID."'
        AND tm_menu.MenuLevel='".$isLv."' ";
    if($isPar != ''){
        $sql .= " AND tm_menu.MenuParent='".$isPar."' ";
    }  
    $sql .= " 
          GROUP BY tc_menu_config.menuConfigID
          ORDER BY tm_menu.order_no ASC
    ";

 //   echo $sql."<br><br>";

    $query = $this->db->query($sql);  
    if($query->num_rows()>0){
        return $query->result_array();
    }else{
        return array();
    }
  }


  public function getCheckEmail($email='')
  {
    $sql = "
            SELECT 
              a.userID, 
              a.username,  
              a.useremail, 
              a.userFname, 
              a.userLname, 
              a.imgProfile, 
              a.usergroupID, 
              a.tradeID,
              a.loginStatus, 
              a.loginLastDt
            FROM tm_user a
            WHERE a.useremail = '".$email."' " ;
            //   echo $sql;
          $query = $this->db->query($sql);
          return $query->result_array(); 
  }

  public function getQuestionList($eventCODE='',$eventID='',$parentID='',$registerType='',$userID='',$questionType='')
  {
    $sql =  " 
          SELECT 
            a.questionID, 
            a.questionName, 
            a.eventID, 
            a.parentID, 
            a.inputType, 
            a.have_desc,
            a.have_required,
            a.col,
            b.answer,
            a.questionType,
            sub.countsub,
            sub.questionType AS subType
          FROM regis_".strtolower($eventCODE).".tm_question a
          LEFT JOIN regis_".strtolower($eventCODE).".ts_answer b ON a.questionID=b.questionID AND b.eventID='".$eventID."' AND b.userID='".$userID."'
          LEFT JOIN  (
              SELECT count(questionID) AS countsub, parentID, questionType  FROM  regis_".strtolower($eventCODE).".tm_question GROUP BY parentID
          ) AS sub ON a.questionID=sub.parentID
          WHERE a.status='ON'
          AND a.eventID='".$eventID."' 
          AND a.registerType='".$registerType."' 
          AND a.parentID ='".$parentID."'  
          AND a.questionType='".$questionType."' "; 

          $sql .=  " ORDER BY a.order_no ASC, a.questionID ASC  ";
          $query = $this->db->query($sql); 
          return $query->result_array(); 
  }

  public function getSeminarList($eventCODE='',$eventID='',$parentID='',$registerType='',$userID='',$registerID='')
  {
    $sql =  " 
          SELECT
            a.seminarID,
            b.registerID,
            a.topic AS seminarName,
            a.eventID,
            a.topic,
            a.room,
            a.startdate,
            a.enddate,
            CONCAT(DATE_FORMAT(a.startdate,'%d %M %Y'),' - ',DATE_FORMAT(a.enddate,'%d %M %Y')) AS seminarDay,
            CONCAT(DATE_FORMAT(a.startdate,'%H:%i'),' - ',DATE_FORMAT(a.enddate,'%H:%i')) AS seminarTime,
            a.contactPerson,
            a.contactstartdate,
            a.contactenddate,
            a.detail,   
            IFNULL(b.is_launch,'false') AS is_launch,
            a.seats,
            a.reservation,
            IFNULL(
            CASE 
              WHEN bk.total < a.seats  THEN bk.total
              WHEN bk.total >= a.seats THEN a.seats
            END,'0') AS booked, 
            IFNULL(
            CASE 
              WHEN bk.total < a.seats  THEN 0
              WHEN bk.total >= a.seats THEN CONCAT(bk.total-a.seats)
            END,'0') AS reser
          FROM regis_".strtolower($eventCODE).".tm_seminar a
          LEFT JOIN regis_".strtolower($eventCODE).".ts_launchseminar b ON a.seminarID=b.seminarID 
                    AND b.eventID='".$eventID."' AND b.userID='".$userID."' AND b.registerID='".$registerID."'
          LEFT JOIN (
              SELECT seminarID,COUNT(registerID) AS total
              FROM regis_".strtolower($eventCODE).".ts_launchseminar 
              WHERE eventID='35' 
              AND is_launch = 'true'
              GROUP BY seminarID 
          ) AS bk  ON a.seminarID = bk.seminarID
          WHERE a.status='ON'
          AND a.eventID='".$eventID."'  ";
        if($parentID != ''){
          $sql .=  " AND a.parentID ='".$parentID."'  ";
        }

        $sql .=  " ORDER BY a.startdate ASC,a.seminarID ASC ";
          $query = $this->db->query($sql); 
          return $query->result_array(); 
  }

  public function getRegisType($name=''){
        $sql = " SELECT lpad(registerTypeID,2,'0') AS regisID, registerTypeName  FROM tm_registertype ";
        if($name != ''){
          $sql .= " WHERE registerTypeName = '".$name."' ";
        }
        $query = $this->db->query($sql); 
        $rs = $query->result_array();  
        if($query->num_rows()>0){
          return $rs;
        }else{
          return array();
        }
  }


  public function getTmQuestion($subdomain,$eventID,$typename='visitor',$parentID=0,$questionType='question')
  {
      $sql = " SELECT 
                a.questionID,
                a.questionName,
                a.eventID,
                a.parentID,
                a.inputType,
                a.questionType,
                a.col,
                a.order_no,
                a.registerType,
                a.have_desc,
                a.have_required
               FROM regis_".strtolower($subdomain).".tm_question AS a 
               WHERE a.status = 'ON' 
               AND a.parentID = '".$parentID."'   
               AND a.questionType = '".$questionType."'  
               AND a.registerType = '".$typename."'  
               ORDER BY a.order_no ASC"; 
      $query = $this->db->query($sql); 
      $rs = $query->result_array();  
      if($query->num_rows()>0){
        return $rs;
      }else{
        return array();
      }
  }

  public function getConfigFillform($subdomain='',$eventID='',$type='')
  {
      $sql = " 
              SELECT 
            a.userEmail,
            a.passport,
            a.userTitle,
            a.userFname,
            a.userMname,
            a.userLname, 
            a.tradeID,
            a.companyName,
            a.position,
            a.countryID,
            a.address,
            a.city,
            a.postcode,
            a.telephone,
            a.mobile,
            a.fax,
            a.website,
            a.capital,
            a.annual_year,
            a.annual_value,
            a.isRegisGroup,
            a.subuserEmail,
            a.subuserTitle,
            a.subuserFname,
            a.subuserMname,
            a.subuserLname,
            a.subuserPassport,
            a.subuserPosition,
            a.subuserMobile 
          FROM tc_fillform_config a 
          WHERE a.eventID = '".$eventID."'
          AND a.subdomain = '".$subdomain."'
          AND a.registerTypeName = '".$type."' ";
          $query = $this->db->query($sql); 
          $rs = $query->result_array();
          if($query->num_rows()>0){
            return $rs[0];
          }else{
            return array(
              "userEmail" => 'NO',
              "passport" => 'NO',
              "userTitle" => 'NO',
              "userFname" => 'NO',
              "userMname" => 'NO',
              "userLname" => 'NO', 
              "tradeID" => 'NO',
              "companyName" => 'NO',
              "position" => 'NO',
              "countryID" => 'NO',
              "address" => 'NO',
              "city" => 'NO',
              "postcode" => 'NO',
              "telephone" => 'NO',
              "mobile" => 'NO',
              "fax" => 'NO',
              "website" => 'NO',
              "capital" => 'NO',
              "annual_year" => 'NO',
              "annual_value" => 'NO',
              "isRegisGroup" => 'NO',
              "subuserEmail" => 'NO',
              "subuserTitle" => 'NO',
              "subuserFname" => 'NO',
              "subuserMname" => 'NO',
              "subuserLname" => 'NO',
              "subuserPassport" => 'NO',
              "subuserPosition" => 'NO',
              "subuserMobile" => 'NO'
              );
          }  
    } 


    public function getEventEmailDetail($subdomain='',$type='')
      {
        $sql =  "
                    SELECT  
                      a.eventID,
                      a.fair_name_en AS events_name,   
                      a.subdomain, 
                      a.venue_en, 
                      a.fair_year, 
                      a.fairlogo_path,
                      a.fairbanner_path,
                      a.fair_contact,
                      a.fair_email,
                      a.fair_tel,
                      a.fair_website,
                      a.badge_showtitle,
                      a.badge_showfname,
                      a.badge_showmname,
                      a.badge_showlname,
                      a.badge_showcompany,
                      a.badge_showcountry,
                      a.badge_haveProfilePhoto,
                      a.badge_haveqrcode,
                      a.badge_haveabarcode,
                      a.badge_type,
                      a.badge_header_path,
                      a.badge_body_path,
                      a.badge_footer_buyer_path,
                      a.badge_footer_mission_path,
                      a.badge_footer_exhibitor_path,
                      a.badge_footer_vip_path,
                      a.badge_footer_other_path,
                      a.email_issendmail,
                      a.email_contact_name,
                      a.email_from_email,
                      a.email_from_name,
                      a.email_direction_detail,
                      a.email_note,  
                      CONCAT(DATE_FORMAT(a.pre_from_date,'%d %M %Y'),' - ',DATE_FORMAT(a.pre_to_date,'%d %M %Y')) AS pre_day,
                      CONCAT(DATE_FORMAT(a.pre_from_date,'%H:%i'),' - ',DATE_FORMAT(a.pre_to_date,'%H:%i')) AS pre_time, 
                      CONCAT(DATE_FORMAT(a.trade_from_date,'%d %M %Y'),' to ',DATE_FORMAT(a.trade_to_date,'%d %M %Y')) AS trade_day,
                      CONCAT(DATE_FORMAT(a.trade_from_date,'%H:%i'),' - ',DATE_FORMAT(a.trade_to_date,'%H:%i')) AS trade_time,  
                      CONCAT(DATE_FORMAT(a.public_from_date,'%d %M %Y'),' - ',DATE_FORMAT(a.public_to_date,'%d %M %Y')) AS public_day,
                      CONCAT(DATE_FORMAT(a.public_from_date,'%H:%i'),' - ',DATE_FORMAT(a.public_to_date,'%H:%i')) AS public_time 
                    FROM ts_event a 
                    WHERE a.status = 'ON' 
                    AND a.subdomain='".$subdomain."' ";  
              $query = $this->db->query($sql); 

              if($query->num_rows()>0){
                return $query->result_array();
              }else{
                return array();
              }
      }
 
}?>
