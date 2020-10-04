<?php


if(!isset($_SESSION)){ 
    session_start();
}


include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

require_once 'transactions/change_password.php';

include 'includes/templates/admin_nav.inc.php';

$change_pass = 'active';


?>


<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php';?>

    <div id="content">



        <div class="sub-content">
            <div class="border p-0 col-lg-5 m-auto">
                <div class="head p-3">
                    <h4 class="m-0 text-center" style="color:white">Change Password</h4>
                </div>

                <div class="card-body" style="background-color:white">


                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                        <div class="form-group text-left">
                            <label for="oldpassword"><b>Current Password</b></label>
                            <input class="form-control" name="oldpassword" type="password"
                                placeholder="Current Password" required>
                            <small class='text-danger'><?= $errors['oldpassword'] ?? ''?></small>
                        </div>

                        <div class="form-group text-left mb-0">
                            <label for="password"><b>New Password</b></label>
                            <input class="form-control" name="password" type="password" placeholder="Password" required>
                            <small class='text-danger'><?= $errors['password'] ?? ''?></small>
                        </div>


                        <div class="form-group text-left mt-2">
                            <label for="repass"><b>Retype Password</b></label>
                            <input class="form-control" name="repass" type="password" placeholder="Retype Password"
                                required>
                            <small class='text-danger'><?= $errors['repass'] ?? ''?></small>
                        </div>
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

                        <div class="form-group mt-4">
                            <button class="btn btn-primary form-control" name='submit' value="submit">Save Changes</button>
                        </div>

                    </form> 
                    <div class="form-group" style=" text-align:center;">
                        <a class="btn w-100 btn-secondary" href="resident_records.php">Cancel</a>
                    </div>
                </div>

                <div class="footer-style card-footer footer-copyright text-center py-3 mt-0"
                    style="background-color: #495464; ">
                </div>

            </div>
        </div>
    </div>


</div>


<?php include 'includes/templates/sidebar_js.inc.php';
        include 'includes/templates/footer.inc.php';
    ?>