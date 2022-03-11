<?php
class Reg_model extends CI_Model
{
    public function saveCustomer()
    {
	   $data['username'] = $this->input->post('username');
	   $data['password'] = $this->input->post('password');
	   $data['usertype'] = $this->input->post('usertype');
	   $this->db->insert('login_tbl', $data);
    }
}