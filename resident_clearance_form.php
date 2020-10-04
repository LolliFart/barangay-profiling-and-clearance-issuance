<?php
include_once 'sessions/login.php';

include 'includes/templates/header.inc.php'; 

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

include 'utilities/zip.util.php';
 
include_once 'transactions/resident_request.php';

include("includes/templates/nav.inc.php");

?>

<div style="background-color: #e0ece4; display:flex;padding:100px 25px 25px 25px;">

    <div class="" style="width:100%; background-color: #495464;">
        <div style="padding:20px; display:flex; align-items:center; color: white;">
            <div class="">
                <img src="image/logo1.png" alt="logo" width="100">
            </div>
            <div>
                <h6 style="border-bottom:3px solid white;"><b>Republic of the Philippines</b></h6>

                <h5><b>BARANGAY OF LAPASAN, Cagayan de Oro City</b></h5>
            </div>
        </div>

        <div class="m-4" style="color:white; text-align: center; display:flex; align-items: center;">
            <div class="">
                <h1 style="font-size: 5em;">Online Clearance</h1>
                <h2>Issuance</h2>
                <p>Fill this form to request clearance</p>
            </div>
        </div>
        <hr class="m-4" style="background-color: white;">
        <div class="m-4" style="color:white;">
            <p style="font-size: 12px;">Note* Only registered resident can avail the Online Clearance Issuance. <br>
                Unregistered residents can go directly to our barangay hall. Please bring a valid ID for verification
            </p>
            <h6>Requirements:</h6>
            <ul>
                <li style="font-size: 13px;">
                    Barangay Clearance
                    <ol>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                    </ol>
                </li>
                <li style="font-size: 13px;">
                    Certificate of Residency
                    <ol>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                    </ol>
                </li>
                <li style="font-size: 13px;">
                    Certificate of Indigency
                    <ol>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                    </ol>
                </li>
            </ul>
        </div> 
    </div>
    <div class="container bg-white p-4" style="width: 100%;">
        <h3>Clearance Request Form</h3>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <p>Please fill-up the form.</p>

            <div class="form-group">
                <input type="file" name="file[]" multiple="multiple" required/>
                    <br>
                    <small>Take pictures of your requirements and upload it here</small>
                    <?php
                        if(!empty($image_errors)){
                            foreach($image_errors as $key => $error){
                                echo "<br><small class='text-danger'>" . $key . ": " . $error . "</small>";
                            }
                        }
                    ?>
            </div>

            <div class="row">
                <div class="form-group col-lg-12">
                    <label for=""> <b>Request For <span class="text-danger">*</span></b> </label>
                    <select class="form-control" name="clearance_id" required>
                        <option value="" <?= isset($_POST['clearance_id']) && $_POST['clearance_id']==''? 'selected' : '' ?>></option>
                        <option value="1" <?= isset($_POST['clearance_id']) && $_POST['clearance_id']=='1'? 'selected' : '' ?>>Barangay Clearance</option>
                        <option value="2" <?= isset($_POST['clearance_id']) && $_POST['clearance_id']=='2'? 'selected' : '' ?>>Certificate Of Indigency</option>
                        <option value="3" <?= isset($_POST['clearance_id']) && $_POST['clearance_id']=='3'? 'selected' : '' ?>>Certificate Of Residency</option>
                    </select>
                    <small class='text-danger'><?= $errors['clearance_id'] ?? ''?></small>
                </div>

                <div class="form-group col-lg-12">
                    <label for="#"><b>Email <span class="text-danger">*</span></b></label>
                    <input type="email" class="form-control" name="email"
                        value="<?= isset($_POST['email']) ? sanitize($_POST['email']) : ''; ?>">
                    <small class='text-danger'><?= $email_error['email'] ?? ''?></small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="firstname"><b>First Name <span class="text-danger">*</span></b></label>
                    <input class="form-control" name="firstname" type="text"
                        value="<?= isset($_POST['firstname'])? sanitize($_POST['firstname']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['firstname'] ?? ''?></small>
                </div>
                <div class="form-group col-lg-4">
                    <label for="middlename"><b>Middle Name</b></label>
                    <input class="form-control" name="middlename" type="text"
                        value="<?= isset($_POST['middlename']) ? sanitize($_POST['middlename']) : ''; ?>">
                    <small class='text-danger'><?= $errors['middlename'] ?? ''?></small>
                </div>

                <div class="form-group col-lg-4">
                    <label for="lastname"><b>Last Name <span class="text-danger">*</span></b></label>
                    <input class="form-control" name="lastname" type="text"
                        value="<?= isset($_POST['lastname']) ? sanitize($_POST['lastname']) : '' ?>" required>
                    <small class='text-danger'><?= $errors['lastname'] ?? ''?></small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="lastname"><b>Age <span class="text-danger">*</span></b></label>
                    <input type="text" name="age" class="form-control"
                        value="<?= isset($_POST['age']) ? sanitize($_POST['age']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['age'] ?? ''?></small>
                </div>
                <div class="form-group col-lg-6">
                    <label for="civil_status"><b>Civil Status <span class="text-danger">*</span></b></label>
                    <select name="civil_status" class="form-control" required>
                        <option value=""></option>
                        <option value="single"
                            <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='single'? 'selected' : '' ?>>
                            Single</option>
                        <option value="married"
                            <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='married'? 'selected' : ''?>>
                            Married</option>
                        <option value="widow"
                            <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='widow'? 'selected' : ''?>>
                            Widow</option>
                        <option value="separated"
                            <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='separated'? 'selected' : ''?>>
                            Separated</option>
                    </select>
                    <psmall class='text-danger'><?= $errors['status'] ?? ''?></psmall>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="address"><b>Address <span class="text-danger">*</span></b></label>
                    <input type="text" name="address" class="form-control"
                        value="<?= isset($_POST['address']) ? sanitize($_POST['address']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['address'] ?? ''?></small>
                </div>
                <div class="form-group col-lg-6">
                    <label for="purpose"><b>Purpose <span class="text-danger">*</span></b></label>
                    <input type="text" name="purpose" class="form-control"
                        value="<?= isset($_POST['purpose']) ? sanitize($_POST['purpose']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['purpose'] ?? ''?></small>
                </div>
            </div>


            <div class="form-group">
                <button class='btn btn-dark form-control' name='submit' value='submit'>Submit</button>
            </div>
        </form>
    </div>
</div>





<?php

include("includes/templates/footer.inc.php");
?>