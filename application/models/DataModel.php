<?php
class DataModel extends CI_Model{
    public function readCustomer()
    {
        $data = $this->db->get('customer');
        return $data->result();
    }

    public function deleteCustomer($data)
    {
        $this->db->delete('customer', $data);
    }

    public function updateCustomer($data, $where)
    {
        $this->db->update('customer', $data, $where);
    }

    public function insertCustomer($data)
    {
        $this->db->insert('customer', $data);
    }
}