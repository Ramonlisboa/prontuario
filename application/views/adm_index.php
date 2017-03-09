<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administrador <small>painel</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> prontuário
                            </li>
                        </ol>
                    </div>
 </div>
                
<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Lista dos últimos Registros na Tabela Prontuário</div>
		</div>
		<div class="panel-body">
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Paciente</th>
						<th>CID/Nome</th>
						<th>Data</th>
						<th>Medico</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if($prontuarios){
							foreach ($prontuarios as $o){
								?>
								<tr>
									<td><?=$o->id_prontuario_item ?></td>
									<td><?=$o->nome ?></td>
									<td><?=$o->cod_cid ?> - <?=$o->nome_cid ?></td>
									<td><?= date("d/m/Y", strtotime($o->dt_cad))?></td>
									<td><?=$o->nome_medico ?></td>
								</tr>
								
								<?php 
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>