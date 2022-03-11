<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {


    function getUserInfo($userId)
    {


        $this->db->select('id, username, usertype');
        $this->db->from('login_tbl');
        $this->db->where('id', $userId);
       $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editUser($userInfo, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('login_tbl', $userInfo);

        return TRUE;
    }




}
