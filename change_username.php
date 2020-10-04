<?php

if(!isset($_SESSION)){
    session_start();
}

include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

require_once 'transactions/change_username.php';

include 'includes/templates/admin_nav.inc.php';

$change_uname = 'active';

?>


<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php';?>

    <div id="content">
        <div class="sub-content">
            <div class="border p-0 col-lg-5 m-auto">
                <div class="head p-3">
                    <h4 class="m-0 text-center" style="color:white">Change Username</h4>
                </div>

                <div class="card-body" style="background-color:white">

                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                        <input type="text" name='id' value="<?= $_SESSION['id']?>" hidden>
                        <div class="form-group">
                            <label for="username"><b>Change Username</b></label>
                            <input class="form-control" name="username" type="text" placeholder="Username"
                                value="<?= isset($_POST['username'])? sanitize($_POST['username']) : '';?>" required
                                autofocus>
                            <small class='text-danger'><?= $errors['username'] ?? ''?></small>

                        </div> 

                        <div class="form-group mt-4">
                            <button class="btn btn-primary form-control" name='submit'>Save Changes</button>
                        </div>

                    </form>
                    <div class="form-group" style=" text-align:center;">
                        <a class="form-control btn btn-secondary" href="resident_records.php">Cancel</a>
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