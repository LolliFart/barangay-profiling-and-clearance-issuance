<?php 
if(!isset($_SESSION)){
    session_start();
} 

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_id']) != ''){ 
	
	?>
	
	<script>
		window.location = 'resident_records.php';
	</script> 

	<?php
}
?>   