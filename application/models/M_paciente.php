<?php

Class M_paciente extends CI_Model {
	
	public function store($dados = null, $id = null)
	{
		if($id){
			$this->db->where('id',$id);
			if($this->db->update('paciente',$dados)){
				return true;
			}else {
				return false;
			}
		} else {
			if($this->db->insert('paciente',$dados)){
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
		return $this->db->get('paciente');
	}
	
	public function getArray($id = null)
	{
		if($id){
			$this->db->where('id',$id);			
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('paciente')->row_array();
	}
	
	public function delete($id = null)
	{
		if($id){
			return $this->db->delete('paciente',$id);
		}
	}
	
	/*
	 * Html's builders
	 */
	
	public function htmlPacienteAutoComplete($term)
	{
		$query = $this->db->like("nome",$term)->get('paciente')->result();
		
		if($query){
			$html="";
			foreach($query as $row){
				$new_row['label'] = htmlentities(stripslashes($row->id . ' ' . $row->nome));
				$new_row['id'] = htmlentities(stripslashes($row->id));
				$new_row['nome'] = htmlentities(stripslashes($row->nome));
				$html[] = $new_row;
			}
				
			echo json_encode($html);
		}
	}
}