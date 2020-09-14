<?php
class DataModel extends CI_Model{
    public function readTable($table)
    {
        $data = $this->db->get($table);
        return $data->result();
    }

    public function readWhereTable($table, $where)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function deleteTable($table, $data)
    {
        $this->db->delete($table, $data);
    }

    public function updateTable($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function insertTable($table, $data)
    {
        $this->db->insert($table, $data);
    }
}