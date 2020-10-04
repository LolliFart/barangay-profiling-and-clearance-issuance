<?php


if(!isset($_SESSION)){ 
    session_start();
}


include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

require_once 'transactions/delete_account.php';

include 'includes/templates/admin_nav.inc.php';

$del_acc = 'active';


?>


<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php';?>

    <div id="content">

 

        <div class="sub-content">
            <div class=" p-0 col-lg-5 border m-auto">
                <div class="head p-3">
                    <h4 class="m-0 text-center" style="color:white">Delete Account</h4>
                </div>

                <div class="card-body" style="background-color:white">
                    <ul class="" style="border:1px solid black;">
                        <li>
                        <small>To delete your account you must enter your Username and Password.</small>
                        </li>
                    </ul>
                    
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                        <div class="form-group text-left mt-3">
                            <label for="username"><b>Username</b></label>
                            <input class="form-control" name="username" type="text"
                                placeholder="Username" required autofocus>
                            <small class='text-danger'><?= $errors['username'] ?? ''?></small>
                        </div>

                        <div class="form-group text-left mb-0">
                            <label for="password"><b>Password</b></label>
                            <input class="form-control" name="password" type="password" placeholder="Password" required>
                            <small class='text-danger'><?= $errors['password'] ?? ''?></small>
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary form-control" name='delete' value="delete">Delete Account</button>
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