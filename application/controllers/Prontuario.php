<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prontuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_medico');
		$this->load->model('m_paciente');	
		$this->load->model('m_prontuario');	
	}
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$paciente = $this->input->post();
		$data['prontuarios'] = null;
		if($paciente)
			$data['prontuarios'] = $this->m_prontuario->getUltimosItensProntuarioPaciente($paciente["id"]);
		$data['nome_view'] = 'pront_index';
		$this->load->view('v_layout', $data);
	}
	
	public function cadastro()
	{
		$data['titulo'] = 'Novo Médico';
		$this->load->view('medico_cad');
	}
	
	public function store()
	{
		
		$dados = $this->input->post();
		$id = $dados['id'];
		
		unset($dados['id']);
		
		if($this->m_prontuario->store($dados,$id)) {
			echo "OK";
		} else {
			$data['mensagem'] = "Ocorreu um erro. Por favor, tente novamente!";
			$data['mensagem'] .= " <br/>" . $this->m_prontuario->getMsg();
		}
	}
	
	public function edit($id = null)
	{
		if($id) {
			
			$medico = $this->m_medicos->get($id);
			
			if($medico->num_rows() > 0) {
				$data['titulo'] = "Editar Médico";
				$data['id'] = $medico->row()->id;
				$data['nome'] = $medico->row()->nome;
				$data['crm'] = $medico->row()->crm;
				$data['especialidade'] = $medico->row()->especialidade;
				$this->load->view('medico_cad',$data);
			}
		}
	}
	
	public function delete($id = null)
	{
		if($id){
			if($this->m_medico->delete($id)){
				
			}
		}
	}
	
	/*
	 *Paginas HTML Ajax 
	 * 
	 */
	
	public function incluirItem($id_paciente=null, $id_medico=null, $id_prontuario_item = null)
	{
		if($id_prontuario_item){
			$data['prontuario'] = $this->m_prontuario->htmlEditItemPaciente($id_prontuario_item);
			$data['titulo'] = 'Editar Item do Prontuário';
		} else {
			$id_medico = 1; //seria recuperado o id do medico da Sessão
			$data['titulo'] = 'Novo Item no Prontuário';
			$data['prontuario'] = $this->m_prontuario->htmlNovoItemPaciente($id_paciente);
		}
		$data['medico'] = $this->m_medico->get($id_medico);
		$this->load->view('pront_novoItem',$data);
	}
	
	public function getCid()
	{
		$term = $this->input->get('term');
		if(strlen($term) > 3){
			if($term){
				$this->m_prontuario->htmlCidAutoComplete($term);
			}
		}
	}
	
	public function getPacienteId($id)
	{
		if($id){
			echo json_encode($this->m_paciente->getArray($id));
		}
	}
	
	public function getPaciente()
	{
		$term = $this->input->get('term');
		if(strlen($term) > 2){
			if($term){
				$this->m_paciente->htmlPacienteAutoComplete($term);
			}
		}
	}
	public function getListProntuarioPaciente($id_paciente=null, $id_medico=null)
	{
		$paciente = $id_paciente;
		if($paciente)
			$data['itensPront'] = $this->m_prontuario->getUltimosItensProntuarioPaciente($paciente);
		$this->load->view('pront_listProntPaciente', $data);
	}
}
