<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
         $this->load->library('form_validation');
         $this->load->model('profile_model');
         $this->load->library('session');
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }
/**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
            if($userId == null)
            {
                redirect('staff/view-leave');
            }

            $data['userInfo'] = $this->profile_model->getUserInfo($userId);

            $data['title'] = 'Settings';

            $this->load->view('staff/header');
            $this->load->view('staff/view-leave', $data);
            $this->load->view('staff/footer');

    }

    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
            $this->load->library('form_validation');

            $userId = $this->session->userdata('logged_in');

            $this->form_validation->set_rules('name','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[3]');
            $this->form_validation->set_rules('birthday','Birthday','required|xss_clean');
            $this->form_validation->set_rules('gender','Gender','required|xss_clean');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[9]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $bio = $this->input->post('bio');
                $mobile = $this->input->post('mobile');
                $birthday = $this->input->post('birthday');
                $gender = $this->input->post('gender');

                $userInfo = array();

                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'username'=>$username, 'name'=>$name,
                                    'mobile'=>$mobile, 'bio'=>$bio, 'birthday'=>$birthday, 'gender'=>$gender, 'updatedBy'=>$userId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'username'=>$username, 'name'=>$name,
                                    'mobile'=>$mobile, 'bio'=>$bio, 'birthday'=>$birthday, 'gender'=>$gender, 'updatedBy'=>$userId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }

                $result = $this->profile_model->editUser($userInfo, $userId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Profile updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Profile update failed');
                }

                redirect('staff/view-leave');
            }

    }
    


}
