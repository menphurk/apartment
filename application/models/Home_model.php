<?php
class Home_model extends CI_Model 
{
    public function get_room()
    {
        $query = $this->db->get('rooms');
        return $query->result();
    }

    public function get_one_room($id)
    {
		$query = $this->db->get_where('rooms', array("id" => $id));
		$data = $query->result(); 
         
		return $data;
    }
}