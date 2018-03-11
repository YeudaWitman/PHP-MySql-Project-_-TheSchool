<?php

include_once './model/CoursesBL.php';
include_once './model/course-studentsBL.php';
include_once './model/course-students.php';
include_once './debuger.php';

    class CourseForm {

        function addForm() {
            include_once 'Forms/addCourse.php'; 
        }

        function editForm($courseDetail) {
            $courseRow = $courseDetail['0'];
            $courseId = $courseRow->getID();
            echo '<div class="alert alert-light" id="formContainer">
                    <h4 class="alert-heading">Edit details of course'.$courseRow->getname(). '</h4>
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="courseID" value="'.$courseRow->getID().'">
                        <div class="form-group">
                            <label class="w-100">Course Name
                            <input type="text" id="inputName" class="form-control" placeholder="Course Name" name="courseName" value="'.$courseRow->getname().'"></label><br>
                            <label class="w-100">Course Description
                            <input type="textarea" class="form-control" placeholder="Description" name="courseDescription" value="'.$courseRow->getDescription().'"></label><br>
                            <label>Capacity:
                            <input type="text" id="capacityInput" class="form-control" placeholder="(Default: 20)" name="capacity" value='.$courseRow->getCapacity().'></label></div>
                        <div class="form-group">
                            <label>Upload image<input type="file" class="form-control-file" name="image" value='.$courseRow->getImage().'></label>
                        </div><br>
                        <strong id="errorHelp" class="form-text text-danger"></strong><br>
                        <div class="form-group btn-group">
                        <button type="submit" id="addButton" class="btn btn-primary" name="updateCourse">Update</button>   
                        <a href="index.php" class="btn btn-success">Back</a>
                        </div>
                    </form>
                </div>';
        }
    
}
?>