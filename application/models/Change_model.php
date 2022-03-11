<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_model extends CI_Model {

 //public function checkOldPass($old_password)
//{
    //$id = $this->input->post('id');
          //  $this->db->where('username', $this->session->userdata('username'));
          //  $this->db->where('id', $id);
 //   $this->db->where('password', $old_password);
   // $query = $this->db->get('login_tbl');
   // if($query->num_rows() > 0)
       // return 1;
  //  else
      //  return 0;
//}      
//public function checkOldPass($old_password){
    //$this->db->where('username', $this->session->userdata('username'));
   // $query = $this->db->get('login_tbl');
    //$row    = $query->row();
    //echo "Type Password : ".$old_password."<br>";
   // echo "db password : ".$row->password."<br>";
   // die;

   // if($query->num_rows > 0){
     // $row = $query->row();
      //if($old_password == $row->password){
       // return true;
     // }else{
       // return false;
     // }
   // }
 // }
 
  public function saveNewPass($old_pass){
    $array = array(
            'password'=>$old_pass
            );
    $this->db->where('username', $this->session->userdata('username'));
    $query = $this->db->update('login_tbl',$array);
   if($query){
      //return true;
   }else
   {
      return false;
    }  
}


}