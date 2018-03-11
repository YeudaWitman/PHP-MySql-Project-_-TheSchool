<?php

class SideContainerView {
    private $containerHeader = '<div class="col-xl-2 list-group">';
    private $containerFooter = '</div>';

    function showCourseList($courseList) {
        echo $this->containerHeader;
        $value = "Course";
        echo '<h4 class="text-info">Courses: ';
        if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'owner') {
            echo '<a href="index.php?addCourse"><i class="float-right mr-2 mt-1 fa fa-plus-circle text-info"></i></a>';
        }
        echo '</h4>';
        foreach(array_reverse($courseList) as $row){
            echo '<a href="index.php?showCourse='.$row->getID().'" class="p-1 mb-1 bg-light text-dark">
            <img src="'.$row->getImage().'" width="40" height="40" class="mr-2  float-left">';
            echo '<div class="media-body"><b>'. $row->getname() . '</b></div></a>';
        }
        echo $this->containerFooter;
    }

    function showStudentList($studentList) {
        echo $this->containerHeader;
        $value = "Student";
        echo '<h4 class="text-info">Students: <a href="index.php?addStudent"><i class="float-right mr-2 mt-1 fa fa-plus-circle text-info"></i></a></h4>';
        foreach($studentList as $student){
            echo '<a href="index.php?showStudent='.$student->getID().'" class="p-1 mb-1 bg-light text-dark">';
            echo '<img src="'.$student->getImage().'" width="40" height="40" class="mr-1 mt-1 float-left">';
            //check if the user update profile image in student model
        echo '<div class="media-body"><b>'.$student->getname() .'</b> '. $student->getPhone() . '</div></a>';
    }
        echo $this->containerFooter; 
    }
}