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
			$dateChar = explode('-',$datetime);
			$dateCharYear = explode(' ',$dateChar[2]);
			return $dateCharYear[0].'-'.$dateChar[1].'-'.$dateChar[0].' '.$dateCharYear[1];
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
			'12' => 'ธันวาคม'
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


	public function getQuestion($eventCode='',$eventID='',$registerType='',$userID=''){
		$question = $this->CI->Mdl_packFunction->getQuestionList($eventCode,$eventID,'',$registerType, $userID,'question');
		$html = "";
		$Addjavascript  = "";
		$n=1;
		foreach ($question as $rs1) {
			$req = $rs1["have_required"]=='true' ? '<span style="color:#FF0004;">*</span>':'';
			$html .='
			<div class="col-lg-12">
				<input type="hidden" name="questionID['.$n.']" value="'.$rs1["questionID"].'">
				<h4 class="qalv1">'.$n.'. '.$rs1["questionName"].' '.$req.'<span id="errorrequire'.$n.'"></span></h4>';


                    // Set JS

				if($rs1["inputType"]=='radio' && $rs1["have_required"]=='true')
				{
					$Addjavascript .= '}else  if($(".question_m'.$n.'").is(":checked")==false){
						alert("Please select the answer of question no. '.$n.'. ");
						return false; ';
					}
					if($rs1["inputType"]=='checkbox' && $rs1["have_required"]=='true')
					{
						$Addjavascript .= '}else if($(".question_m'.$n.'").is(":checked")==false){
							alert("Please select the answer of question no. '.$n.'. ");
							return false; ';
						}



                    // คำถามย่อย
						$questionSub = $this->CI->Mdl_packFunction->getQuestionList($eventCode,$eventID,$rs1["questionID"],$registerType, $userID,'question');
						$s=1;
						foreach ($questionSub as $rs2) {
							$reqsub = $rs2["have_required"]=='true' ? '<span style="color:#FF0004;">*</span>':'';
							$html .='
							<div class="col-lg-12">
								<input type="hidden" name="questionID['.$n.$s.']" value="'.$rs2["questionID"].'">
								<h4 class="qalv2">'.$n.'.'.$s.' '.$rs2["questionName"].' '.$reqsub.'<span id="errorrequire'.$n.$s.'"></span></h4>';
			            // คำตอบ
								$html .= $this->getAnswer($eventCode,$eventID, $rs2["questionID"], $registerType,$userID,$n.$s,'_m'.$n);
								$html .='</div>';

								if($rs2["inputType"]=='checkbox' && $rs2["have_required"]=='true')
								{
									$Addjavascript .= '}else if($(".question'.$n.$s.'").is(":checked")==false){
										alert("Please select the answer of question no. '.$n.'.'.$s.' ");
										return false; ';
									}

									$s++;
								}
		            // คำตอบ
								$html .= $this->getAnswer($eventCode,$eventID, $rs1["questionID"], $registerType,$userID,$n,'_m'.$n);



								$n++;
								$html .='</div>';
							}
							$html .='</div>';

							foreach ($question as $rs2) {
								if($rs2["inputType"]=='radio' )
								{
									$html .= '
									<script type="text/javascript">
										function confirmvalid(){  ';

										if($Addjavascript != ''){

											$html .=  'if($("#userID").val()==""){
												alert("Data Register Fail !"); ';

												$Addjavascript.= ' 	}else{
													return true;
												} ';

												$html .= $Addjavascript;
											}else{
												$html .= ' return true;';
											}


											$html .= '	}
										</script>
										';
									}
								}
								return $html;
							}

							public function getAnswer($eventCode='',$eventID='',$parentID='',$registerType='',$userID='',$n='',$nc='')
							{
								$answer = $this->CI->Mdl_packFunction->getQuestionList($eventCode,$eventID,$parentID,$registerType,$userID,'answer');
								$html = "";
								$an=1;
								foreach ($answer as $rsAns) {
									if($rsAns['inputType']=='checkbox'){
										$isChecked = $rsAns['answer']=='true' ? 'checked' : '';
										$html .= '	<div class="col-lg-'.$rsAns['col'].'">
										<label class="checkbox-inline">
											<input type="hidden" name="inputType['.$n.']['.$an.']" value="'.$rsAns["inputType"].'">
											<input type="hidden" name="answerID['.$n.']['.$an.']" value="'.$rsAns["questionID"].'">
											<input type="checkbox" class="question'.$nc.'  question'.$n.' " name="answer['.$n.']['.$an.']" value="'.$rsAns['questionID'].'" '.$isChecked .'> '.$rsAns['questionName'].' ';
											if(strtoupper($rsAns['have_desc'])=='YES'){
												$html .='<input type="text" class="form-control" placeholder="Other" id="other'.$rsAns['questionID'].'"  style="height:30px;" name="otheranswer['.$n.']['.$an.']" value="">';
											}
											$html .=' 		</label>
										</div>';

									}else if($rsAns['inputType']=='radio'){
										$isChecked = $rsAns['answer']=='true' ? 'checked' : '';
										$html .= '	<div class="col-lg-'.$rsAns['col'].' form-inline">
										<label class="radio-inline">
											<input type="hidden" name="inputType['.$n.']['.$an.']" value="'.$rsAns["inputType"].'">
											<input type="hidden" name="answerID['.$n.']['.$an.']" value="'.$rsAns["questionID"].'">
											<input type="radio" class="question'.$nc.' question'.$n.' " name="answer['.$n.']['.$n.']" value="'.$rsAns['questionID'].'"  '.$isChecked .' > '.$rsAns['questionName'].' ';
											if(strtoupper($rsAns['have_desc'])=='YES'){
												$html .='<input type="text" class="form-control" placeholder="Other" id="other'.$rsAns['questionID'].'" style="height:30px;"  name="otheranswer['.$n.']['.$an.']" value="">';
											}
											$html .='		</label>
										</div>';
									}

									$an++;
								}
								return $html;
							}


							public function getSeminar($eventCode='',$eventID='',$registerType='',$userID='',$registerID)
							{
								$seminar = $this->CI->Mdl_packFunction->getSeminarList($eventCode,$eventID,'',$registerType,$userID,$registerID);

								$html ='
								<div class="col-lg-12">
									<h4 class="qalv1">Please Select Seminar is Your Launch ! </h4>
								</div>';

								$html .= '<div class="col-lg-12">';
								$n=1;
								foreach ($seminar as $rs) {

			// if($rs['inputType']=='checkbox'){

									$isChecked = $rs['is_launch']=='true' ? 'checked' : '';

									$html .= '	<div class="col-lg-12">
									<label class="checkbox-inline">
										<input type="hidden" name="seminarID['.$n.']"  value="'.$rs["seminarID"].'">
										<h3>
											<input type="checkbox" class="seminar" id="seminar'.$n.'"  name="seminar['.$n.']" value="'.$rs['seminarID'].'" '.$isChecked .'>
											'.$rs['seminarName'].'
										</h3>
										<p> '.$rs['seminarDay'].' '.$rs['seminarTime'].' </p>
										<p><b> '.$rs['room'].' </b></p>
										<p>
											<b>Booked Seats : </b> <b id="seats'.$n.'">'.$rs['booked'].'</b><b>/'.$rs['seats'].'</b></b>
											<b style="padding-left:30px;">Seat reservation : </b> <b id="reservation'.$n.'">'.$rs['reser'].'</b><b>/'.$rs['reservation'].'</b></b>
										</p>
										<p> '.$rs['detail'].' </p>';

										$html .=' 		</label><hr>
									</div>
									<script type="text/javascript">

										$("#seminar'.$n.'").on("change",function(){
											var ck = $(this).is(":checked");
											var ckold'.$n.' = '.$rs['is_launch'].';
											if(ck){
												if('.$rs['booked'].' < '.$rs['seats'].'){
													if(ckold'.$n.' == true){
														$("#seats'.$n.'").html('.($rs['booked']).');
													}else{
														$("#seats'.$n.'").html("<b style=\'color:#FF0004;\'>'.($rs['booked']+1).'</b>");
													}
												}else if('.$rs['booked'].' >= '.$rs['seats'].'){
													if(ckold'.$n.' == true){
														$("#reservation'.$n.'").html('.($rs['reser']).');
													}else{
														$("#reservation'.$n.'").html("<b style=\'color:#FF0004;\'>'.($rs['reser']+1).'</b>");
													}
												}else{
													$("#seats'.$n.'").html('.$rs['booked'].');
												}
											}else{
												if('.$rs['booked'].' < '.$rs['seats'].'){
													if(ckold'.$n.' == true){
														$("#seats'.$n.'").html('.($rs['booked']-1).');
													}else{
														$("#seats'.$n.'").html('.($rs['booked']).');
													}
												}else if('.$rs['booked'].' >= '.$rs['seats'].'){
													if(ckold'.$n.' == true){
														$("#reservation'.$n.'").html('.($rs['reser']-1).');
													}else{
														$("#reservation'.$n.'").html('.($rs['reser']).');
													}
												}else{
													$("#seats'.$n.'").html('.$rs['booked'].');
												}
											}
										});
									</script>

									';
			// }
									$n++;
								}
								$html .='</div>';
								return $html;
							}


							public function getTmQuestion($subdomain='',$eventID='',$typename='',$parentID=0,$questionType='question')
							{
								$data = $this->CI->Mdl_packFunction->getTmQuestion($subdomain,$eventID,$typename,$parentID,$questionType);
								return $data;
							}

						}
						?>
