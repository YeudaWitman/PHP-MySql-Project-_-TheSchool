<?php
foreach($courseDetail as $courseRow){
            }
            $courseId = $courseRow->getID(); ?>
<div class="alert alert-light" id="formContainer">
        <h4 class="alert-heading">Edit details of course<?php $courseRow->getname()?></h4>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="courseID" value="'.$courseRow->getID().'">
            <div class="form-group">
                <label class="w-100">Course Name
                <input type="text" id="inputCourseName" class="form-control" placeholder="Course Name" name="courseName" value="<?php $courseRow->getname()?>"></label><br>
                <label class="w-100">Course Description
                <input type="textarea" class="form-control" placeholder="Description" name="courseDescription" value="<?php $courseRow->getDescription()?>"></label><br>
                <label>Capacity:
                <input type="text" id="capacityInput" class="form-control" placeholder="(Default: 20)" name="capacity" value="<?php $courseRow->getCapacity()?>"></label></div>
            <div class="form-group">
                <label>Upload image<input type="file" class="form-control-file" name="image" value="<?php $courseRow->getImage()?>"></label>
            </div><br>
            <strong id="errorHelp" class="">Plase fill values in the fields</strong><br>
            <div class="form-group btn-group">
            <button type="submit" id="addButton" class="btn btn-primary" name="updateCourse">Update</button>   
            <a href="index.php" class="btn btn-success">Back</a>
            </div>
        </form>
    </div>