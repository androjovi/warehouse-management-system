<?php
class M_master extends CI_Model
{
  function add_data($data, $table)
    {
      return $this->db->insert($table, $data);
    }
  function get_data($table)
    {
      return $this->db->get($table);
    }
  function remove_data($data, $table)
    {
      return $this->db->delete($table, $data);
    }
}
