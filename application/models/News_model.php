<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

 public function get_news_by_ajax()
    {
        // https://codeigniter.com/userguide3/database/query_builder.html#looking-for-similar-data
        $this->db->like('staff_name', $this->input->post('filter_news_title'));
        $query = $this->db->get('staff_tbl');

        // check the number of rows in the result set
        if ($query->num_rows() > 0) {
            // return the query result as array
            return $query->result_array();
        } else {
            // return the empty array if no row
            return array();
        }
    }


}