<?php
Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->my_model->search($keyword);


        $this->load->view('admin/header');
        $this->load->view('admin/csvToMySQL',$data);
        $this->load->view('admin/footer');

    }

}