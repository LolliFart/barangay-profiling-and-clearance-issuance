<div class="sub-content">
    <div class="mb-3">
        <?php $msg =  isset($_GET['resident_id']) || isset($_POST['update'])? "Updating resident was cancelled":"Adding resident was cancelled"?>
        <a href="resident_records.php?error_message=<?= $msg?>" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Go back</a>
    </div>
    <div class=" col-lg-8 m-auto bg-white col-lg-8 m-auto" style="padding: 25px; border: solid;">
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div style="text-align:center; padding:10px;">
                <h2>Resident Information</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <input type="text" name="resident_id"
                        value="<?= isset($_POST['resident_id'])? sanitize($_POST['resident_id']) : '';?>" hidden>
                    <div class="form-group">
                        <label for="firstname"><b>First Name <span class="text-danger">*</span></b></label>
                        <input type="text" name="firstname" id="firstname" class="form-control"
                            value="<?= isset($_POST['firstname'])? sanitize($_POST['firstname']) : '';?>" required>

                        <small class='text-danger'><?= $errors['firstname'] ?? ''?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="middlename"><b>Middle Name</b></label>
                        <input type="text" name="middlename" id="middlename" class="form-control"
                            value="<?= isset($_POST['middlename'])? sanitize($_POST['middlename']):'';?>">
                        <small class='text-danger'><?= $errors['middlename'] ?? ''?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="lastname"><b>Last Name <span class="text-danger">*</span></b></label>
                        <input type="text" name="lastname" id="lastname" class="form-control"
                            value="<?= isset($_POST['lastname'])? sanitize($_POST['lastname']): ''?>" required>
                        <small class='text-danger'><?= $errors['lastname'] ?? ''?></small>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="address"><b>Address <span class="text-danger">*</span></b></label>
                <input type="text" name="address" id="address" class="form-control"
                    value="<?= isset($_POST['address'])? sanitize($_POST['address']): ''?>" required>
                <small class='text-danger'><?= $errors['address'] ?? ''?></small>
            </div>




            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="dob"><b>Date of Birth <span class="text-danger">*</span></b></label>
                        <input type="date" name="dob" id="dob" class="form-control"
                            value="<?= isset($_POST['dob'])? sanitize($_POST['dob']): '' ?>" required>
                        <small class='text-danger'><?= $errors['dob'] ?? ''?></small>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="pob"><b>Place of Birth <span class="text-danger">*</span></b></label>
                        <input type="text" name="pob" id="pob" class="form-control"
                            value="<?= isset($_POST['pob'])? sanitize($_POST['pob']): ''?>" required>
                        <small class='text-danger'><?= $errors['pob'] ?? ''?></small>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <b><span>Gender <span class="text-danger">*</span></span></b> <br>
                        <input type="radio" name="gender" id="male" value="male" required
                            <?= isset($_POST['gender']) && $_POST['gender']=='male'? 'checked' : '' ?>>
                        <label for="male" class="form-check-label">Male</label>
                        <input type="radio" name="gender" id="female" value="female"
                            <?= isset($_POST['gender']) && $_POST['gender']=='female'? 'checked' : '' ?>>
                        <label for="female" class="form-check-label">Female</label>
                        <small class='text-danger'><?= $errors['gender'] ?? ''?></small>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="year"><b>Civil Status <span class="text-danger">*</span></b></label>
                        <select class="form-control" name="civil_status" id="civil_status" required>
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
                        <small class='text-danger'><?= $errors['civil_status'] ?? ''?></small>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="contact"><b>Contact Number <span class="text-danger">*</span></b></label>
                        <input type="text" name="contact_number" id="contact" class="form-control"
                            value="<?= isset($_POST['contact_number'])? sanitize($_POST['contact_number']): ''?>"
                            required>
                        <small class='text-danger'><?= $errors['contact_number'] ?? ''?></small>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sy"><b>Religion <span class="text-danger">*</span></b></label>
                        <input type="text" name="religion" id="religion" class="form-control"
                            value="<?= isset($_POST['religion'])? sanitize($_POST['religion']): ''?>" required>
                        <small class='text-danger'><?= $errors['religion'] ?? ''?></small>
                    </div>

                </div>
            </div>

            <div class="form-group" style="display:flex; flex-direction: column; align-items: flex-end;">
                <?php
                        if(isset($_GET['resident_id']) || isset($_POST['update'])){
                            echo "<button class='btn btn-primary' name='update' value='update'>Update</button>";
                        } else{
                            echo "<button class='btn btn-primary' name='add' value='add'>Register</button>";
                        }  
                        ?>
            </div>
        </form>
    </div>
</div>