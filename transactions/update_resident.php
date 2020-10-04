<?php

use Classes\Controller\ResidentController;
use Classes\Utilites\Validator;
use Classes\View\ResidentView;

if (isset($_GET['resident_id']) && $_GET['resident_id'] != '') {
    $edit = new ResidentView;
    $row = $edit->get_resident(htmlspecialchars($_GET['resident_id']))->fetch_assoc();

    foreach ($row as $key => $val) {
        $_POST[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }
    $_POST['contact_number'] = '0' . substr($_POST['contact_number'], 3);
  
}


if (isset($_POST['update'])) {

    $data = []; //holds post data
    $errors = []; //holds error 

    foreach ($_POST as $key => $val) {
        $data[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_form();

    if ($errors === false) {
        $update = new ResidentController();
        $update->update($data);
?>
        <script>
            window.location = 'resident_records.php?message=Resident successfully update';
        </script>

<?php
    }
}

?>