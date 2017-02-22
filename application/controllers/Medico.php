<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$data['cadastros'] = $this->m_medicos->get();
		$this->load->view('medico_list', $data);
	}
	
	public function cadastro()
	{
		$data['titulo'] = 'Novo Médico';
		$this->load->view('medico_cad');
	}
	
	public function store()
	{
		$this->load->library('form_validation');
		
		$regras = array(
				array(
						'field' => 'nome',
						'label' => 'Nome',
						'rules' => 'required'
				),
				array(
						'field' => 'crm',
						'label' => 'CRM',
						'rules' => 'required'
				),
				array(
						'field' => 'especialidade',
						'label' => 'Especialidade',
						'rules' => 'required'
				)
		);
		
		$this->form_validation->set_rules($regras);
		
		if($this->form_validation->run() == FALSE){
			$data['titulo'] = 'Novo Médico';
			$this->load->view('medico_cad');
		} else {
			$dados = $this->input->post();
			$id = $dados['id'];
			
			unset($dados['id']);
			
			if($this->m_medicos->store($dados,$id)) {
				$data['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso',$data);
			} else {
				$data['mensagem'] = "Ocorreu um erro. Por favor, tente novamente!";
				$this->load->view('erros/html/v_erro',$data);
			}
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
}
