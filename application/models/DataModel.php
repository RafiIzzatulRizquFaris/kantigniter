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

    public function readProduct()
    {
        $data = $this->db->get('product');
        return $data->result();
    }

    public function deleteProduct($data)
    {
        $this->db->delete('product', $data);
    }

    public function updateProduct($data, $where)
    {
        $this->db->update('product', $data, $where);
    }

    public function insertProduct($data)
    {
        $this->db->insert('product', $data);
    }

    public function readUser()
    {
        $data = $this->db->get('user');
        return $data->result();
    }

    public function deleteUser($data)
    {
        $this->db->delete('user', $data);
    }

    public function updateUser($data, $where)
    {
        $this->db->update('user', $data, $where);
    }

    public function insertUser($data)
    {
        $this->db->insert('user', $data);
    }
}