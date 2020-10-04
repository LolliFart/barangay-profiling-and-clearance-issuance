<?php 
if(!isset($_SESSION)){
    session_start();
} 

unset($_SESSION['resident_id']);
unset($_SESSION['clearance_id']);
unset($_SESSION['clearance_template_path']);
unset($_SESSION['data']);
unset($_SESSION['pdf_filename']);
unset($_SESSION['clearance_path_name']);
unset($_SESSION['form_path']);
unset($_SESSION['status']);
unset($_SESSION['pdf_name']);

if (!isset($_SESSION['admin_id']) || ($_SESSION['admin_id'] == '')){ ?>
	<script>
		window.location = 'index.php';
	</script>
	<?php
}
?>    