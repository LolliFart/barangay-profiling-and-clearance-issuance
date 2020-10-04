<!-- MODAL FOR NOT FOUND -->
<div class="modal fade" id="notFound">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="text-danger">
                    Resident name not found!
                </span>
            </div>
            <div class="modal-body">
                <span class="text-secondary">
                    The name you entered can't be found on our database, please double check spelling and other
                    information.
                    Thank you.
                </span>
            </div>
            <div class="modal-footer" style="display:flex; justify-content: space-between;">
                <a href="index.php">Exit</a>
                <a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">Try Again</a>
            </div>
        </div>
    </div>
</div>


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
                    We will update you soon. Thank you. <br>
                </span>
            </div>
            <div class="modal-footer" style="display: flex; justify-content: space-between;">
                <div class="">
                    <a href="index.php">Done</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
use Classes\Controller\RequestController;
use Classes\Utilites\ImageValidator;
use Classes\Utilites\Validator;
use Classes\View\ResidentView;

if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $val) {
        $data[$key] = strtolower(sanitize($val)); //removes extra space, converts some predefined characters to HTML entities 
    }

    $validate = new Validator($data);
    $errors = $validate->validate_clearance_form();

    $validate_image = new ImageValidator($_FILES['file']['type'], $_FILES['file']['name']);
    $image_errors = $validate_image->validate_image();

    if ($errors === false && $image_errors === false) {
        $search = new ResidentView();
        $result = $search->search_name($data);
        if ($result->num_rows == 0) {

?>
            <script>
                $('#notFound').modal({
                    show: true
                })
            </script>

<?php
 
        } else {
            $row = $result->fetch_assoc();
            $data['resident_id'] = $row['resident_id'];
            $zip = zip_upload_img($_FILES);

            if (!$zip) {
                echo "Sorry ZIP creation is not working properly.<br/>";
            } else {
                $data['zip_upload_directory'] = $zip;
                $request = new RequestController;
                $request->resident_request_clearance($data);
                unset($data);
                unset($_POST);
            }
        ?>

             <script>
                    $('#found').modal({
                        show: true
                    })
             </script>

<?php
        }
    }
}
?>