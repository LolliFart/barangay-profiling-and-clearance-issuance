<?php

if(!isset($_SESSION)){ 
    session_start();
}

use Classes\Controller\RequestController;
use Classes\View\RequestView;

include 'includes/templates/header.inc.php';

include 'utilities/sanitize_input.util.php';
include 'utilities/generate_pdf.util.php';
include 'utilities/Emailsending/email.util.php';


require_once realpath("vendor/autoload.php");

$clearance = "active"; //active indicator

if(isset($_GET['confirm'])){
    $_SESSION['status'] = true;
    $table = new RequestView();
    $result = $table->get_pending_request(sanitize($_GET['confirm']));
    
    $_POST = $result->fetch_assoc();
    $_POST['fullname'] = $_POST['res_fname'] . ' ' . substr( $_POST['res_mname'], 0, 1) . '.' . ' ' . $_POST['res_lname'];
    $_POST['age'] = date_diff(date_create($_POST['res_DOB']), date_create('today'))->y;

    if(isset($_SESSION['since_year'])){
        $_POST['year_of_residency'] = $_SESSION['since_year'];
        unset($_SESSION['since_year']);
    }

    if(!isset($_SESSION['pdf_name'])){ 
        $_POST['is_download'] = false;
        $_SESSION['pdf_name'] = $_POST['res_lname'] . '_' . rand(2000, 1200000) . '.pdf';
        $_POST['pdf_filename'] = $_SESSION['pdf_name'];
        generate_pdf($_POST);
    } 
}

if(isset($_GET['discard'])){
    $_SESSION['status'] = false;
    $table = new RequestView();
    $result = $table->get_pending_request(sanitize($_GET['discard']));

    if($result->num_rows == 0){
        echo 'Error'; // display error kng ang clearance request id kai wla sa database
    }
    $_POST = $result->fetch_assoc();
    unset($_SESSION['status']);
    unset( $_SESSION['pdf_name']);
}


if(isset($_POST['send'])){

    $status = new RequestController();
    if($_SESSION['status']){
        $status->update_request_status(htmlspecialchars($_POST['clearanceRequested_id']), 1);

    } else{
        $status->update_request_status(htmlspecialchars($_POST['clearanceRequested_id']), 0);
    }

    $from = $_POST['from_email'];
    $to = $_POST['to_email'];
    $subject = $_POST['subject'];
    $filename = $_SESSION['pdf_name'];
    $body = $_POST['body'];
    

    $result = send_mail($from, $to, $subject, $filename, $body);
    
    if($result){

        if(unlink($_POST['file_upload_directory'])){
            unset($_SESSION['status']);
            unset( $_SESSION['pdf_name']);
            header('location: clearance_pending.php'); 
        }

    } else{
        echo 'ahak naay error';
    }

}

include 'includes/templates/admin_nav.inc.php';


?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>


    <div id="content">
        <div class="m-4">
            <h1 >Send Email</h1> 
            <a class="btn btn-secondary" href="view_request.php?clearance_request_id=<?=  $_POST['clearanceRequested_id'] ?>">Go back</a>
        </div>



        <div class="border m-4 p-4">

            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

            <input type="text" value="<?= $_POST['file_upload_directory']?>" name="file_upload_directory" hidden>
            <input type="text" value="<?= $_POST['clearanceRequested_id']?>" name="clearanceRequested_id" hidden>
            <div class="form-group">
                    <label>From: </label>   
                    <input type="text" name="from_email" id="" class="form-control" value="<?= !isset($_POST['from_email'])? 'sevenlucky185@gmail.com' : $_POST['from_email'] ?>">
                </div>
                <div class="form-group">
                    <label>To: </label>
                    <input type="text" name="to_email" id="" class="form-control" value="<?= $_POST['to_email']?>" readonly>
                </div>
                <div class="form-group">
                    <label>Subject: </label>
                    <input type="text" name="subject" id="" class="form-control" value="<?= !isset($_POST['subject'])? 'Barangay Lapasan' : $_POST['subject'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Attachment: </label>
                    <input type="text" name="pdf_name" value="<?= $filename?>" hidden>
                    <?php
                        if(!isset($_SESSION['pdf_name'])){
                            $filename = 'None';
                            echo '<span>None</span>';
                        } else{
                            echo '<a href="pdf/' . $_SESSION['pdf_name'] . '" download> ' . $_SESSION['pdf_name'] .  ' </a>';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Body: </label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="5"> <?= !isset($_POST['body'])? 'Barangay Lapasan' : $_POST['body'] ?> </textarea>
                </div>

                <div class="form-group" style="display:flex; justify-content: flex-end;">
                    <button class="btn btn-primary" name="send" value="send">Send</button>
                </div>
            </form>


        </div>

    </div>
</div>


<?php
include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>


