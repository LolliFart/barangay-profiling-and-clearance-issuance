<?php
if(!isset($_SESSION)){ 
    session_start();
}
 
if(sizeof($_GET) == 0 && sizeof($_POST) == 0){
    header('location:resident_records.php');
}

include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

include_once 'transactions/admin_clearance_request.php';

include 'includes/templates/admin_nav.inc.php'; 

$resident = 'active';

?> 

  
<div class="wrapper">

    <?php include 'includes/templates/admin_sidebar.inc.php';?>

     <div id="content">

             <?php
                 include 'includes/forms/' . $_SESSION['form_path'];
             ?>

     </div>

 </div> 


<?php 
    include 'includes/templates/sidebar_js.inc.php';
    include 'includes/templates/footer.inc.php';
?>