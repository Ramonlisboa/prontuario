<?php

class M_medico extends CI_Model {
	
	public function store($dados = null, $id = null)
	{
		if($id){
			$this->db->where('id',$id);
			if($this->db->update('medico',$dados)){
				return true;
			}else {
				return false;
			}
		} else {
			if($this->db->insert('medico',$dados)){
				return true;
			} else {
				return false;
			}
		}
	}
	
	public function get($id = null)
	{
		if($id){
			$this->db->where('id',$id);			
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('medico')->row();
	}
	
	public function delete($id = null)
	{
		if($id){
			return $this->db->delete('medico',$id);
		}
	}
}