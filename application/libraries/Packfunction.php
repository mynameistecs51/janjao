<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Packfunction {

	private $javascript;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('Mdl_packFunction');
	}

	public function packView($data,$viewName){
		$this->CI->load->view('template/Header',$data);
		$this->CI->load->view($viewName,$data);
		$this->CI->load->view('template/Footer',$data);
	}

	public function packViewPublic($data='',$viewName='')
	{
		$this->CI->load->view('templatePublic/Header',$data);
		$this->CI->load->view($viewName,$data);
		$this->CI->load->view('templatePublic/Footer',$data);
	}

	public function dtTosql($datetime)
	{
		if(!empty($datetime)){
			$dateChar = explode('/',$datetime);
			$dateCharYear = explode(' ',$dateChar[2]);
			return $dateCharYear[0].'-'.$dateChar[1].'-'.$dateChar[0].' '.$dateCharYear[1];
		}else{
			return "";
		}
	}

	public function dateTosql($datetime)
	{
		if(!empty($datetime)){
			$dateChar = explode('/',$datetime);
			$dateCharYear = explode(' ',$dateChar[2]);
			return $dateCharYear[0].'-'.$dateChar[1].'-'.$dateChar[0].' 12:00:00';
		}else{
			return "";
		}
	}

	public function dtYMDnow()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('Y-m-d H:i:s');
	}

	public function dayNum()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('ymd');
	}

	public function dtDMYnow()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('d/m/Y H:i');
	}

	public function datefrom()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$mY= date('m/Y', strtotime($now->format('Y-m')." -1 month"));
		return "01/".$mY;
	}

	public function dateto()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$mY= date('m/Y', strtotime($now->format('Y-m')." +1 month"));
		return $now->format('t/').$mY;
	}

	public function dtDMYDatenow()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('d/m/Y');
	}

	public function yearnow()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('Y');
	}
	public  function getMonth() {
		return  array(
			'01' => 'มกราคม',
			'02' => 'กุมภาพันธ์',
			'03' => 'มีนาคม',
			'04' => 'เมษายน',
			'05' => 'พฤษภาคม',
			'06' => 'มิถุนายน',
			'07' => 'กรกฏาคม',
			'08' => 'สิงหาคม',
			'09' => 'กันยายน',
			'10' => 'ตุลาคม',
			'11' => 'พฤศจิกายน',
			'12' => 'ธันวาคม',
			);
	}

	public static function getYear() {
		$arr = array();
		$y = date('Y')-50;

		for ($i = $y; $i <= ($y +50); $i++) {
			$arr[$i] = $i+543;
		}
		return $arr;
	}

	public function dtDMYDatetimenow()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('d/m/Y H:i');
	}

	public function dtcheckin()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		return $now->format('d/m/Y').' 13:00';
	}

	public function dtcheckout()
	{
		date_default_timezone_set('Asia/Bangkok');
		$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
		$dmy= date('d/m/Y', strtotime($now->format('Y-m-d')." +1 days"));
		return $dmy.' 12:00';
	}



	public function getuserlogo($id=''){
		$rs = $this->CI->mdl_packfunction->getuserlogo($id);
		return $rs[0]['UserLogo'];
	}

	public function utf8_strlen($s) {
		$c = strlen($s); $l = 0;
		for ($i = 0; $i < $c; ++$i) if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
			return $l;
	}

	public function shortText($data=''){
		if($this->utf8_strlen($data) <= 25){ //ื่อลูกค้า
			$txt = $data;
		}else{
			$txt = iconv_substr($data, 0,25, "UTF-8").'...';
		}
		return $txt;
	}

	public function setMenu($page=''){
		$userGroupID= $this->CI->session->userdata('usergroupID');

		$rsLv1 = $this->CI->Mdl_packFunction->getMenu($userGroupID,1,0);
		$html = '';

		foreach ($rsLv1 as $lv1) {
			$liclass = $lv1["MenuName"]==$page ? 'class="hoverpage '.$lv1["MenuType"].' "' : '' ;
			$html .=' 	<li '.$liclass.' > ';
			if($lv1["MenuType"]=='dropdown'){
				$html .=' <a href="'.base_url().$lv1["MenuURL"].'" class="dropdown-toggle" data-toggle="dropdown" >'.$lv1["MenuName"].' <b class="caret"></b></a> ';
				$html .= $this->subMenuTop($lv1["MenuID"],$userGroupID);
			}else{
				$html .=' <a href="'.base_url().$lv1["MenuURL"].'">'.$lv1["MenuName"].'</a> ';
			}
			$html .=' </li> ';
		}
		$html .= '
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="glyphicon glyphicon-user" style="padding-left: 0px;padding-right: 5px;"></i>  '.$this->CI->session->userdata("UserName").'<b class="caret"></b> </a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Profile Setting</a>
						</li>
						<li>
							<a href="'.base_url().'/authen/logout">Logout</a>
						</li>
					</ul>
				</li>
				';
		return $html;
	}

	public function subMenuTop($id='',$userGroupID=''){

		$rsLv2 = $this->CI->Mdl_packFunction->getMenu($userGroupID,2,$id);

		$html = '<ul class="dropdown-menu">';

		foreach ($rsLv2 as $lv2) {
			$html .=' <li><a href="'.base_url().$lv2["MenuURL"].'">'.$lv2["MenuName"].'</a> </li>';
		}

		$html .='</ul> ';
		return $html;
	}

	public function updateRoom($status='', $roomcode='')
	{
		$data = array(
					'transaction'  => $status,
					"updateDT"	   => $this->dtYMDnow(),
					"updateBY"	   => $this->CI->session->userdata('UserName')
				);
		$this->CI->Mdl_packFunction->updateData($data,'tm_room','roomCODE',$roomcode);
	}



}
