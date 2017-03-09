
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
							    
					<?php $this->load->view($nome_view);?>
				
				</div>
			</div>
	</body>
</html>