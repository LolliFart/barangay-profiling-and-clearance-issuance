<div class="sub-content">

    <div class="col-lg-8 m-auto bg-white p-4" style="margin-top: 20px; border: solid;">
        <h3 style="margin-top: 10px;">Business Certificate Form</h3>
        <hr>
        <p>Please fill-up the form.</p>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="text" name="clearance_id"
                value="<?= isset($_SESSION['clearance_id']) ? sanitize($_SESSION['clearance_id']) : ''; ?>" hidden>
            <input type="text" name="resident_id" hidden
                value="<?= isset($_SESSION['resident_id']) ? sanitize($_SESSION['resident_id']) : ''; ?>" hidden>

            <input type="text" name="clearance_path_name"
                value="<?= isset($_POST['clearance_path_name']) ? sanitize($_POST['clearance_path_name']) : ''; ?>"
                hidden>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="firstname"><b>First Name:</b></label>
                        <input type="text" name="firstname" class="form-control"
                            value="<?= isset($_POST['firstname']) ? ucfirst(sanitize($_POST['firstname'])) : ''; ?>"
                            required>
                        <small class='text-danger'><?= $errors['firstname'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="middlename"><b>Middle Name:</b></label>
                        <input type="text" name="middlename" class="form-control"
                            value="<?= isset($_POST['middlename']) ? ucfirst(sanitize($_POST['middlename'])) : ''; ?>">
                        <small class='text-danger'><?= $errors['middlename'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="lastname"><b>Last Name:</b></label>
                        <input type="text" name="lastname" class="form-control"
                            value="<?= isset($_POST['lastname']) ? ucfirst(sanitize($_POST['lastname'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['lastname'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
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

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address"><b>Address:</b></label>
                        <input type="text" name="address" class="form-control"
                            value="<?= isset($_POST['address']) ? ucwords(sanitize($_POST['address'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['address'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kindofbiz"><b>Kind of Business:</b></label>
                        <input type="text" name="kindofbiz" class="form-control"
                            value="<?= isset($_POST['kindofbiz']) ? ucwords(sanitize($_POST['kindofbiz'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['kindofbiz'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tradename"><b>Trade Name:</b></label>
                        <input type="text" name="tradename" class="form-control"
                            value="<?= isset($_POST['tradename']) ? ucwords(sanitize($_POST['tradename'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['tradename'] ?? '' ?></small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="located"><b>Located at:</b></label>
                <input type="text" name="located" class="form-control"
                    value="<?= isset($_POST['located']) ? ucwords(sanitize($_POST['located'])) : '' ?>" required>
                <small class='text-danger'><?= $errors['located'] ?? '' ?></small>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="or_number"><b>OR Number:</b></label>
                        <input type="text" name="or_number" class="form-control"
                            value="<?= isset($_POST['or_number']) ? ucwords(sanitize($_POST['or_number'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['or_number'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="amount_paid"><b>Amount Paid:</b></label>
                        <input type="text" name="amount_paid" class="form-control"
                            value="<?= isset($_POST['amount_paid']) ? ucwords(sanitize($_POST['amount_paid'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['amount_paid'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="garbage_fee"><b>Garbage Fee:</b></label>
                        <input type="text" name="garbage_fee" class="form-control"
                            value="<?= isset($_POST['garbage_fee']) ? ucwords(sanitize($_POST['garbage_fee'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['garbage_fee'] ?? '' ?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="year_validity"><b>Year Validity:</b></label>
                        <input type="text" name="year_validity" class="form-control" maxlength="4" minlength="4"
                            value="<?= isset($_POST['year_validity']) ? ucwords(sanitize($_POST['year_validity'])) : '' ?>"
                            required>
                        <small class='text-danger'><?= $errors['year_validity'] ?? '' ?></small>
                    </div>
                </div>
            </div>
            <input type="text" name="purpose" value="renew/apply" hidden>
            <div class="form-group" style="display:flex; flex-direction: column; align-items: flex-end;">
                <button class='btn btn-dark' name='submit' value='submit'>Submit</button>
            </div>


        </form>
    </div>

</div>