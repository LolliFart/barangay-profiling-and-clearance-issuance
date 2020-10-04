<?php

use Classes\Controller\ResidentController;

if(isset($_GET['resident_id'])){
    $delete = new ResidentController();
    $delete->delete(htmlspecialchars($_GET['resident_id']));
    $_GET['message'] = "Resident successfully deleted";
}

?>