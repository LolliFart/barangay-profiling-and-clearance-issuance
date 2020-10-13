<?php

if(!isset($_SESSION)){ 
    session_start();
}
unset($_SESSION['status']);
use Classes\View\RequestView;

include 'includes/templates/header.inc.php';
 
require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

$clearance = "active"; //active indicator

if(isset($_GET['clearance_request_id'])){
    $table = new RequestView();
    $result = $table->get_pending_request(sanitize($_GET['clearance_request_id']));
    
    if($result->num_rows == 0){
        exit();
    }

    $_POST = $result->fetch_assoc();
}

if(isset($_POST['confirm'])){

    if(isset($_POST['since_year'])){
        $_SESSION['since_year'] = $_POST['since_year'];
    }
    //header('location: send_mail.php?confirm=' . $_POST['clearanceRequested_id']); 
    echo ("<script>location.href='send_mail.php?confirm=" . $_POST["clearanceRequested_id"] . "';</script>");
    

}

if(isset($_POST['discard'])){
    unset( $_SESSION['pdf_name']);
    //header('location: send_mail.php?discard=' . $_POST['clearanceRequested_id']);
    echo ("<script>location.href='send_mail.php?discard=" . $_POST["clearanceRequested_id"] . "';</script>");
}
    
include 'includes/templates/admin_nav.inc.php';
?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>


    <div id="content">
        <div style="display: flex; justify-content: space-between; align-items:center;">
            <h1 class="m-3">Resident Information</h1>
        </div>
        <div class="border m-4 p-4">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <input type="text" value="<?= $_POST['clearanceRequested_id']?>" name="clearanceRequested_id" hidden>
                <input type="text" value="<?= $_POST['clearance_id']?>" name="clearance_id" hidden>
                <input type="text" value="<?= $_POST['clearance_path_name']?>" name="clearance_path_name" hidden>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Requirements: </b></label>
                            <input type="text" value="<?= $_POST['file_upload_directory']?>"
                                name="file_upload_directory" hidden>
                            <a href="<?= $_POST['file_upload_directory']?>" download>Download ZIP</a>
                        </div>
                    </div>

                    <div class="form-group" id="since_form"
                        <?= $_POST['clearance_id'] == '3'? "" : "style='display:none;'" ?>>
                        <label for=""> <b>Year of residency <span class="text-danger">*</span> :</b> </label>
                        <input type="month" class="form-control" name="since_year" id="since_year"
                            <?= $_POST['clearance_id'] == '3'? "" : 'disabled' ?> required>
                        <small class="text-danger"><?= $error['since_year'] ?? ''?></small>
                    </div>
 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Date Request: </b></label>
                            <input type="text" class="form-control" value="<?= $_POST['date_requestedOn']?>"
                                name="date_requestedOn" readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Fullname: </b></label>
                            <input type="text" name="fullname"
                            
                                value="<?= isset($_POST['fullname'])? $_POST['fullname'] :  $_POST['res_fname'] . ' ' . (!empty($_POST['middlename'])? strtoupper(substr($_POST['middlename'], 0, 1)) . '.' : '') . ' ' . $_POST['res_lname'] ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Email: </b></label>
                            <input type="email" class="form-control" name="to_email"
                                value="<?= !isset($_POST['to_email'])? $_POST['email'] : $_POST['to_email']?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Request For: </b></label>
                            <input type="text" value="<?= $_POST['clearance_name']?>" name="clearance_name"
                                class="form-control" readonly>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Purpose: </b></label>
                            <input type="text" name="purpose" value="<?= $_POST['purpose']?>" class="form-control"
                                readonly>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for=""><b>Gender: </b></label>
                            <input type="text" name="res_gender" value="<?= $_POST['res_gender']?>" class="form-control"
                                readonly>
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">

                            <label for=""><b>Age: </b></label>
                            <input type="text" name="age"
                                value="<?= isset($_POST['age'])? $_POST['age'] : date_diff(date_create($_POST['res_DOB']), date_create('today'))->y ?>"
                                class="form-control" readonly>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg 6">
                        <div class="form-group">
                            <label for=""><b>Address: </b></label>
                            <input type="text" name="address" value="<?= $_POST['address']?>" class="form-control"
                                readonly>
                        </div>

                    </div>
                    <div class="col-lg 6">
                        <div class="form-group">
                            <label for=""><b>Civil Status: </b></label>
                            <input type="text" name="civil_status" value="<?= $_POST['civil_status']?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="" style="display:flex; justify-content: space-between;">
                    <button class="btn btn-secondary" name="discard" value="discard">Discard</button>
                    <button class="btn btn-primary" name="confirm" value="confirm">Confirm</button>
                </div>

            </form>
        </div>

    </div>
</div>


<?php
include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>