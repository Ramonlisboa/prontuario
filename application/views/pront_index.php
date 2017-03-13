<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Selecione um Paciente</div>
			</div>
			<div class="panel-body">
				<form name="paciente" action="<?=base_url() ?>paciente/pesquisaPaciente" autocomplete="off">
					<div class="row">
						<div class="col-lg-2">
							<input name="id_paciente" id="id_paciente" class="form-control" placeholder="Id" onchange="getPacienteId(this.value);">
						</div>
						<div class="col-lg-6">
							<input name="nome" id="nome_paciente" class="form-control autocomplete-paciente" placeholder="Nome">
						</div>
						<div class="col-lg-1 col-lg-offset-3">
							<button class="btn btn-primary" onclick="getListItensProntuarios(this);"> <i class="fa fa-search"></i> </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Lista dos últimos Registros na Tabela Prontuário</div>
		</div>
		<div class="panel-body">
			<table class="table table-condensed table-striped table-bordered">
				<thead>
					<tr>
						<th width="1%"><a href="javascript:;" id="btnNovoItem" onclick=""><i class="btn btn-sm btn-success fa fa-plus"></i></a></th>
						<th>#</th>
						<th>ID</th>
						<th>Paciente</th>
						<th>CID/Nome</th>
						<th>Data</th>
						<th>Medico</th>
					</tr>
				</thead>
				<tbody id="tbDados">					
				</tbody>
			</table>
		</div>
	</div>
</div>