<?php

class Logs extends CI_Model
{

     public function get_all_log()
     {
          return $this->db->get("logs");
     }

}
    public function log()
     {

          // Datatables Variables
          $draw = intval($this->input->get("action"));
          $start = intval($this->input->get("ip"));
          $length = intval($this->input->get("created_at"));


          $books = $this->Log_model->get_all_log();

          $data = array();

          foreach($books->result() as $r) {

               $data[] = array(
                    $r->action,
                    $r->ip,
                    $r->created_at,
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $books->num_rows(),
                 "recordsFiltered" => $books->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

?>