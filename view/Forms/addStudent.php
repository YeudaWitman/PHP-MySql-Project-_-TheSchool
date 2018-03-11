<div class="alert alert-light" id="formContainer">
                    <form action="index.php" id="studentForm" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="w-100">Student Name:<span class="text-danger" title="Required">*  <i id="loaderIcon" class="fas fa-spinner fa-spin" style="display:none"></i></span>
                            <input type="text" id="inputStudentName" class="form-control" placeholder="Student Name" name="studentName"></label><br>
                            <label class="w-100">Phone Number:
                            <input type="tel" id="inputPhone" class="form-control" placeholder="Phone" name="phone"></label><br>
                            <label class="w-100">E-Mail:
                            <input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email"></label></div>
                        <div class="form-group">
                            <label>Upload image (Up to 500X500 px):<input type="file" id="image" class="form-control-file" name="image"></label>
                            <div id="image-holder"> </div>
                        </div>
                        <div>Select courese from list:</div>
                        <div class="form-check form-check-inline">
                        <?php $this->CourseList(); ?>
                        </div><br>
                        <strong id="errorHelp" class="">Plase fill values in the fields</strong><br>
                        <div class="form-group btn-group">
                        <button type="submit" id="addButton" class="btn btn-primary" name="addStudent">Add Student</button>  
                        <a href="index.php" class="btn btn-success">Back</a>
                        </div>
                    </form>
                </div>