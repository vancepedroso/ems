<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('notice_model');
    }
    

	public function index()
	{
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url('login'));
        }
		else
        {
            if($this->session->userdata('usertype')==1)
            {
                
                $data['notice'] = $this->notice_model->GetNotice();
                $data['department']=$this->Department_model->select_departments();
                $data['staff']=$this->Staff_model->select_staff();
                $data['salary']=$this->Salary_model->sum_salary();
                $this->load->view('admin/header');
                $this->load->view('admin/dashboard',$data);
                $this->load->view('admin/footer');
            }
            else{
   
                $staff=$this->session->userdata('userid');
                $data['department']=$this->Department_model->select_departments($staff);
                $data['leave']=$this->Leave_model->select_leave_byStaffID($staff);
                $data['content']=$this->Staff_model->select_staff_byID($staff);
                $this->load->view('staff/header');
                $this->load->view('staff/dashboard',$data);
                $this->load->view('staff/footer');


               
            }
            
        }
	}

     public function error_500()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/500error');
        $this->load->view('admin/footer');
    }
         public function reminders()
    {
        $data['notice'] = $this->notice_model->GetNotice();
        $this->load->view('admin/header');
        $this->load->view('admin/reminders',$data);
        $this->load->view('admin/footer');
    }
    public function Published_Notice(){
    if($this->session->userdata('logged_in') != False) {  
        $data['notice'] = $this->notice_model->GetNotice();  
         $this->load->view('admin/header');
        $this->load->view('admin/add-notice',$data);
        $this->load->view('admin/footer');

    $filetitle = $this->input->post('title');           
    $ndate = $this->input->post('nodate');          
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[25]|max_length[150]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            #redirect("notice/All_notice");
            } else {
            if($_FILES['file_url']['name']){
            $file_name = $_FILES['file_url']['name'];
            $fileSize = $_FILES["file_url"]["size"]/1024;
            $fileType = $_FILES["file_url"]["type"];
            $new_file_name='';
            $new_file_name .= $file_name;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/img/reminders",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx",
                'overwrite' => False,
                'max_size' => "50720000"
            );
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('file_url')) {
                echo $this->upload->display_errors();
                #redirect("notice/All_notice");
            }
   
            else {
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $data = array();
                $data = array(
                    'title' => $filetitle,
                    'file_url' => $img_url,
                    'date' => $ndate
                );
            $success = $this->notice_model->Published_Notice($data); 
            #$this->session->set_flashdata('feedback','Successfully Updated');
            #redirect("notice/All_notice");
                echo "Successfully Added";
            }
        }
            
        }
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }

     public function tenured()
    {
        $data['department']=$this->Department_model->select_departments();
        $data['content']=$this->Staff_model->select_staff();
        $data['country']=$this->Home_model->select_countries();
        $this->load->view('admin/header');
        $this->load->view('admin/tenured',$data);
        $this->load->view('admin/footer');
    }


    public function login_page()
    {
        $this->load->view('login');
    }

    public function error_page()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/error_page');
        $this->load->view('admin/footer');
    }


	function login()
    {
        $un=$this->input->post('txtusername');
        $pw=$this->input->post('txtpassword');
        $this->load->model('Home_model');
        $check_login=$this->Home_model->logindata($un,$pw);
        if($check_login<>'')
        {
            if($check_login[0]['status']==1){
                if($check_login[0]['usertype']==1){
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id']
                    );
                    $this->session->set_userdata($data);

                    redirect('/');
                }
                elseif($check_login[0]['usertype']==2){
                    $data = array(
                        'logged_in'  =>  TRUE,
                        'username' => $check_login[0]['username'],
                        'usertype' => $check_login[0]['usertype'],
                        'userid' => $check_login[0]['id']
                    );
                    $this->session->set_userdata($data);

                    $this->load->model('Log_model');
                        $params = array(
                                        'users_id'=>$this->session->userdata('userid'),
                                        'action' => 'succesfully login',
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);

                    redirect('/');
                }
                else{
                    $this->session->set_flashdata('login_error', 'Sorry, you cant login right now.', 300);
                    redirect(base_url().'login');
                }
                
            }
            else{
                $this->session->set_flashdata('login_error', 'Sorry, your account is blocked.', 300);
                redirect(base_url().'login');
            }
            
        }
        else{
            $this->session->set_flashdata('login_error', 'Please check your username or password and try again.', 300);
            redirect(base_url().'login');
        }
    }
  

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }

}