<?php

include 'sessions/admin_session.php';

use Classes\View\AdminView;

include 'includes/templates/header.inc.php';

require_once realpath("vendor/autoload.php");


$accounts = "active"; //active indicator


include 'includes/templates/admin_nav.inc.php';
?>

<div class="wrapper">
    <?php include 'includes/templates/admin_sidebar.inc.php'; ?>

    <div id="content">
        <div style="display: flex; justify-content: space-between; align-items:center;">
            <h2 class="record_header"><b>Admin Records</b></h2>
            <div class="add_button">
                <a href="add_admin.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> <span class="hide-text"> Add Admin</a>
            </div>
        </div>
        <hr>

        <div>
        <p class='text-danger'><?= $_GET['error_message'] ?? '' ?></p>
        <p class='text-success'><?= $_GET['message'] ?? '' ?></p>
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm nowrap  table-hover table-font" id="mydatatable"
                style="width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th hidden></th>
                        <th>Username</th>
                        <th>Last Logout</thx>
                        <th>Last Login</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $table = new AdminView();
                    $result = $table->get_all_admin();
                    if($result){
                        if ($result->num_rows != 0) {
                            $ctr = 0;
                            while ($row =  $result->fetch_assoc()) {
    
                                $status = $row['status'] == 1 ? 'active' : 'inactive';
                                $action = $row['status'] == 1 ? "<a href='admin_accounts_record.php?deactivate=" . $row['admin_id'] . "' ><p class='text-danger'>Deactivate</p></a>" : "<a href='admin_accounts_record.php?activate=" . $row['admin_id'] . "' ><p class='text-success'>Activate</p></a>";
    
                                echo "<tr>
                        
                                        <th>" . ++$ctr . "</th>
                                        <td hidden>" . $row['admin_id'] . "</td>
                                        <td>" . $row['admin_username'] . "</td>
                                        <td>" . $row['last_logout'] . "</td>
                                        <td>" . $row['last_login'] . "</td>
                                        <td>" . $status . "</td>
                                        <td>" . $row['date_created'] . "</td>
                                        <td>" . $row['created_by'] . "</td>
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


<?php include 'includes/templates/sidebar_js.inc.php';
include 'includes/templates/footer.inc.php';
?>