<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	
			    $this->load->view('admin/header');
	    $this->load->view('admin/manage-staff',$qstring);
	    $this->load->view('admin/footer');

	}
	public function upload_file(){


		$csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
	            
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	            fgetcsv($csvFile);
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE){
	                //check whether member already exists in database with same email
	                $result = $this->db->get_where("staff_tbl", array("email"=>$line[1]))->result();
	                if(count($result) > 0){
	                    //update member data
	                    $this->db->update("staff_tbl", array("staff_name"=>$line[0], "gender"=>$line[2], "dob"=>$line[3], "doj"=>$line[4], "address"=>$line[5]),  array("email"=>$line[1]));
	                }else{
	                    //insert member data into database
	                    $this->db->insert("staff_tbl", array("staff_name"=>$line[0], "email"=>$line[1], "gender"=>$line[2], "dob"=>$line[3], "doj"=>$line[4], "address"=>$line[5]));
	                }
	            }
	            
	            //close opened csv file
	            fclose($csvFile);

	            $qstring["status"] = 'Success';
	        }else{
	            $qstring["status"] = 'Error';
	        }
	    }else{
	        $qstring["status"] = 'Invalid file';
	    }

	    $this->load->view('admin/header');
	    $this->load->view('admin/manage-staff',$qstring);
	     $this->load->view('admin/footer');

	  
	}
}
