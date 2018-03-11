<?php
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';
include_once './view/SideContainer.php';
include_once './debuger.php';

class SideContainer {
    private $courseLogic;
    private $studentLogic;
    private $_sideContainerView;

    function __construct() {
        //courses list
        $this->courseList();
        //students list 
        $this->studentList();

    }

    function courseList() {
        $this->courseLogic = new CoursesBL();
        $courseListData = $this->courseLogic->getCourses();
        $this->_sideContainerView = new SideContainerView();
        $courseListView = $this->_sideContainerView->showCourseList($courseListData);
    }

    function studentList() {
        $this->studentLogic = new StudentsBL();
        $studentListData  = $this->studentLogic->getStudents();
        $this->_sideContainerView = new SideContainerView();
        $studentListView = $this->_sideContainerView->showStudentList($studentListData);
    }
}

?>