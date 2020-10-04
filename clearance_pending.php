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
            <h2 class="record_header"><b>Clearance Pendings</b></h2>
        </div>
        <hr>
        <div>
            <div class="table-responsive">
            <table class="table nowrap table-striped table-bordered table-sm  table-hover table-font"
                    id="mydatatable" style="width:100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th hidden></th>
                            <th>Name</th>
                            <th>Gender</thpx>
                            <th>Address</thx>
                            <th>Civil Status</thpx>
                            <th>Request For</thx>
                            <th>Purpose</thpx>
                            <th>Date Request</th>
                            <th>Email</th>
                            <th>Action</thpx>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $table = new RequestView();
                            $result = $table->get_all_pending_request();
                            if($table->row_count != 0){
                                $ctr = 0;
                                while($row =  $result->fetch_assoc()){
                                    echo "<tr>
        
                                    <td>" . ++$ctr . "</td>
                                    <td hidden>" . $row['clearanceRequested_id'] . "</td>
                                    <td>" . ucfirst($row['res_lname']) . ' ' . ucfirst($row['res_fname']) . ' ' . strtoupper(substr($row['res_fname'], 0, 1)) . '.' .  "</td>
                                    <td>" . $row['res_gender'] . "</td>
                                    <td>" . $row['address'] . "</td>
                                    <td>" . $row['civil_status'] . "</td>
                                    <td>" . $row['clearance_name'] . "</td>
                                    <td>" . $row['purpose'] . "</td>
                                    <td>" . $row['date_requestedOn'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td><a href='view_request.php?clearance_request_id=" . $row['clearanceRequested_id'] ."'><i class='fas fa-eye'></i> View</a></td>
                                  </tr>";
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

<!-- <th width="200px">File Path</th> -->
                            
<!-- <th width="40px">Action</th> -->