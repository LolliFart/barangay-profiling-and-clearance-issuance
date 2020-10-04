<div class="sub-content">

    <div class="col-lg-8 m-auto bg-white p-4" style="border: solid;">
        <h3><b>Clearance Request Form</b></h3>
        <hr>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">

            <p>Please fill-up the form.</p>

            <input type="text" name="resident_id"
                value="<?= isset($_SESSION['resident_id']) ? sanitize($_SESSION['resident_id']) : ''; ?>" hidden>

            <input type="text" name="clearance_id"
                value="<?= isset($_SESSION['clearance_id']) ? sanitize($_SESSION['clearance_id']) : ''; ?>" hidden>
 
            <input type="text" name="clearance_path_name"
                value="<?= isset($_POST['clearance_path_name']) ? sanitize($_POST['clearance_path_name']) : ''; ?>" hidden>

            
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="firstname"><b>First Name:</b></label>
                    <input class="form-control" name="firstname" type="text"
                        value="<?= isset($_POST['firstname']) ? sanitize($_POST['firstname']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['firstname'] ?? '' ?></small>
                </div>
                <div class="form-group col-lg-4">
                    <label for="age"><b>Middle Name:</b></label>
                    <input class="form-control" name="middlename" type="text"
                        value="<?= isset($_POST['middlename']) ? sanitize($_POST['middlename']) : ''; ?>">
                    <small class='text-danger'><?= $errors['middlename'] ?? '' ?></small>
                </div>

                <div class="form-group col-lg-4">
                    <label for="lastname"><b>Last Name:</b></label>
                    <input class="form-control" name="lastname" type="text"
                        value="<?= isset($_POST['lastname']) ? sanitize($_POST['lastname']) : '' ?>" required>
                    <small class='text-danger'><?= $errors['lastname'] ?? '' ?></small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="lastname"><b>Age:</b></label>
                    <input type="text" name="age" class="form-control"
                        value="<?= isset($_POST['age']) ? sanitize($_POST['age']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['age'] ?? '' ?></small>
                </div>
                <div class="form-group col-lg-6">
                    <label for="civil_status"><b>Civil Status:</b></label>
                    <select name="civil_status" class="form-control" required>
                        <option value="single"
                            <?= isset($_POST['civil_status']) && $_POST['civil_status'] == 'single' ? 'selected' : '' ?>>
                            Single</option>
                        <option value="married"
                            <?= isset($_POST['civil_status']) && $_POST['civil_status'] == 'married' ? 'selected' : '' ?>>
                            Married</option>
                        <option value="widow"
                            <?= isset($_POST['civil_status']) && $_POST['civil_status'] == 'widow' ? 'selected' : '' ?>>
                            Widow</option>
                        <option value="separated"
                            <?= isset($_POST['civil_status']) && $_POST['civil_status'] == 'separated' ? 'selected' : '' ?>>
                            Separated</option>
                    </select>
                    <small class='text-danger'><?= $errors['status'] ?? '' ?></small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="address"><b>Address:</b></label>
                    <input type="text" name="address" class="form-control"
                        value="<?= isset($_POST['address']) ? sanitize($_POST['address']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['address'] ?? '' ?></small>
                </div>
                <div class="form-group col-lg-6">
                    <label for="purpose"><b>Purpose:</b></label>
                    <input type="text" name="purpose" class="form-control"
                        value="<?= isset($_POST['purpose']) ? sanitize($_POST['purpose']) : ''; ?>" required>
                    <small class='text-danger'><?= $errors['purpose'] ?? '' ?></small>
                </div>
            </div>

            <div class="form-group" style="display:flex; flex-direction: column; align-items: flex-end;">
                <button class='btn btn-dark' name='submit' value='submit'>Submit</button>
            </div>
        </form>
    </div>
</div>