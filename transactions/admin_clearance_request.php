
<!-- MODAL FOR FOUND -->
<div class="modal fade" id="found">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-primary">
                    Success!
                </span>
            </div>
            <div class="modal-body">
                <span class="text-secondary">
                    You can now download the pdf copy of your certificate by clicking the link below. Thank you. <br>
                </span>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: space-between;">

                <div class="">
                    <a href="index.php">Go Back</a>
                </div>
                <div class="">
                    <a href="download_pdf.php?download=true" target="_blank">Download Certificate.</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

use Classes\Controller\RequestController;
use Classes\Utilites\Validator;
use Classes\View\ResidentView;

$is_admin = true;

// get clearance form
if (isset($_GET['clearance_id'])) {

    $_SESSION['clearance_id'] = $_GET['clearance_id'];

    switch ($_SESSION['clearance_id']) {
        case 1:
            $_POST['clearance_path_name'] = 'brgy_clearance_template.inc.php';
            $_SESSION['form_path'] = 'clearance_form.inc.php';
            break;
        case 2:
            $_POST['clearance_path_name'] = 'cert_indigency_template.inc.php';
            $_SESSION['form_path'] = 'clearance_form.inc.php';
            break;
        case 3:
            $_POST['clearance_path_name'] = 'cert_for_residency_template.inc.php';
            $_SESSION['form_path'] = 'clearance_residency_form.inc.php';
            break;
        case 4:
            $_POST['clearance_path_name'] = 'certification_template.inc.php';
            $_SESSION['form_path'] = 'certification_form.inc.php';
            break;
        case 5:
            $_POST['clearance_path_name'] = 'cert_for_business_template.inc.php';
            $_SESSION['form_path'] = 'cert_for_business_form.inc.php';
            break;
    } 

    if (isset($_SESSION['resident_id'])) {
        $get = new ResidentView;
        $row = $get->get_resident(htmlspecialchars($_SESSION['resident_id']))->fetch_assoc();
        foreach ($row as $key => $val) {
            $_POST[$key] = $val;
        }

        $bday = new DateTime($row['dob']); // Your date of birth
        $today = new Datetime(date('m.d.y'));
        $diff = $today->diff($bday);
        $_POST['age'] = $diff->y;
        $_POST['resident_id'] = $_SESSION['resident_id'];
    }
}

// submit form
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $val) {
        $data[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);

    switch ($data['clearance_id']) {
        case 1:
        case 2:
            $errors = $validate->validate_admin_clearance_form();
            break;
        case 3:
            $errors = $validate->validate_admin_residency_form();
            break;
        case 4:
            $errors = $validate->validate_admin_clearance_form();
            break;
        case 5:
            $errors = $validate->validate_business_form(); 
            break;
    }

    if ($errors === false) {
        $request = new RequestController;
        $request->admin_request_clearance($data);
        $_SESSION['data'] =  $data;
?>
        <script>
            $('#found').modal({
                show: true
            })
        </script>

<?php
    }
}


?>