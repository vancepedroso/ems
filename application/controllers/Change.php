<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    //$this->load->model('change_model','um');
    $this->load->library('session');
    if(!$this->session->userdata('logged_in')){
      redirect('login');
    }
  }
public function change()
{

    $pass=$this->input->post('old_password','required');
    $npass=$this->input->post('newpassword','required|matches[re_password]');
    $rpass=$this->input->post('re_password','required');
    if($npass!=$rpass){
        $this->session->set_flashdata('error', "Sorry, Wrong Password.");
       redirect('manage-salary',"refresh");
        return "false";
    }else{
        $this->db->select('*');
        $this->db->from('login_tbl');
        $this->db->where('username',$this->session->userdata('username'));
        $this->db->where('password',$pass);
        $query = $this->db->get();
        if($query->num_rows()==1){
            $data = array('password' => $npass);
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('login_tbl', $data); 
        $this->session->set_flashdata('success',"Password updated Successfully");
          $this->load->model('Log_model');
                        $params = array(
                                        'users_id'=>$this->session->userdata('userid'),
                                        'action' => 'Changed Password',
                                        'ip' => $_SERVER['REMOTE_ADDR'],
                                        'created_at' =>date("Y-m-d H:i:s"),
                                        'updated_at' =>date("Y-m-d H:i:s"),

                        );
                    $this->Log_model->add_log($params);
        redirect('manage-salary',"refresh");
            return "true";
        }else{
            //return "false";
             $this->session->set_flashdata('error', "Sorry, Wrong Password.");
              redirect('manage-salary',"refresh");
             
        }
    
    }
}
 
}