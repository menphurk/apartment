<?php
class User_model extends CI_Model
{
	protected $table = 'users';

    public function __construct()
    {
		parent::__construct();
		
		$this->load->database();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><ul><li>', '</li></ul></div>');
    }

    public function fetch_login($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$this->salt_pass($password));
        $query = $this->db->get($this->table);
        return $query->row();
    }

	public function record_count($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$this->salt_pass($password));
		return $this->db->count_all_results($this->table);
    }
    
	public function salt_pass($password)
	{
		return md5($password);
	}
 
	public function read_user($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
    }
    
	public function entry_user($id)
	{
		$data = array('admin_name' => $this->input->post('admin_name'));
			$this->db->update($this->table, $data, array('id'=> $id));
	}


	//ListUser//
	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function get_paginate_list($limit, $start) {
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

	public function update($data,$id)
	{
		$this->db->set($data); 
		$this->db->where("id", $id);
		$this->db->update($this->table, $data); 
	}

	public function delete($id)
	{
		if ($this->db->delete($this->table, "id = ".$id)) { 
            return true; 
         } 
	}

	
}
