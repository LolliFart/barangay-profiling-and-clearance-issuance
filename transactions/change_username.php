<?php

use Classes\Model\AdminController;
use Classes\Utilites\Validator;
use Classes\View\AdminView;

$data = []; //holds post data
$errors = []; //holds error

if(isset($_POST['submit'])){

    foreach ($_POST as $key => $val) {
        $data[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_user_name();

    if($errors === false){

        $check_username = new AdminView();
        $result = $check_username->check_username($data['username']); //returns true kung available else false

        if ($result) { //if not available
            $errors['username'] = 'Username not available';
        } else {
            $change = new AdminController();
            $change->update_username($data);
            unset($_POST['username']);
            echo ("<script>location.href='resident_records.php?message=You have successfully update your username';</script>");
        }
    } 
}


?> 