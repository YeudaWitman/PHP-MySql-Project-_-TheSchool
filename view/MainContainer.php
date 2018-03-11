<?php
include_once './debuger.php';

class MainContainerView {

    public function renderHeader($headingString) {
        echo '<div class="col-xl-8"><h4 class="text-dark">'.$headingString.'</h4>';
    }
    public function renderFooter() {
        echo '</div>';
    }
    
    public function ButtonGroup($paramName, $paramId) {
        echo '<div class="btn-group">';
        echo '<a href="index.php?edit'.$paramName.'='.$paramId.'" class="btn btn-warning">Edit</a>';
        echo '<a href="index.php?delete'.$paramName.'Q='.$paramId.'" class="btn btn-danger">Delete</a>';
        echo '<a href="index.php" class="btn btn-success">Back</a>';
        echo '</div>';
    }

    public function BackButton () {
        echo '<a href="index.php" class="btn btn-success">Back</a>';
    }

    public function editButton ($paramName, $paramId) {
        echo '<a href="index.php?edit'.$paramName.'='.$paramId.'" class="btn btn-warning">Edit</a>  ';
    }

    public function deleteButton ($paramName, $paramId) {
        echo '<a href="index.php?delete'.$paramName.'Q='.$paramId.'" class="btn btn-danger">Delete</a>  ';
    }

    public function emptyContainer($studentCount, $courseCount2) {
        echo '<h4 class="alert alert-light">we have <span class="badge badge-info">'.$courseCount2.'</span> courses 
        and <span class="badge badge-info">'.$studentCount.'</span> students in our school.</h4>';
        echo '<h5>click on student or course from the list to show or edit the details.</h5>';
    }

    function showErrors($massage, $Id) {
        $headingString = "Error!";
        $this->renderHeader($headingString);
        echo '<div class="alert alert-danger"><h4>'.$massage.'</h4></div>';
        echo '<a href="index.php" class="btn btn-success">OK</a>';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        $this->renderFooter();
    }
}