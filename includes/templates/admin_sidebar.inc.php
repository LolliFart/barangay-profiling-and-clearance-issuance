<!-- Sidebar  -->
<nav id="sidebar" style="z-index:1;">

    <div class="button-bar" style="border-bottom:1px solid white; padding:0;">
        <button type="button" id="closeTab" class="btn btn-info" style="margin: 20px 5px 12px 20px;">
            <i class="fas fa-bars"></i>
        </button>
        <span style="font-size: 13px;"><img src="image/logo1.png" alt="logo" width="40"> Barangay Lapasan</span>
    </div>

    <ul class="list-unstyled components">
        <li class="<?= $resident ?? ''?>">
            <a href="#resident" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                    class="fas fa-users"></i> Resident</a>
            <ul class="collapse list-unstyled" id="resident">
                <li>
                    <a href="resident_records.php">List of Resident</a>
                </li>
                <li>
                    <a href="deleted_record.php">List of Deleted Resident</a>
                </li>
            </ul>
        </li>
        <li class="<?= $clearance ?? ''?>">
            <a href="#clearance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                    class="fas fa-file-alt"></i> Clearance</a>
            <ul class="collapse list-unstyled" id="clearance">
                <li>
                    <a href="clearance_requested_records.php">Request Logs</a>
                </li>
                <li>
                    <a href="clearance_pending.php">Pending Request</a>
                </li>

            </ul>
        </li>
        <li class="<?= $accounts ?? ''?>">
            <a href="admin_accounts_record.php"><i class="fas fa-user-shield"></i> Admin Records</a>
        </li>

    </ul>
    <div>
        <p class="sidebar-header"><i class="fas fa-user-cog"></i> Account Settings</p>
    </div>
    <ul class="list-unstyled">
        <li class="<?= $change_uname ?? ''?>">
            <a href="change_username.php"><i class="fas fa-user"></i> Change Username</a>
        </li>
        <li class="<?= $change_pass ?? ''?>">
            <a href="change_password.php"><i class="fas fa-lock"></i> Change Password</a>
        </li>
        <li class="<?= $del_acc ?? ''?>">
            <a href="delete_account.php"><i class="fas fa-trash-alt"></i> Delete Account</a>
        </li>

        <li id="logout">
            <a href="transactions/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</nav>