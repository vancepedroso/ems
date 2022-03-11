<?php
  
   class Registration extends CI_Controller {
   
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      } 
	
      public function index() {
			
         /* Load form validation library */ 
         $this->load->library('form_validation');
			
	 /* Validation rule */
	 $this->form_validation->set_rules('username', 'username','required|callback_check_customer');
	 $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');	
	 $this->form_validation->set_rules('usertype', 'usertype', 'required');	 
			
         if ($this->form_validation->run() == FALSE) { 
         	  $this->load->view('admin/header');
            $this->load->view('admin/manage-staff'); 
            $this->load->view('admin/footer');
            $this->session->set_flashdata('error', "Error");
         } 
         else { 
                    $this->load->model('reg_model');
		    $this->reg_model->saveCustomer();

        $this->load->model('Log_model');
                        $params = array(
                                        'users_id'=>$this->session->userdata('username'),
                                        'action' => 'Created Employee:',
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);

        $this->session->set_flashdata('success', "New account has been successfully created!");
		    //$success = "Your account has been successfully created!";
		          		$this->load->view('admin/header');
                  //$this->load->view('admin/account', compact('success'));
                  $this->load->view('admin/manage-staff');
           				$this->load->view('admin/footer'); 
         } 
      }
	  public function check_customer($username)
	   {
	         $query = $this->db->where('username', $username)->get("login_tbl");
		 if ($query->num_rows() > 0)
		    {
			 //$this->form_validation->set_message('check_customer','The '.$username.' belongs to an existing account');
      $this->form_validation->set_message('check_customer','The '.$username.' belongs to an existing account');
		        return FALSE;
		    }
		  else 
			  return TRUE;
	  }	
   }
?>