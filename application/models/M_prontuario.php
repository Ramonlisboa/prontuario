<?php

Class M_prontuario extends CI_Model {
	private $msg;
	
	public function store($dados = null, $id = null)
	{
		try {
			if($id){
				$this->db->where('id',$id)
						 ->update('prontuario',$dados);
			} else {
				$this->db->insert('prontuario',$dados);
			}
		} catch (Exception $e) {
			$msg = 'Erro:'.$e->getCode() . ' - ' . $e->getMessage();
			$this->setMsg($msg);
			return false;
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
	
	public function getItemProntuario($id = null)
	{
		if($id){
			$this->db->where('id',$id);			
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('prontuario_item');
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
				limit 0,150";
		
		$result = $this->db->query($sql)->result();
		
		if($result) {
			return $result;
		}
	}
	
	/**
	 * Específico para itens do prontuario do Paciente
	 * @param id_paciente id do paciente
	 */
	public function getUltimosItensProntuarioPaciente($id_paciente)
	{
		$sql = "select pa.id as id_paciente,  pi.id as id_prontuario_item, pa.nome as nome, pi.dt_cad , c.cod_cid as cod_cid, c.nome as nome_cid, m.id as id_medico, m.nome nome_medico
				from paciente pa
				join prontuario pr on pr.id_paciente = pa.id
				join prontuario_item pi on pr.id = pi.id_prontuario
				join cid c on c.id = pi.cod_cid
				join medico m on m.id = pi.id_medico
				where pa.id = $id_paciente
				order by pi.dt_cad desc
				limit 0,150";
		
		$result = $this->db->query($sql)->result();
		
// 		echo "<pre>";
// 		print_r($sql);
// 		echo "</pre>";
		
		if($result) {
			return $result;
		}
	}
	
	/*
	 * Html's builders
	 */
	
	public function htmlNovoItemPaciente($id_paciente)
	{
		$row = $this->db->select("pa.id as id_paciente, pa.nome, pr.id as id_prontuario")
							->join("paciente pa","pr.id_paciente = pa.id")
							->where("pa.id=$id_paciente")
							->get('prontuario pr')
							->row();
		
		if($row)
			return $row;
	}
	
	public function htmlEditItemPaciente($id_prontuario_item)
	{
		$row = $this->db->select("pa.id as id_paciente, pa.nome, pr.id as id_prontuario, c.cod_cid as cod_cid, ")
							->join("paciente pa","pr.id_paciente = pa.id")
							->join("prontuario_item pi","pr.id = pi.id_prontuario")
							->join("cid c","pi.cod_cid = c.id")
							->where("pi.id=$id_prontuario_item")
							->get('prontuario pr')
							->row();
		
		if($row)
			return $row;
	}
	
	public function htmlCidAutoComplete($term)
	{
		$query = $this->db->where("nome like '%$term%' or cod_cid like '%$term%'")->get('cid')->result();
		
		if($query){
			$html="";
			foreach($query as $row){
				$new_row['label'] = htmlentities(stripslashes($row->cod_cid . ' ' . $row->nome));
				$new_row['value'] = htmlentities(stripslashes($row->cod_cid));
				$html[] = $new_row;
			}
			
			echo json_encode($html);
		}
	}
	
	public function setMsg($msg)
	{
		$this->msg = $msg;
	}
	
	public function getMsg()
	{
		return $this->msg;
	}
		
}

/*
 * $row = $this->db->select()
							->join()
							->where()
							->get()
							->row();
 */