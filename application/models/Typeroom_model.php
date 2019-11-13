<?php
class Typeroom_model extends CI_Model
{
    protected $table = 'type_room';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_list(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
}