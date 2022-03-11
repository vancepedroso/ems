<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('user_model');
	        $this->load->model('staff_model');
	        $this->load->model('home_model');
	        $this->load->database();
	        
	    }

	public function index()
	{
		$data['department']=$this->Department_model->select_departments();
        $data['content']=$this->Staff_model->select_staff();
        $data['country']=$this->Home_model->select_countries();
		$this->load->view('admin/header'); 
        $this->load->view('admin/manage-staff',$data);
        $this->load->view('admin/footer');
	}

	function importcsv(){

        
		 if(isset($_FILES['file'])){

            if($_FILES['file']['tmp_name']){
                if(!$_FILES['file']['error'])
                {

                    $filename=$_FILES["file"]["tmp_name"];   
                    
                           

                        $file = fopen($filename, "r");

                        // read the first line and ignore it
                        fgets($file); 
                        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){

                            $staff_name          = $getData['0'];
                            $gender  = $getData['1'];
                            $email         = $getData['2'];
                            $mobile       = $getData['3'];
                            $dob       = $getData['4'];
                            $doj       = $getData['5'];
                            $address       = $getData['6'];
                            $companyemail       = $getData['7'];
                            $fblink       = $getData['8'];
                            $country       = $getData['9'];
                            $department_id       = $getData['10'];
                            $education       = $getData['11'];
                            $marital       = $getData['12'];
                            $religion       = $getData['13'];
                            $blood       = $getData['14'];
                            $blood       = $getData['15'];
                            $alergy       = $getData['16'];
                            $med       = $getData['17'];
                            $company       = $getData['18'];
                            $position       = $getData['19'];
                            $campaign       = $getData['20'];
                            $citizenship       = $getData['21'];
                            $psbank       = $getData['22'];
                            $sss       = $getData['23'];
                            $tin	   = $getData['24'];
                            $philhealth       = $getData['25'];
                            $pagibig       = $getData['26'];
                            $emergency       = $getData['27'];
                            $emergencycontact       = $getData['28'];
                            $emergecnyrelationship       = $getData['29'];
                            $emergecnyaddress       = $getData['30'];
                            $resume       = $getData['31'];
                            $status	       = $getData['32'];
                            $tenure	       = $getData['33'];
                            $probdate       = $getData['34'];
                            $regdate       = $getData['35'];
                        

                            $data = array(
                                'staff_name'=> $staff_name, 
                                'gender'=>$gender, 
                                'email'=>$email,
                                'mobile'=>$mobile,
                                'dob'=>$dob,
                                'doj'=>$doj,
                                'address'=>$address,
                                'companyemail'=>$companyemail,
                                'fblink'=>$fblink,
                                'country'=>$country	,
                                'department_id'=>$department_id,
                                'education'=>$education,
                                'marital'=>$marital,
                                'religion'=>$religion,
                                'blood'=>$blood,
                                'alergy'=>$alergy,
                                'med'=>$med,
                                'company'=>$company,
                                'position'=>$position,
                                'campaign'=>$campaign,
                                'citizenship'=>$citizenship,
                                'psbank'=>$psbank,
                                'sss'=>$sss,
                                'tin'=>$tin,
                                'philhealth'=>$philhealth,
                                'pagibig'=>$pagibig,
                                'emergency'=>$emergency,
                                'emergencycontact'=>$emergencycontact,
                                'emergecnyrelationship'=>$emergecnyrelationship,
                                'emergecnyaddress'=>$emergecnyaddress,
                                'status'=>$status,
                                'tenure'=>$tenure,
                                'probdate'=>$probdate,
                                'regdate'=>$regdate,


                            );
                             

                          //echo json_encode($data);

                            $result = $this->user_model->add($data);
                            
  							$message_success ='<b style="color:green;">Data import successfully.</b>';
  							$message_error = '<b style="color:red;">Data import error ?</b>';



                        }
                      

                        fclose($file);

                       
                       
				        if($result > 0)
		                {

		                    $this->session->set_flashdata('success', $message_success);
		                   
		                }
		                else
		                {
		                    $this->session->set_flashdata('error', $message_error);

		                   
		                }

                         $data['department']=$this->Department_model->select_departments();
                         $data['content']=$this->Staff_model->select_staff();
                          $data['country']=$this->Home_model->select_countries();
		                  $this->load->view('admin/header'); 
                         $this->load->view('admin/manage-staff',$data);
                         $this->load->view('admin/footer');
		               
                        
                    }


                }
                else
                {
                    $msg = $_FILES['file']['error'];
                   
                }
        }
        else
        {
        	 
        }
	}


	function getdata(){
		echo 'ok';
	}



}
