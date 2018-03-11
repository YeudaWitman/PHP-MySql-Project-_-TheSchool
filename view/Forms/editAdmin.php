<div class="alert alert-light" id="formContainer">
    <form action="administration.php" method="POST">
        <input type="hidden" name="adminID" value="<?php echo $adminRow->getID(); ?>">
        <div class="form-group">
            <label class="w-100">Admin Name
            <input type="text" class="form-control" placeholder="Admin Name" name="adminName" value="<?php echo $adminRow->getname(); ?>"></label><br>
            <label class="w-100">Phone Number
            <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $adminRow->getPhone(); ?>"></label><br>
            <label class="w-100">E-Mail
            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $adminRow->getEmail(); ?>"></label>
            <div class="form-row">
                <div class="col">
                    <label class="w-100">Password
                    <input type="password" class="form-control" placeholder="Password" name="password"
                    <?php if ($_SESSION['role'] == 'owner'){
                        echo'></label>';
                    } else {
                        echo' disabled></label>';
                    } ?>
                    </div>
                    <div class="col">
                        <?php $this->selectRole($adminRow->getRole()); ?>
                    </div>
                </div>
            </div>
        <div class="form-group">
            <label>Upload image<input type="file" class="form-control-file" name="image"></label>
        </div>
        <strong id="errorHelp" class="">Plase fill values in the fields</strong><br>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary" name="updateAdmin">Update</button>
            <?php $this->containerUtil = new MainContainerAdminView;
            $this->containerUtil->BackButton();//back button ?>
        </div>
    </form>
</div>