<?php

class Dorm_model extends CI_Model
{
    protected $table = 'dorm';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><ul><li>', '</li></ul></div>');
    }

    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    public function get_paginate_list($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_one_list($id)
    {
        $query = $this->db->get_where($this->table, array("id" => $id));
        $data = $query->result();

        return $data;
    }

    public function insert($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return true;
        }
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        if ($this->db->delete($this->table, "id = " . $id)) {
            return true;
        }
    }
}
