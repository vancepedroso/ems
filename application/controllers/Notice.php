 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller {


    function __construct() {
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
    public function All_notice(){
        if($this->session->userdata('logged_in') != False) {
        $data['notice'] = $this->notice_model->GetNotice();
        $this->load->view('admin/header');
        $this->load->view('admin/reminders',$data);
        $this->load->view('admin/footer');

        }
    else{
		redirect(base_url() , 'refresh');
	}        
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
    $filetitle = $this->input->post('title');    		
    $ndate = $this->input->post('nodate'); 
        $this->load->helper('security');   		
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

             $this->session->set_flashdata('success', "New Staff Added Succesfully"); 
             $data['notice'] = $this->notice_model->GetNotice();
             $this->load->view('admin/header');
             $this->load->view('admin/reminders',$data);
             $this->load->view('admin/footer');

                //echo "Successfully Added";
			}
        }
            
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
     function delete($data)
    {
       
        $data=$this->Notice_model->delete_notice($data);
        if($this->db->affected_rows() > 0)
        {

            $this->session->set_flashdata('success', "Staff Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Staff Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
}