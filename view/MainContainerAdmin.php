<?php
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';
include_once './debuger.php';

class MainContainerAdminView {

    public function renderHeader($headingString) {
        echo '<div class="col-xl-9 "><h4 class="text-dark">'.$headingString.'</h4>';
    }
    public function renderFooter() {
        echo '</div>';
    }
    public function emptyContainer($studentCount, $courseCount, $adminCount) {
        echo '<h5>click on admin from the list to show or edit the details.</h5>';
        echo '<h4 class="alert alert-light">we have <span class="badge badge-info">'.$adminCount.'</span> admins and sales men.</h4>';
        echo '<h4 class="alert alert-light">we have <span class="badge badge-info">'.$courseCount.'</span> courses 
        and <span class="badge badge-info">'.$studentCount.'</span> students in our school.</h4>';
    }
    
    public function BackButton () {
        echo '<a href="administration.php" class="btn btn-success">Back</a>';
    }

    public function editButton ($paramName, $paramId) {
        echo '<a href="administration.php?edit'.$paramName.'='.$paramId.'" class="btn btn-warning">Edit</a>  ';
    }

    public function deleteButton ($paramName, $paramId) {
        echo '<a href="administration.php?delete'.$paramName.'Q='.$paramId.'" class="btn btn-danger">Delete</a>  ';
    }

    function showDeleteConfirmAdmin($adminId) {
        $headingString = "Delete Admin";
        $this->renderHeader($headingString);
        echo '<div class="alert alert-danger"><h4>Are you sure you want to delete this admin?</h4>';
        echo '<h5>(You can\'t undo this action!)</h5><div class="btn-group">';
        echo '<a href="administration.php?deleteAdmin='.$adminId.'" class="btn btn-danger">Delete</a>   ';
        echo '<a href="administration.php" class="btn btn-success">Back</a></div></div>';
        $this->renderFooter();
    }

    function showAdmin($adminId, $adminDetails) {
        $headingString = "Admin Details";
        $name = "Admin";
        $this->renderHeader($headingString);
        //checks if the user have premission to edit
        echo '<div class="btn-group">';
        if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'owner') {
            $this->editButton($name, $adminId);
            $this->deleteButton($name, $adminId);//delete button
        } 
        $this->BackButton();//back button
        echo '</div><div class=" mt-3">';
        foreach($adminDetails as $row){
            echo '<img class="border border-info mr-3" src="'.$row->getImage().'" alt="user image" width="80" height="80"><br>';
            echo '<b>Name: </b>'.$row->getname(). '<br>';
            echo '<b>Phone: </b>'. $row->getPhone(). '<br>';
            echo '<b>E-Mail: </b><a href="mailto:'.$row->getEmail().'" target="_top">'.$row->getEmail().'</a><br>';
            echo '<b>Role: </b>'.$row->getRole();
        }
        echo '</div>';
        $this->renderFooter();
    }

    function adminForm() {
        $headingString = "Add Admin";
        $this->renderHeader($headingString);
        include_once './view/AdminForm.php';
        $viewForm = new AdminForm();
        $viewForm->addForm();
        $this->renderFooter(); 
    }

    function editAdmin($adminDetails) {
        $headingString = "Edit Admin";
        $this->renderHeader($headingString);
        include_once './view/AdminForm.php';
        $viewForm = new AdminForm();
        $viewForm->editForm($adminDetails);
        $this->renderFooter(); 
    }

    function showCoursesList($courseList) {
        echo '<div class="contDivBorder">';
        echo '<h5>Courses in The School</h5>';
        foreach($courseList as $row){
            echo '<a href="index.php?showCourse='.$row->getID().'" class="text-info"><div>';
            echo '<img src="'.$row->getImage().'" width="40" height="40" class="mr-3  float-left">';
            echo '<b>'. $row->getname() . '</b>  ('.$row->getCapacity().' Seats)</a></div><br>';
        }
        echo '</div>';
    }

    function showErrors($massage) {
        $headingString = "Error!";
        $this->renderHeader($headingString);
        echo '<div class="alert alert-danger"><h4>'.$massage.'</h4></div>';
        echo '<a href="administration.php" class="btn btn-success">OK</a>';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        $this->renderFooter();
    }
}