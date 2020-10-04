<?php

use Classes\Model\AdminController;
use Classes\Utilites\Validator;
use Classes\View\AdminView;

$data = []; //holds post data
$errors = []; //holds error


if (isset($_POST['delete'])) {

    foreach ($_POST as $key => $val) {
        $data[$key] = sanitize($val);
    }

    $validate = new Validator($data);
    $errors = $validate->validate_credentials(); 

    if ($errors === false) { //check if naay error or wla
        $check = new AdminView();
        $result = $data['username'] == $_SESSION['admin_username']? true: false; //check if username exists

        if (!$result) {
            $errors['username'] = 'Incorrect username.';
        } else {
            $result = $check->check_account_login($data);  //returns array if sakto ang credentials nga g input else false 
            if (!$result) {
                $errors['password'] = 'Password Incorrect!';
            } else {
                $update_date = new AdminController();
                $update_date->delete_account($_SESSION['admin_id']);
                session_destroy();
?>
                <script>
                    window.location = 'index.php';
                </script>
<?php
            }
        }
    }
}

?>