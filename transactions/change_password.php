<?php

use Classes\Model\AdminController;
use Classes\Utilites\Validator; 
use Classes\View\AdminView;

$test = false;
$data = []; //holds post data
$errors = []; //holds error

// echo htmlspecialchars(SID);

if (isset($_POST['submit'])) {

    foreach ($_POST as $key => $val) {
        $data[$key] = sanitize($val); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_pass(); //returns array of errors

    if ($errors === false) {
        $check = new AdminView();
        $post_data['oldpassword'] = $data['oldpassword'];
        $result = $check->check_password($post_data);
        if (!$result) {
            $errors['oldpassword'] = 'Password Not Found';
        } else {
            if ($data['password'] != $data['repass']) {
                $errors['repass'] = 'Password Not Match';
            } else {
                $change = new AdminController();
                $result = $change->update_password($data);
                $test = true;
                unset($_POST['oldpassword']);
                unset($_POST['password']);
                unset($_POST['repass']);\
                header("location:resident_records.php?message=You have successfully update your password");
            }
        }
    }
}
