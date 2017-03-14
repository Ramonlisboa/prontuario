
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include 'includes/header.php';?>
	    
	</head>
	  <body>
	
		<div id="wrapper">
			
			<?php include 'includes/navigation.php';?>
			<div id="page-wrapper">
		        <div class="container-fluid">
				<div class="row"><div id="msgNotification"></div></div>
				<div class="row"><div id="respModal"></div></div>
					<?php $this->load->view($nome_view);?>
				
				</div>
			</div>
			<?php include 'includes/scripts.php';?>
	</body>
</html>