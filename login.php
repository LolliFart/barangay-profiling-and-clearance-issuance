<?php
include 'sessions/login.php';

include("includes/templates/header.inc.php");

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';
 
include_once 'transactions/login.php';

include("includes/templates/nav.inc.php");

?>
 


<div style="background-color: #e0ece4; display:flex;padding:100px 25px 25px 25px; height: 100vh;">

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

                <h1 style="font-size: 3em;">Barangay Profiling and Clearance Issuance</h1>
                <p class="mt-5">Barangay Residents Record and Online Clearance Issuance.</p>

            </div>

        </div>
    </div>
    <div class="container bg-white p-5" style="width: 100%;">
        <div class="container" style="height: 100%;">
            <h2> <b>Admin Login</b> </h2>
            <p>Enter your username and password.</p>

            <form class="mt-5" action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <div class="form-group">
                    <label for=""><i class="fas fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" autofocus
                        value="<?= isset($_POST['username']) ? sanitize($_POST['username']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['username'] ?? ''?></small>
                </div>

                <div class="form-group">
                    <label for=""><i class="fas fa-lock"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <small class='text-danger'><?= $errors['password'] ?? ''?></small>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" value="login" class="btn btn-secondary form-control">Login</button>
                </div>

            </form>





        </div>
    </div>
</div>


<?php
include("includes/templates/footer.inc.php");
?>
