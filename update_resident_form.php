<?php
include("includes/templates/header.inc.php");

require_once realpath("vendor/autoload.php"); 

include 'utilities/sanitize_input.util.php';

include_once 'transactions/update_resident.php'; 

$resident = 'active';

include 'includes/templates/admin_nav.inc.php';
?>

<div class="wrapper">

    <?php include 'includes/templates/admin_sidebar.inc.php';?>

    <div id="content">


        <?php include("includes/forms/resident_form.inc.php");?>
 
 
    </div>
    
</div>


<?php include 'includes/templates/sidebar_js.inc.php';
        include 'includes/templates/footer.inc.php';
    ?>
 