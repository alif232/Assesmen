<?php
class MMenu extends CI_Model
{
    public $table = 'tbmenu';

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        //echo $this->db->last_query(); exit;
    }

    // get all data
    function get_all()
    {
        $this->db->order_by('id_menu', 'DESC');
        return $this->db->get($this->table)->result();
    }

    function delete($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete($this->table);
    }    

    function get_by_id($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        return $this->db->get($this->table)->row();
    }

        function update($id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->update($this->table, $data);
    }
}