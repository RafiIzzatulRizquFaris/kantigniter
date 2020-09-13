<?php
class TrafficModel extends CI_Model{

    public function loginModel($account)
    {
        return $this->db->get_where('user',$account);
    }

    public function logoutModel()
    {
        # code...
    }

    public function registerModel()
    {
        # code...
    }
}