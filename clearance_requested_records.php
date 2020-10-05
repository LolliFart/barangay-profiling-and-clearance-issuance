<?php

include 'sessions/admin_session.php';

use Classes\View\RequestView;

include 'includes/templates/header.inc.php';

include 'utilities/sanitize_input.util.php';

require_once realpath("vendor/autoload.php");
 
$clearance="active"; //active indicator



include 'includes/templates/admin_nav.inc.php';

?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>


    <div id="content">
        <div style="display: flex; justify-content: space-between; align-items:center;">
            <h2 class="record_header"><b>Request Logs</b></h2>
        </div>
        <hr>
        <div>
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
                            <th>Address</th>
                            <th>Civil Status</th>
                            <th>Request For</th>
                            <th>Purpose</th>
                            <th>Date Request</th>
                            <th>Date Recieved</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $table = new RequestView();
                        $result = $table->get_all_logs();
                            if($result){
                                if($table->row_count != 0){
                                    $ctr = 0;
                                    while($row =  $result->fetch_assoc()){
                                        $is_approved = $row['is_approved'] == 1? 'Approved':'Disapproved';
                                        $middlename = !empty($row['res_mname'])? strtoupper(substr($row['res_mname'], 0, 1)) . '.' : '';
                                        echo"<tr>
                                                <td>" . ++$ctr . "</td>
                                                <td hidden>" . $row['clearanceRequested_id'] . "</td>
                                                <td>" . ucfirst($row['res_lname']) . ' ' . ucfirst($row['res_fname']) . ' ' . strtoupper($middlename) .  "</td>
                                                <td>" . ucfirst($row['res_gender']) . "</td>
                                                <td>" . ucwords($row['address']) . "</td>
                                                <td>" . ucfirst($row['civil_status']) . "</td>
                                                <td>" . $row['clearance_name'] . "</td>
                                                <td>" . ucwords($row['purpose']) . "</td>
                                                <td>" . $row['date_requestedOn'] . "</td>
                                                <td>" . $row['date_issuedOn'] . "</td>
                                                <td>" . $is_approved . "</td>
                                            </tr>";
                                    }
                                }
                            }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


<?php 
    include 'includes/templates/sidebar_js.inc.php';
    include 'includes/templates/footer.inc.php';
?>