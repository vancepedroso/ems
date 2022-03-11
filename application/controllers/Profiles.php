<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
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

    public function manage()
    {
        $data['department']=$this->Department_model->select_departments();
        $data['content']=$this->Staff_model->select_staff();
        $data['country']=$this->Home_model->select_countries();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-staff',$data);
        $this->load->view('admin/footer');
    }

     public function import()
    {
        $data['content']=$this->Staff_model->select_staff();
        $this->load->view('admin/header');
        $this->load->view('admin/import',$data);
        $this->load->view('admin/footer');
    }

        public function logs()
    {
        $data['logs']=$this->Log_model->select_log();
        $this->load->view('admin/header');
        $this->load->view('admin/logs',$data);
        $this->load->view('admin/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Team', 'required');
        $this->form_validation->set_rules('txtemail', 'Company Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password ', 'required');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('slccountry', 'Country');
        $this->form_validation->set_rules('txtaddress', 'Address');
        $this->form_validation->set_rules('txtperad', 'Personal email');
        $this->form_validation->set_rules('txtfbuser', 'State');
        $this->form_validation->set_rules('txteducation', 'Education');
        $this->form_validation->set_rules('txtcompany', 'Education');
        $this->form_validation->set_rules('txtcitizenship', 'Citenzhip');
        $this->form_validation->set_rules('slcmarital', 'marital');
        $this->form_validation->set_rules('txtreligion', 'religion');
        $this->form_validation->set_rules('txtblood', 'blood');
        $this->form_validation->set_rules('txtphilhealth', 'blood');
        $this->form_validation->set_rules('txtalergy', 'alergy');
        $this->form_validation->set_rules('txtmed', 'med');
        $this->form_validation->set_rules('txtposition', 'position');
        $this->form_validation->set_rules('txtcampaign', 'campaign');
        $this->form_validation->set_rules('txtpsbank', 'psbank');
        $this->form_validation->set_rules('txtsss', 'sss');
        $this->form_validation->set_rules('txttin', 'tin');
        $this->form_validation->set_rules('txtpagibig', 'pagibig');
        $this->form_validation->set_rules('txtemergency', 'emergency');
        $this->form_validation->set_rules('txtemergencycontact', 'emergencycontact');
        $this->form_validation->set_rules('txtemergecnyrelationship', 'emergecnyrelationship');
        $this->form_validation->set_rules('txtemergecnyaddress', 'emergecnyaddress');
        $this->form_validation->set_rules('slcstatus', 'status');
        $this->form_validation->set_rules('slctenure', 'tenure','required');
        $this->form_validation->set_rules('txtmobile', 'mobile number', 'required');

        $name=$this->input->post('txtname');
        $gender=$this->input->post('slcgender');
        $department=$this->input->post('slcdepartment');
        $email=$this->input->post('txtemail');
        $password=$this->input->post('password');
        $dob=$this->input->post('txtdob');
        $doj=$this->input->post('txtdoj');
        $city=$this->input->post('txtperad');
        $state=$this->input->post('txtfbuser');
        $country=$this->input->post('slccountry');
        $address=$this->input->post('txtaddress');
        $added=$this->session->userdata('userid');
        $education=$this->input->post('txteducation');
        $company=$this->input->post('txtcompany');
        $citizenship=$this->input->post('txtcitizenship');
        $philhealth=$this->input->post('txtphilhealth');
        $marital=$this->input->post('slcmarital');
        $religion=$this->input->post('txtreligion');
        $blood=$this->input->post('txtblood');
        $alergy=$this->input->post('txtalergy');
        $med=$this->input->post('txtmed');
        $position=$this->input->post('txtposition');
        $campaign=$this->input->post('txtcampaign');
        $psbank=$this->input->post('txtpsbank');
        $sss=$this->input->post('txtsss');
        $tin=$this->input->post('txttin');
        $pagibig=$this->input->post('txtpagibig');
        $emergency=$this->input->post('txtemergency');
        $emergencycontact=$this->input->post('txtemergencycontact');
        $emergecnyrelationship=$this->input->post('txtemergecnyrelationship');
        $emergecnyaddress=$this->input->post('txtemergecnyaddress');
        $status=$this->input->post('slcstatus');
        $tenure=$this->input->post('slctenure','required');
        $mobile=$this->input->post('txtmobile');

        if($this->form_validation->run() !== false)
        {
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filephoto'))
            {
                $image='default-pic.jpg';
            }
            else
            {
                $image_data =   $this->upload->data();

                $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $image_data['full_path'],
                  'maintain_ratio'  =>  TRUE,
                  'width'           =>  150,
                  'height'          =>  150,
                  'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();
                $image=$image_data['file_name'];
 
 
            }


             //cv upload
            $config['upload_path']= './uploads/cv/';
            // set allowed file types
            $config['allowed_types'] = 'pdf';
            // set upload limit, set 0 for no limit
            $config['max_size'] = 0;
            $this->upload->initialize($config);
  
 
            // load upload library with custom config settings
            $this->load->library('upload', $config);
 
            // if upload failed , display errors
            if (!$this->upload->do_upload('resume'))
            {
            $this->data['error'] = $this->upload->display_errors();
            $this->data['page_data'] = 'admin/manage-staff';
            $this->load->view('admin/manage-staff', $this->data);
            }
            else
            {
            print_r($this->upload->data());
            // print uploaded file data
            }

        
            $login=$this->Home_model->insert_login(array('username'=>$email,'password'=>$password,'usertype'=>2));

            if($login>0)
            {
                $data=$this->Staff_model->insert_staff(
                  array('id'=>$login,
                        'staff_name'=>$name,
                        'gender'=>$gender,
                        'email'=>$email,
                        'password'=>$password,
                        'dob'=>$dob,
                        'doj'=>$doj,
                        'companyemail'=>$city,
                        'fblink'=>$state,
                        'address'=>$address,
                        'country'=>$country,
                        'education'=>$education,
                        'company'=>$company,
                        'department_id'=>$department,
                        'pic'=>$image,
                        'resume'=>$resume,
                        'marital'=>$marital,
                        'added_by'=>$added,
                        'religion'=>$religion,
                        'blood'=>$blood,
                        'alergy'=>$alergy,
                        'med'=>$med,
                        'citizenship'=>$citizenship,
                        'position'=>$position,
                        'campaign'=>$campaign,
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
                        'mobile'=>$mobile));
            }
            
            if($data==true)
            {
                  $this->load->model('Log_model');
                        $params = array(
                                        'users_id'=>$this->session->userdata('username'),
                                         'action' => 'Added Employee Information: '.$name,
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);

                $this->session->set_flashdata('success', "New Staff Added Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, New Staff Adding Failed.");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->index();
            return false;

        } 
    }

    public function update()
    {
        $this->load->helper('form');
        $this->form_validation->set_rules('txtname', 'Full Name', 'required');
        $this->form_validation->set_rules('slcgender', 'Gender', 'required');
        $this->form_validation->set_rules('slcdepartment', 'Department', 'required');
        $this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('txtmobile', 'Mobile Number ', 'required');
        $this->form_validation->set_rules('txtdob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('txtdoj', 'Date of Joining', 'required');
        $this->form_validation->set_rules('txtperad', 'Company Email', 'required');
        $this->form_validation->set_rules('txtfbuser', 'FB', 'required');
        $this->form_validation->set_rules('slccountry', 'Country', 'required');

        $this->form_validation->set_rules('txteducation', 'Education', 'required');
        $this->form_validation->set_rules('txtcompany', 'Education', 'required');
        $this->form_validation->set_rules('txtcitizenship', 'Citenzhip', 'required');
        $this->form_validation->set_rules('slcmarital', 'marital', 'required');
        $this->form_validation->set_rules('txtreligion', 'religion', 'required');
        $this->form_validation->set_rules('txtblood', 'blood', 'required');
        $this->form_validation->set_rules('txtphilhealth', 'blood', 'required');
        $this->form_validation->set_rules('txtalergy', 'alergy', 'required');
        $this->form_validation->set_rules('txtmed', 'med', 'required');
        $this->form_validation->set_rules('txtposition', 'position', 'required');
        $this->form_validation->set_rules('txtcampaign', 'campaign', 'required');
        $this->form_validation->set_rules('txtpsbank', 'psbank', 'required');
        $this->form_validation->set_rules('txtsss', 'sss', 'required');
        $this->form_validation->set_rules('txttin', 'tin', 'required');
        $this->form_validation->set_rules('txtpagibig', 'pagibig', 'required');
        $this->form_validation->set_rules('txtemergency', 'emergency', 'required');
        $this->form_validation->set_rules('txtemergencycontact', 'emergencycontact', 'required');
        $this->form_validation->set_rules('txtemergecnyrelationship', 'emergecnyrelationship', 'required');
        $this->form_validation->set_rules('txtemergecnyaddress', 'emergecnyaddress', 'required');
        $this->form_validation->set_rules('slcstatus', 'status', 'required');
        $this->form_validation->set_rules('slctenure', 'tenure', 'required');


        $id=$this->input->post('txtid');
        $name=$this->input->post('txtname');
        $gender=$this->input->post('slcgender');
        $department=$this->input->post('slcdepartment');
        $email=$this->input->post('txtemail');
        $mobile=$this->input->post('txtmobile');
        $dob=$this->input->post('txtdob');
        $doj=$this->input->post('txtdoj');
        $companyemail=$this->input->post('txtperad');
        $fblink=$this->input->post('txtfbuser');
        $country=$this->input->post('slccountry');
        $address=$this->input->post('txtaddress');

        $education=$this->input->post('txteducation');
        $company=$this->input->post('txtcompany');
        $citizenship=$this->input->post('txtcitizenship');
        $philhealth=$this->input->post('txtphilhealth');
        $marital=$this->input->post('slcmarital');
        $religion=$this->input->post('txtreligion');
        $blood=$this->input->post('txtblood');
        $alergy=$this->input->post('txtalergy');
        $med=$this->input->post('txtmed');
        $position=$this->input->post('txtposition');
        $campaign=$this->input->post('txtcampaign');
        $psbank=$this->input->post('txtpsbank');
        $sss=$this->input->post('txtsss');
        $tin=$this->input->post('txttin');
        $pagibig=$this->input->post('txtpagibig');
        $emergency=$this->input->post('txtemergency');
        $emergencycontact=$this->input->post('txtemergencycontact');
        $emergecnyrelationship=$this->input->post('txtemergecnyrelationship');
        $emergecnyaddress=$this->input->post('txtemergecnyaddress');
        $status=$this->input->post('slcstatus');
        $tenure=$this->input->post('slctenure');

        if($this->form_validation->run() !== false)
        {
            $this->load->library('image_lib');
            $config['upload_path']= 'uploads/profile-pic/';
            $config['allowed_types'] ='gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('filephoto'))
            {
                $data=$this->Staff_model->update_staff(array(
                    'staff_name'=>$name,
                    'gender'=>$gender,
                    'email'=>$email,
                    'mobile'=>$mobile,
                    'dob'=>$dob,
                    'doj'=>$doj,
                    'address'=>$address,

                    'companyemail'=>$companyemail,
                    'fblink'=>$fblink,
                    'country'=>$country,
                    'education'=>$education,
                    'company'=>$company,
                    'marital'=>$marital,
                    'religion'=>$religion,
                    'blood'=>$blood,
                    'alergy'=>$alergy,
                    'med'=>$med,
                    'citizenship'=>$citizenship,
                    'position'=>$position,
                    'campaign'=>$campaign,
                    'psbank'=>$psbank,
                    'sss'=>$sss,
                    'tin'=>$tin,
                    'philhealth'=>$philhealth,
                    'pagibig'=>$pagibig,
                    'emergency'=>$emergency,
                    'emergencycontact'=>$emergencycontact,
                    'emergecnyrelationship'=>$emergecnyrelationship,
                    'status'=>$status,
                    'tenure'=>$tenure,
                    'emergecnyaddress'=>$emergecnyaddress),$id);
            }
            else
            {
                $image_data =   $this->upload->data();

                $configer =  array(
                  'image_library'   => 'gd2',
                  'source_image'    =>  $image_data['full_path'],
                  'maintain_ratio'  =>  TRUE,
                  'width'           =>  150,
                  'height'          =>  150,
                  'quality'         =>  50
                );
                $this->image_lib->clear();
                $this->image_lib->initialize($configer);
                $this->image_lib->resize();

                $data=$this->Staff_model->update_staff(array(
                    'staff_name'=>$name,
                    'gender'=>$gender,
                    'email'=>$email,
                    'mobile'=>$mobile,
                    'dob'=>$dob,
                    'doj'=>$doj,
                    'address'=>$address,
                    'companyemail'=>$companyemail,
                    'fblink'=>$fblink,
                    'country'=>$country,
                    'department_id'=>$department,
                    'pic'=>$image_data['file_name'],

                    'education'=>$education,
                    'company'=>$company,
                    'marital'=>$marital,
                    'religion'=>$religion,
                    'blood'=>$blood,
                    'alergy'=>$alergy,
                    'med'=>$med,
                    'citizenship'=>$citizenship,
                    'position'=>$position,
                    'campaign'=>$campaign,
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
                    'added_by'=>$added),$id);
            }
            
            //logs
            if($this->db->affected_rows() > 0)
            {
                 $this->load->model('Log_model');

                        $params = array(
                                        'users_id'=>$this->session->userdata('username'),
                                        'action' => 'Updated Employee: '.$name,
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);
                $this->session->set_flashdata('success', "Staff Updated Succesfully"); 
            }else{
                $this->session->set_flashdata('error', "Sorry, Staff Updated Failed.");
            }
        
            redirect(base_url()."manage-staff");
        }
        else{


            $this->index();
            return false;

        } 
    }


    function edit($id)
    {
        $data['department']=$this->Department_model->select_departments();
        $data['country']=$this->Home_model->select_countries();
        $data['content']=$this->Staff_model->select_staff_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-staff',$data);
        $this->load->view('admin/footer');

    }
    
      

    function profile($id)
    {

        $data['department']=$this->Department_model->select_departments();
        $data['country']=$this->Home_model->select_countries();
        $data['content']=$this->Staff_model->select_staff_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/profile',$data);
        $this->load->view('admin/footer');

    }



    function employeeedit($id)
    {
        $staff=$this->session->userdata('userid');
        $data['department']=$this->Department_model->select_departments($staff);
        $data['country']=$this->Home_model->select_countries($staff);
        $data['content']=$this->Staff_model->select_staff_byID($staff);
        $this->load->view('staff/header');
        $this->load->view('staff/edit-employee',$data);
        $this->load->view('staff/footer');


        $this->load->model('Log_model');

                        $params = array(
                                        'users_id'=>$this->session->userdata('userid'),
                                        'action' => 'Updated Employee: ',
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);
    }

    function delete($id)
    {
        $this->Home_model->delete_login_byID($id);
        $data=$this->Staff_model->delete_staff($id);
        if($this->db->affected_rows() > 0)
        {
              $this->load->model('Log_model');
                        $params = array(
                                        'users_id'=>$this->session->userdata('userid'),
                                        'action' => 'Updated Employee: '.$name,
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);

            $this->session->set_flashdata('success', "Staff Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Staff Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    



}
