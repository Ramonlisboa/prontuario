<?php

Class M_prontuario extends CI_Model {
	
	public function store($dados = null, $id = null)
	{
		if($id){
			$this->db->where('id',$id);
			if($this->db->update('prontuario',$dados)){
				return true;
			}else {
				return false;
			}
		} else {
			if($this->db->insert('prontuario',$dados)){
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
		return $this->db->get('prontuario');
	}
	
	public function getCondElements($cond = null, $order = array(), $sql = null)
	{
		if($cond){
			$this->db->where($cond);			
		}
		
		if($order)
			$this->db->order_by($order["col"], $order['order']);
		else
		$this->db->order_by("id", "desc");
		
		return $this->db->get('prontuario');
	}
	
	public function delete($id = null)
	{
		if($id){
			return $this->db->delete('prontuario',$id);
		}
	}
	
	/**
	 * Específico para itens do prontuario
	 */
	public function getUltimosItensProntuario()
	{
		$sql = "select pi.id as id_prontuario_item, pa.nome as nome, pi.dt_cad , pi.cod_cid as cod_cid, cid.nome as nome_cid, m.nome nome_medico
				from paciente pa
				join prontuario pr on pr.id_paciente = pa.id
				join prontuario_item pi on pr.id = pi.id_prontuario
				join cid on cid.id = pi.cod_cid
				join medico m on m.id = pi.id_medico
				order by pi.dt_cad desc
				limit 0,1000";
		
		$result = $this->db->query($sql)->result();
		
		if($result) {
			return $result;
		}
	}
}