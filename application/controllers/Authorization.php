<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ctl="Authorization";
		$this->pagename="SETTING";  
		$this->userID = $this->session->userdata('userID');
		$this->UserName = $this->session->userdata('UserName');
		$this->UserGroupID = $this->session->userdata('usergroupID');
		$this->load->model('Mdl_authorization');
		$authRs=$this->mdl_packFunction->checkAuthen($this->ctl, $this->UserGroupID); 
		if($this->userID=="" || $authRs != true){
			// ถ้าไม่มี session หรือ ไม่มีการ Login ให้กลับไป authen
			redirect('authen/');
	    }

	}

	public function index(){  
		$this->data['viewName']=$this->pagename;
		$this->data['select'] = 0;
		$this->data['userID'] = $this->userID;
		$this->data['listusergroup']= $this->Mdl_authorization->getUsergroup();
		$this->data['lavle1']= $this->Mdl_authorization->getMenu('1',$this->data['select']);
		$this->data['lavle2']= $this->Mdl_authorization->getMenu('2',$this->data['select']); 
		// echo "<pre>";
		// print_r($this->data['lavle1']);

		$this->packfunction->packView($this->data,'authorization/CEM001C');
	}

	public function select()
	{ 
		if( $this->input->post('usergroupID')=="")
		{
		  $this->data['select']=0;
		}else{
		  $this->data['select']=$this->input->post('usergroupID');
		}    
		$this->data['viewName']=$this->pagename;
		$this->data['userID'] = $this->userID;
		$this->data['listusergroup']= $this->Mdl_authorization->getUsergroup();
		$this->data['lavle1']= $this->Mdl_authorization->getMenu('1',$this->data['select']);
		$this->data['lavle2']= $this->Mdl_authorization->getMenu('2',$this->data['select']); 
		// echo "<pre>";
		// print_r($this->data['lavle1']);

		$this->packfunction->packView($this->data,'authorization/CEM001C');

	}

	public function alert($massage,$url)
	{
		echo "
			<meta charset='UTF-8'>
			<SCRIPT LANGUAGE='JavaScript'>
		    window.alert('$massage')
		    window.location.href='".site_url($url)."';
		    </SCRIPT>
		";
	}
	
	public function testUpdate()
	{
		echo "<pre>";
		print_r($_POST);
	}

	public function update()
	{
	   	if( $this->input->post('usergroupID')!="")
	    {                
	        $num = count($_POST["menuConfigID"]);
	      	if($num >'0')
	        {
	      
	            for($i=0;$i<$num;$i++)
	            {
	                if(trim($_POST["menuConfigID"][$i]) != "")
	                {
	                	$id=$_POST["menuConfigID"][$i]; 
					/*
	                    $canView =	isset($_POST["canView"][$id]) ? 'ON' : 'OFF' ;
	                    $canAdd=isset($_POST["canAdd"][$id]) ? 'ON' : 'OFF' ;
	                    $canEdit=isset($_POST["canEdit"][$id]) ? 'ON' : 'OFF' ;
	                    $canPrint=isset($_POST["canPrint"][$id]) ? 'ON' : 'OFF' ;
	                    $canApprove=isset($_POST["canApprove"][$id]) ? 'ON' : 'OFF' ;
					*/
	                    $status=isset($_POST["status"][$id]) ? 'ON' : 'OFF' ; 
	                    $data_update = array(
			                "canView" 	 =>$status,
			                "canAdd" 	 =>$status,
			                "canEdit"    =>$status,
			                "canPrint"   =>$status,
			                "canApprove" =>$status,
			                "status"     =>$status,
			                "updateBY"	 =>$this->UserName,
			                "updateDT"	 =>$this->packfunction->dtYMDnow()
			            );
			            $this->Mdl_authorization->updatestatus($data_update,$id);  
	                }
	            } 
	            $massage = "แก้ไขข้อมูล เรียบร้อย !";
	            $url='authorization/select';
				$this->alert($massage,$url);
			}
	 
	    }else{ 
	    	$massage = "ข้อมูลผิดพลาด !";
	        $url='authorization/select';
			$this->alert($massage,$url); 
	    } 
	}

}?>
