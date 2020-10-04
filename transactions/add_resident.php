<?php

use Classes\Controller\ResidentController;
use Classes\Utilites\Validator;

if (isset($_POST['add'])) {

    $data = []; //holds post data
    $errors = []; //holds error
    foreach ($_POST as $key => $val) {
        $data[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_form();
    if ($errors === false) {
        $add = new ResidentController();
        $add->add_resident($data);
        unset($_POST);
?>
        <script>
            window.location = 'resident_records.php?message=Resident Successfully Added';
        </script>
<?php
    }
}

?>