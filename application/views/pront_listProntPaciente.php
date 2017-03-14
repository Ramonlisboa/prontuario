<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>

<?php
if($itensPront){
	$i=0;
	foreach ($itensPront as $o){
		?>
		<tr>
			<td> </td>
			<td><?=$i++ ?> </td>
			<td><?=$o->id_prontuario_item ?> </td>
			<td><?=$o->nome ?> </td>
			<td><?=$o->cod_cid . ' ' . $o->nome_cid ?> </td>
			<td><?= date("d/m/Y", strtotime($o->dt_cad))?></td>
			<td><?=$o->nome_medico ?> </td>
		</tr>
		<?php 
	}
}
?>

<?php include 'includes/scripts.php'; ?>