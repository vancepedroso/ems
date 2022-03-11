<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah_dept_model extends CI_Model {


var $table = 'department_tbl';


     public function select_departments()
    {
        $qry=$this->db->get('department_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

        public function getAllGroups()
{

    $query = $this->db->query('SELECT department_name FROM department_tbl');
    return $query->result_array();
    return $result;
}

public function get_by_id_siswa($id)
{
    $this->db->where('id',$id);
        $qry=$this->db->get('department_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
}
}