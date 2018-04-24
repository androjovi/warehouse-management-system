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
  function get_from($data, $table)
    {
      return $this->db->get_where($table, $data);
    }
  function edit_data($data, $where, $table)
    {
      $this->db->set($data);
      $this->db->where($where);
      return $this->db->update($table);
    }
}
