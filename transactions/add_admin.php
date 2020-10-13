<?php

use Classes\Model\AdminController;
use Classes\Utilites\Validator;
use Classes\View\AdminView;

$data = []; //holds post data
$errors = []; //holds error

if (isset($_POST['add'])) {
 
    foreach ($_POST as $key => $val) {
        $data[$key] = sanitize($val); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_credentials();
    if ($errors === false) { //check if naay error or wla
        $check_username = new AdminView();
        $result = $check_username->check_username($data['username']); //returns true kung available else false

        if ($result) { //if not available
            $errors['username'] = 'Username not available';
        } else {
            $add = new AdminController();
            $result = $add->add($data);
            echo ("<script>location.href='admin_accounts_record.php?message=" . $data['username'] . " successfully added" . "';</script>");
        }
    }
 
}

?>