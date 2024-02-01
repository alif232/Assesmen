<?php
class MUser extends CI_Model
{
    public $table = 'tbuser';

    function get_validasi($username, $password)
    {
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $total = $this->db->count_all_results($this->table);
      if ($total > 0){
        return true;
      } else { 
        return false;
      }
    }

    function get_user_data($username)
    {
        $this->db->select('nama');
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
}