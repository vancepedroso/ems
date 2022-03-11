<?php  
 class Crud_model extends CI_Model  
 {  
      var $table = "log";  
      var $select_column = array("id", "users_id", "action", "created_at");  
      var $order_column = array("id", "users_id", "action" , "created_at");  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("users_id", $_POST["search"]["value"]);  
                 $this->db->or_like("action", $_POST["search"]["value"]);  
                $this->db->or_like("created_at", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function insert_crud($data)  
      {  
           $this->db->insert('log', $data);  
      }      
      function getUsername($id) {
        $this->db->where( 'id', $id );      
        $query = $this->db->get('staff_tbl');
        return $query->result();
    }
      function fetch_single_user($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $query=$this->db->get('log');  
           return $query->result();  
      }  
      function update_crud($user_id, $data)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->update("log", $data);  
      }  
      function delete_single_user($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->delete("log");  
           //DELETE FROM users WHERE id = '$user_id'  
      } 
     
 }  