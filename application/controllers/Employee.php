<?php
  
   class Change extends CI_Controller {
   
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      } 
    
      public function index() {
            
         /* Load form validation library */ 
         $this->load->library('form_validation');
            
     /* Validation rule */
     $this->form_validation->set_rules('username', 'password','required|callback_check_customer');
     $this->form_validation->set_rules('password', 'Password', 'required|callback_check_customers');    
            
         if ($this->form_validation->run() == FALSE) { 
            $this->load->view('admin/header');
            $this->load->view('admin/account'); 
            $this->load->view('admin/footer');
         } 
         else { 
                    $this->load->model('reg_model');
            $this->reg_model->saveCustomer();
            $success = "Your account has been successfully created!";
                        $this->load->view('admin/header');
                    $this->load->view('admin/account', compact('success'));
                        $this->load->view('admin/footer'); 
         } 
      }



      public function check_customer($username)
       {


             $query = $this->db->where('username', $username)->get("login_tbl");
         if ($query->num_rows() > 0)
            {

             $this->form_validation->set_message('check_customer','The '.$username.' username already changed');
                return FALSE;
            }
          else 
              return TRUE;
      }
public function check_customers($password)
       {
             $query = $this->db->where('password', $password)->get("login_tbl");
         if ($query->num_rows() > 0)
            {

             $this->form_validation->set_message('check_customers','The '.$password.' password already changed');
                return FALSE;
            }
          else 
              return TRUE;
      }

   }
?>