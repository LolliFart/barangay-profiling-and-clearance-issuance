<div class="sub-content">

    <div class="col-lg-8 m-auto bg-white p-4" style="margin-top: 20px; border: solid;">
        <h3 style="margin-top: 10px;"><b>Certification Form</b></h3>
        <hr>
        <p>Please fill-up the form.</p>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="resident_id"
                value="<?= isset($_SESSION['resident_id']) ? sanitize($_SESSION['resident_id']) : ''; ?>" hidden>

            <input type="text" name="clearance_id"
                value="<?= isset($_SESSION['clearance_id']) ? sanitize($_SESSION['clearance_id']) : ''; ?>" hidden>
 
            <input type="text" name="clearance_path_name"
                value="<?= isset($_POST['clearance_path_name']) ? sanitize($_POST['clearance_path_name']) : ''; ?>" hidden>

            <div class="form-group">
                <label for=""><b>Request for:</b></label>
                <input type="text" class="form-control" name="purpose" value="<?= isset($_POST['purpose']) ? sanitize($_POST['purpose']) : ''; ?>" required>
                <small>Ex. Electrical Connection</small> <br>
                <small class='text-danger'><?= $errors['purpose'] ?? ''?></small>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="firstname"><b>First Name:</b></label>
                        <input type="text" name="firstname" class="form-control"
                            value="<?= isset($_POST['firstname']) ? sanitize($_POST['firstname']) : ''; ?>" required>
                        <small class='text-danger'><?= $errors['firstname'] ?? ''?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="middlename"><b>Middle Name:</b></label>
                        <input type="text" name="middlename" class="form-control"
                            value="<?= isset($_POST['middlename']) ? sanitize($_POST['middlename']) : ''; ?>" required>
                        <small class='text-danger'><?= $errors['middlename'] ?? ''?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="lastname"><b>Last Name:</b></label>
                        <input type="text" name="lastname" class="form-control"
                            value="<?= isset($_POST['lastname']) ? sanitize($_POST['lastname']) : ''; ?>" required>
                        <small class='text-danger'><?= $errors['lastname'] ?? ''?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="age"><b>Age:</b></label>
                        <input type="text" name="age" class="form-control"
                            value="<?= isset($_POST['age']) ? sanitize($_POST['age']) : ''; ?>" required>
                        <small class='text-danger'><?= $errors['age'] ?? ''?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="status"><b>Status:</b></label>
                        <select name="civil_status" class="form-control" required>
                            <option value="single"
                                <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='single'? 'selected' : '' ?>>
                                Single</option>
                            <option value="married"
                                <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='married'? 'selected' : ''?>>
                                Married</option>
                            <option value="widow"
                                <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='widow'? 'selected' : ''?>>
                                Widow</option>
                            <option value="separated"
                                <?=  isset($_POST['civil_status']) && $_POST['civil_status']=='separated'? 'selected' : ''?>>
                                Separated</option>
                        </select>
                        <small class='text-danger'><?= $errors['status'] ?? ''?></small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="address"><b>Address:</b></label>
                <input type="text" name="address" class="form-control"
                    value="<?= isset($_POST['address']) ? sanitize($_POST['address']) : ''; ?>" required>
                <small class='text-danger'><?= $errors['address'] ?? ''?></small>
            </div>

            <div class="form-group" style="display:flex; flex-direction: column; align-items: flex-end;">
                <button class='btn btn-dark' name='submit' value='submit'>Submit</button>
            </div>
        </form>
    </div>

</div>