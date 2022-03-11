<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Crud extends CI_Controller {  
      //functions  
      function index(){  
      
            $this->load->view('admin/header');  
           $this->load->view('admin/account', $data);  
           $this->load->view('aadmin/footer');  
      }  
      function fetch_user(){  

          

           $this->load->model("crud_model");  
           $fetch_data = $this->crud_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->users_id;  
                $sub_array[] = $row->action;  
                $sub_array[] = $row->created_at; 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';   
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
      function fetch_single_user()  
      {  
           $output = array();  
           $this->load->model("crud_model");  
           $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['users_id'] = $row->users_id;  
                $output['action'] = $row->action;  
                $output['created_at'] = $row->created_at;  
           }  
           echo json_encode($output);  
      }  
      function delete_single_user()  
      {  
           $this->load->model("crud_model");  
           $this->crud_model->delete_single_user($_POST["user_id"]);  
           echo 'Data Deleted';  
      }

     
        
 }  