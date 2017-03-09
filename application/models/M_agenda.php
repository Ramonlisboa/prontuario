<?php

Class M_agenda extends CI_Model {
	
	public function store($dados = null, $id = null)
	{
		if($id){
			$this->db->where('id',$id);
			if($this->db->update('agenda',$dados)){
				return true;
			}else {
				return false;
			}
		} else {
			if($this->db->insert('agenda',$dados)){
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
		return $this->db->get('agenda');
	}
	
	public function delete($id = null)
	{
		if($id){
			return $this->db->delete('agenda',$id);
		}
	}
}