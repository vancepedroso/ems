<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class My_model Extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('gender',$keyword);
        $query  =   $this->db->get('staff_tbl');
        return $query->result();
    }
}   