<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
    }
    
    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('login');
        }
    }
    
    public function changePassword()
    {
        $this->logged_in();

        $data['title'] = 'Change Password';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/change_password', $data);
            $this->load->view('admin/footer');
        }
        else {

            $id = $this->session->userdata('id');

            $newpass = $this->input->post('newpass');

            $this->users_model->update_user($id, array('password' => $newpass));

            redirect('admin/logout');
        }
    }

    public function password_check($oldpass)
    {
        $id = $this->session->userdata('id');
        $user = $this->users_model->get_user($id);

        if($user->password !== $oldpass) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
}
?>