<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proces extends CI_Controller {

public function pindah_departemen()
{

    //we take the current selected option (return false when none)
    $filter_dept = $this->input->post('dept_filter');

    //and we pass it to the model
    $data = array(
        'title'     => 'Pindah Departemen',
        'data' => $this->Pindah_dept_model->GetSiswa($filter_dept)
    );
    $data['department'] = $this->Pindah_dept_model->getAllGroups();

        $this->load->view('admin/header');
        $this->load->view('admin/manage-staff',$data);
        $this->load->view('admin/footer');
}
}