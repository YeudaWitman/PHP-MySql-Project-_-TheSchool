<div class="alert alert-light" id="formContainer">
                    <h4 class="alert-heading">Edit details of <?php echo $studentRow->getname(); ?></h4>
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="studentID" value="<?php echo $studentRow->getID(); ?>">
                        <div class="form-group">
                            <label class="w-100">Student Name:
                            <input type="text" id="inputStudentName" class="form-control " placeholder="Student Name" name="studentName" value="<?php echo $studentRow->getname(); ?>"></label>
                            <label class="w-100">Phone Number:
                            <input type="tel" id="inputPhone" class="form-control" placeholder="Phone" name="phone" value="<?php echo $studentRow->getPhone(); ?>"></label>
                            <label class="w-100">E-Mail:
                            <input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" value="<?php echo $studentRow->getEmail(); ?>"></label></div>
                        <div class="form-group">
                            <label>Upload image<input type="file" id="inputImage" class="form-control-file" name="image"></label>
                        </div>
                        <div>Select courese from list:</div>
                        <div class="form-check form-check-inline">
                        <?php
                        $this->CourseListEdit($studentId); ?>
                        </div><br>
                        <strong id="errorHelp" class="">Plase fill values in the fields</strong><br>
                        <div class="form-group btn-group">
                        <button type="submit" id="addButton" class="btn btn-primary" name="updateStudent">Update</button>   
                        <a href="index.php" class="btn btn-success">Back</a>
                        </div>
                    </form>
                </div>