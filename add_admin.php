<?php

if(!isset($_SESSION)){ 
    session_start();
}

include("includes/templates/header.inc.php");

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

include_once 'transactions/add_admin.php';   

include 'includes/templates/admin_nav.inc.php';

$accounts = 'active';

?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>

    <div id="content">

        <div class="sub-content">
            <div class="border p-0 col-lg-5 m-auto">
                <div class="head p-3">
                    <h4 class="m-0 text-center" style="color:white">Add Account</h4>
                </div>
                <div class="card-body" style="background-color:white">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="form-group">
                            <label for="#"><b>Username: <span class="text-danger">*</span></b></label>
                            <input class="form-control" type="text" name="username" value="" placeholder="Username">
                            <small class='text-danger'><?= $errors['username'] ?? ''?></small>
                        </div>
                        <div class="form-group">
                            <label for="#"><b>Password: <span class="text-danger">*</span></b></label>
                            <input class="form-control" type="Password" name="password" value="" placeholder="Password">
                            <small class='text-danger'><?= $errors['password'] ?? ''?></small>
                            <small class="form-text text-muted">
                                Your password must be atleast
                                <ul>
                                    <li>8 characters long</li>
                                    <li>1 upper case letter</li>
                                    <li>1 lower case letter</li>
                                    <li>1 digit</li>
                                    <li>must not contain
                                        special characters</li>
                                </ul>

                            </small>
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn btn-primary form-control" name='add' value="add">Register</button>
                        </div>
                    </form>
                    <div class="form-group" style=" text-align:center;">
                        <a class="btn w-100 btn-secondary"
                            href="admin_accounts_record.php?error_message=Adding account was cancelled">Cancel</a>
                    </div>
                </div>
                <div class="footer-style card-footer footer-copyright text-center py-3 mt-0"
                    style="background-color: #495464; ">
                </div>
            </div>
        </div>

    </div>

</div>


<?php
include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>