<?php

use Classes\Controller\ResidentController;

if(isset($_GET['resident_id'])){
    $delete = new ResidentController();
    $delete->undo(htmlspecialchars($_GET['resident_id']));
}
?> 