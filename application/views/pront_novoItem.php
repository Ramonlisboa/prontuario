<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="modalForm">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3	 class="modal-title"><?=$titulo ?></h3>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row"><div id="msgModal"></div></div>
				<form name="nomeItem" method="post" action="prontuario/">
					<div class="row">
						<div class="col-md-12">Paciente: <b><?=$prontuario->nome ?></b></div>
						<div class="col-md-12">Medico: <b><?=$medico->nome ?></b></div>
							<input type="hidden" name="id_prontuario" value="<?=$prontuario->id_prontuario ?>" />
							<input type="hidden" name="id_paciente" value="<?=$prontuario->id_paciente ?>" />
							<input type="hidden" name="id_medico" value="<?=$medico->id ?>" />
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">Cid</div>
						<div class="col-md-6">
							<input type="text" name="cod_cid" class="form-control autocomplete-cid" />
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-2">Data</div>
						<div class="col-md-4">
							<input type="text" name="dt_cad" class="form-control date-picker" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">Parecer</div>
						<div class="col-md-12">
							<textarea name="parecer_medico" class="form-control"> </textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
        		<button type="button" class="btn btn-primary" onclick="btnModalSaveHandler();">Save changes</button>
				<button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
			</div>
            </div>
			
		</div>
	</div>
</div>
<?php include 'includes/scripts.php'; ?>