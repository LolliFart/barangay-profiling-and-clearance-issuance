<?php
if (!isset($_SESSION)) {
    session_start();
}

if (sizeof($_GET) == 0 && sizeof($_POST) == 0) {
    header('location:resident_records.php');
}

include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");

include 'utilities/sanitize_input.util.php';

include 'includes/templates/admin_nav.inc.php';

$resident = 'active';

if (isset($_GET['resident_id'])) {
    $_SESSION['resident_id'] = htmlspecialchars($_GET['resident_id']);
}

if (isset($_POST['submit'])) {


    switch ($_POST['clearance_id']) {
        case '1':
            header('location:admin_clearance_form.php?clearance_id=' . $_POST['clearance_id'] . '');
            break;
        case '2':
            header('location:admin_clearance_form.php?clearance_id=' . $_POST['clearance_id'] . '');
            break;
        case '3':
            header('location:admin_clearance_form.php?clearance_id=' . $_POST['clearance_id'] . '');
            break;
        case '4':
            header('location:admin_clearance_form.php?clearance_id=' . $_POST['clearance_id'] . '');
            break;
        case '5':
            header('location:admin_clearance_form.php?clearance_id=' . $_POST['clearance_id'] . '');
            break;
    }
}

?>


<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>

    <div id="content">


        <div class=" card p-5 col-lg-8 m-auto" style="border:solid; width:100%;">
            <h2 class="record_header"><b>Choose Clearance Form</b></h2>
            <hr>
            <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <label for="#">Select a form <span class="text-danger">*</span></label>
                    <select name="clearance_id" class="form-control">
                        <option value="1">Barangay Clearance</option>
                        <option value="2">Certificate of Indigency</option>
                        <option value="3">Certificate of Residency</option>
                        <option value="4">Certification</option>
                        <option value="5">Business Certificate</option>
                    </select>
                </div>
                <div class="form-group" style="display:flex; flex-direction: column; align-items: flex-end;">
                    <button class='btn btn-dark' name='submit' value='submit'>Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>


<?php include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>