<div class="alert alert-light" id="formContainer">
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="w-100">Course Name:<span class="text-danger" title="Required">* </span>
                            <input type="text" id="inputCourseName" class="form-control" placeholder="Course Name" name="courseName"></label><br>
                            <label class="w-100">Course Description:
                            <input type="textarea" class="form-control" placeholder="Description" name="courseDescription"></label><br>
                            <label>Capacity:
                            <input type="text" id="capacityInput" class="form-control" placeholder="(Default: 20)" name="capacity" value=20></label></div>
                        <div class="form-group">
                            <label>Upload image<input type="file" class="form-control-file" name="image"></label>
                        </div><br>
                        <strong id="errorHelp" class="">Plase fill values in the fields</strong><br>
                        <div class="form-group btn-group">
                        <button type="submit" id="addButton" class="btn btn-primary" name="addCourse">Add Course</button>  
                        <a href="index.php" class="btn btn-success">Back</a>
                        </div>
                    </form>
                </div>