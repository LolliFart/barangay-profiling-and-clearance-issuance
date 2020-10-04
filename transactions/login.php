<?php

use Classes\Model\AdminController;
use Classes\Utilites\Validator;
use Classes\View\AdminView;

$data = []; //holds post data
$errors = []; //holds error

if (isset($_POST['login'])) {

    foreach ($_POST as $key => $val) {
        $data[$key] = sanitize($val);
    }
 
    $validate = new Validator($data);
    $errors = $validate->validate_credentials(); 

 
    if ($errors === false) { //check if naay error or wla
        $check = new AdminView();
        $result = $check->check_username($data['username']); //check if username exists

        if (!$result) {
            $errors['username'] = 'Username not found.';
        } else {
            $result = $check->check_account_login($data);  //returns array if sakto ang credentials nga g input else false 
            if (!$result) {
                $errors['password'] = 'Password Incorrect!';
            } else {
                $row = $result->fetch_assoc();
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_username'] = $row['admin_username'];
                $update_date = new AdminController();
                $update_date->update_login_date($_SESSION['admin_id']);
?>
                <script>
                    window.location = 'resident_records.php';
                </script>
<?php
            }
        }
    }
}

?>