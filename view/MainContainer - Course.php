<?php
include_once './debuger.php';

class MainContainerView_C extends MainContainerView {

    function showCourse($courseId, $courseDesc, $courseStudentList) {
        $numberOfStudents = count($courseStudentList);
        $headingString = "Course Details";
        $name = "Course";
        $this->renderHeader($headingString);
        echo '<div class="btn-group">';
        //checks if the user have premission to edit
        if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'owner') {
            $this->editButton($name, $courseId);;
        }
        //if there any student register to course is unable to delete the course.
        if ($numberOfStudents == 0) {
            $this->deleteButton($name, $courseId);//delete button
        }
        $this->BackButton();//back button
        echo '</div>';
        foreach($courseDesc as $row){
            $courseCapacity = $row->getCapacity();
            echo '<p><h5><b>'.$row->getname(). ' course detail: </b></h5>';
            echo $row->getDescription().'</p>';
        }
        $this->courseProgressBar($numberOfStudents, $courseCapacity);
        $this->courseParticipate($numberOfStudents, $courseCapacity);
        //get the names of students
        foreach($courseStudentList as $student) {
            $this->studentLogic = new StudentsBL();
            $StudentListDetail = $this->studentLogic->getStudentDetails($student->getStudentId());
            foreach($StudentListDetail as $studentDetail) {
                echo '<div><i class="fas fa-graduation-cap"></i><b>  '.$studentDetail->getname().'</b></div>';
            }
        }
        $this->renderFooter();
    }

    public function courseProgressBar($numberOfStudents, $courseCapacity) {
        $percent = $numberOfStudents/$courseCapacity * 100;
        echo '<div class="progress" style="height: 20px"><div class="progress-bar ';
        if ($percent < 20) {
            echo 'bg-success"';
        } elseif ($percent > 80) {
            echo 'bg-danger"';
        } else {
            echo 'bg-info"';
        }
        echo ' role="progressbar" style="width: '.$percent.'%" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="'.$courseCapacity.'">
        <b>'.$percent.'%</b></div></div>';
    }

    public function courseParticipate($studentsNumber, $courseCapacity) {
        if ($studentsNumber == 0) {
            echo '<h4>There are no participants in this course yet</h4>';
        } else {
            echo '<h4>There are <span class="badge badge-secondary">'.$studentsNumber.'</span>
            students enrolled out of <span class="badge badge-secondary">'.$courseCapacity.'</span> seats.</h4>';
        }
    }

    function showDeleteConfirmCourse($courseId) {
        $headingString = "Delete Course";
        $this->renderHeader($headingString);
        echo '<div class="alert alert-danger"><h4>Are you sure you want to delete this course?</h4>';
        echo '<h5>(You can\'t undo this action!)</h5><div class="btn-group">';
        echo '<a href="index.php?deleteCourse='.$courseId.'" class="btn btn-danger">Delete</a>   ';
        echo '<a href="index.php" class="btn btn-success">Back</a></div></div>';
        $this->renderFooter();
    }

    function editCourse($courseDetail) {
        $headingString = "Edit Course";
        $this->renderHeader($headingString);
        include_once './view/CourseForm.php';
        $viewForm = new CourseForm();
        $viewForm->editForm($courseDetail);
        $this->renderFooter(); 
    }

    function courseForm() {
        $headingString = "Add course to school";
        $this->renderHeader($headingString);
        include_once './view/CourseForm.php';
        $viewForm = new CourseForm();
        $viewForm->addForm();
        $this->renderFooter(); 
    }
}