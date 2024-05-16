<?php

if (!defined("BASEPATH")) exit("No direct script access allowed");

class Queries extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}


	public function select_no_where($fields, $table_name, $single = false) {
		$query = $this->db->select($fields)->from($table_name)->get();

		if ($query->num_rows() > 0):
			return ($single == true) ? $query->row()->$fields : $query->result_array(); 
		endif;
		
		return false;
	}

	public function select_where($fields, $table_name, $where, $boolean = false, $single = false) {
		$query = $this->db->select($fields)->from($table_name)->where($where)->get();

		if ($query->num_rows() > 0):
			if ($boolean == true):
				return true;
			else:
				if ($single == true):
					return $query->row();
				else:
					return $query->result_array();
				endif;
			endif;
		endif;

		return false;

	}

	public function insert($data, $table, $return_id = false) {

        $this->db->insert($table, $data);
        
        if ($this->db->affected_rows() > 0) {
            if ($return_id) {
                return $this->db->insert_id();
            }
            return true; 
        } else {
            return false; 
        }
    }

	public function update($data, $table, $condition) {

        $this->db->where($condition);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    
    public function delete($table, $condition) {

        $this->db->where($condition);
        $this->db->delete($table);

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}
