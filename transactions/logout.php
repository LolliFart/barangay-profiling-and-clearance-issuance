<?php 
if(!isset($_SESSION)){
    session_start();
} 


use Classes\Model\AdminController;

require_once realpath("../vendor/autoload.php");


$update_date = new AdminController();
$update_date->update_logout_date($_SESSION['admin_id']);   

session_destroy();

?>

<script>
    window.location = '../index.php';
</script>