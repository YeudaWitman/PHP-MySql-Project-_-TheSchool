<div class="alert alert-light" id="formContainer">
    <form action="administration.php" method="POST">
        <div class="form-group">
            <label class="w-100">Admin Name:<span class="text-danger" title="Required">*  <i id="loaderIcon" class="fas fa-spinner fa-spin" style="display:none"></i></span>
            <input type="text" id="inputAdminName" class="form-control" placeholder="Admin Name" name="adminName"></label><br>
            <label class="w-100">Phone Number:
            <input type="text" class="form-control" placeholder="Phone" name="phone"></label><br>
            <label class="w-100">E-Mail:
            <input type="text" class="form-control" placeholder="Email" name="email"></label>
            <div class="form-row">
                <div class="col">
                    <label class="w-100">Password:
                    <input type="password" class="form-control" placeholder="Password" name="password"></label>
                </div>
                <div class="col">
                    <label class="w-100">Role:<span class="text-danger" title="Required">*</span>
                    <select id="roleInput" class="custom-select" name="adminRole">
                        <option selected disabled>Select Role</option>
                        <option value="owner">Owner</option>
                        <option value="manager">Manager</option>
                        <option value="sales">Sales</option>
                    </select></label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Upload image<input type="file" class="form-control-file" name="image"></label>
        </div>
        <strong id="errorHelpMsg" class="">Plase fill values in the fields</strong><br>
        <div class="btn-group">
            <button type="submit" id="addButton" class="btn btn-primary" name="addAdmin">Add Admin</button>
            <?php $this->containerUtil = new MainContainerAdminView;
            $this->containerUtil->BackButton();//back button ?>
        </div>
    </form>
</div>