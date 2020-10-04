<?php
include 'sessions/admin_session.php';

use Classes\View\ResidentView;

include 'includes/templates/header.inc.php';

include 'utilities/sanitize_input.util.php';

require_once realpath("vendor/autoload.php");

require_once 'transactions/delete_resident.php';

$resident = 'active';


?>



<?php include 'includes/templates/admin_nav.inc.php'; ?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>

    <div id="content">
        <div style="display: flex; justify-content: space-between; align-items:center;">
            <h2 class="record_header"><b>Resident Records</b></h2>
            <div class="add_button">                
                <a href="add_resident_form.php" class="hidden-xs btn btn-primary show-text"><i class="fas fa-user-plus"></i> <span class="hide-text"> Add Resident</span> </a>
            </div>
        </div>
 
        <hr>

        <div>
        <p class='text-danger'><?= $_GET['error_message'] ?? '' ?></p>
        <p class='text-success'><?= $_GET['message'] ?? '' ?></p>
            <div class="table-responsive">
                <table class="table nowrap table-striped table-bordered table-sm  table-hover table-font"
                    id="mydatatable" style="width:100%;">
                    <thead class="thead-dark">

                        <tr>
                            <th>No.</th>
                            <th hidden></th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th>Civil Status</th>
                            <th>Place Of Birth</th>
                            <th>Contact Number</th>
                            <th>Action</thx>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $table = new ResidentView();
                        $result = $table->get_all_resident();
                        if ($result) {
                            if ($result->num_rows != 0) {
                                $ctr = 0;
                                while ($row =  $result->fetch_assoc()) {
                                    $middlename = !empty($row['middlename'])? strtoupper(substr($row['middlename'], 0, 1)) . '.' : '';
                                    echo "<tr>
                    
                                        <th>" . ++$ctr . "</th>
                                        <td hidden>" . $row['resident_id'] . "</td>
                                        <td>" . ucfirst($row['lastname']) . ', ' . ucfirst($row['firstname']) . ' ' . $middlename .  "</td>
                                        <td>" . ucfirst($row['gender']) . "</td>
                                        <td>" . ucwords($row['religion']) . "</td>
                                        <td>" . $row['dob'] . "</td>
                                        <td>" . ucwords($row['address']) . "</td>
                                        <td>" . ucfirst($row['civil_status']) . "</td>
                                        <td>" . ucwords($row['pob']) . "</td>
                                        <td>" . $row['contact_number'] . "</td>
                                        <td> 
                                        <a href='update_resident_form.php?resident_id=" . $row['resident_id'] . "' ><i class='text-warning fas fa-edit'></i></a> | 
                                        <a href='resident_records.php?resident_id=" . $row['resident_id'] . "' ><i class='fa fa-trash text-danger' aria-hidden='true'></i></a> | 
                                        <a href='select_clearance.php?resident_id=" . $row['resident_id'] . "' ><i class='text-info fas fa-id-card-alt'></i></a> 
                                        </td> 
                                    </tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div> 

        </div>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    </div>

</div>


<?php
include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>
