<?php
include_once './debuger.php';

class MainContainerView_S extends MainContainerView {

    function showStudent($studentId, $studentDetail, $partList) {
        $headingString = "Student Details";
        $name = "Student";
        $this->renderHeader($headingString);
        $this->ButtonGroup($name, $studentId);
        foreach($studentDetail as $row){
            echo '<p class="mt-1"><img src="'.$row->getImage().'" width="70" height="70" class="mr-2 mt-1 float-left">
            <b>'.$row->getname(). '</b>
            <br><b>Email:</b> '.$row->getEmail().'
            <br><b>Phone:</b> '.$row->getPhone().'</p>';
        }
        echo '<b>'.$row->getname().'</b> register to ' .count($partList);
            if (count($partList) == 1) {
                echo  ' course: <br>';
            } else {
                echo ' courses: <br>';
            }
        foreach($partList as $Row){
            $courseId = $Row->getCourseId();
            $courseLogic = new CoursesBL();
            $courseDesc = $courseLogic->getCourseDetails($courseId);
            foreach($courseDesc as $row){
                echo '<div><i class="fas fa-book"></i><b> '.$row->getname(). '</b></div>';
            }
        }
        $this->renderFooter();
    }

    function showDeleteConfirmStudent($studentId) {
        $headingString = "Delete Student";
        $this->renderHeader($headingString);
        echo '<div class="alert alert-danger"><h4>Are you sure you want to delete this student?</h4>';
        echo '<h5>(You can\'t undo this action!)</h5><div class="btn-group">';
        echo '<a href="index.php?deleteStudent='.$studentId.'" class="btn btn-danger">Delete</a>';
        echo '<a href="index.php" class="btn btn-success">Back</a></div></div>';
        $this->renderFooter();
    }

    function studentForm() {
        $headingString = "Add Student";
        $this->renderHeader($headingString);
        include_once 'StudentForm.php';
        $viewForm = new StudentForm();
        $viewForm->addForm();
        $this->renderFooter(); 
    }

    function editStudent($studentDetail) {
        $headingString = "Edit Student";
        $this->renderHeader($headingString);
        include_once './view/StudentForm.php';
        $viewForm = new StudentForm();
        $viewForm->editForm($studentDetail);
        $this->renderFooter(); 
    }
}