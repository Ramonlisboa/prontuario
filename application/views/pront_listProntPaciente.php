<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<?php
if($itensPront){
	$i=0;
	foreach ($itensPront as $o){
		?>
		<tr>
			<td width="1%"><a href="javascript:;" id="btnEditItem" onclick="getPaginaModal('prontuario/incluirItem/<?=$o->id_paciente ?>/<?=$o->id_medico ?>/<?=$o->id_prontuario_item ?>','#respModal','#modalForm')"><i class="btn btn-sm btn-primary fa fa-edit"></i></a></td>
			<td><?=$i++ ?> </td>
			<td><?=$o->id_prontuario_item ?> </td>
			<td><?=$o->cod_cid . ' ' . $o->nome_cid ?> </td>
			<td><?= date("d/m/Y", strtotime($o->dt_cad))?></td>
			<td><?=$o->nome_medico ?> </td>
		</tr>
		<?php 
	}
}
?>

<?php include 'includes/scripts.php'; ?>