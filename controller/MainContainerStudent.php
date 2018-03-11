<?php
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';
include_once './model/course-studentsBL.php';
include_once './view/MainContainer - Student.php';
include_once './debuger.php';

class MainContainerStudent {
    private $_studentLogic;
    private $containerUtil;

    function showStudent($studentId) {
        $this->_studentLogic = new StudentsBL();
        $studentDetail = $this->_studentLogic->getStudentDetails($studentId);
        $participation = new CourseStudentsBL();
        $partList = $participation->getCourseByStudent($studentId);
        $this->containerUtil = new MainContainerView_S();
        $this->containerUtil->showStudent($studentId, $studentDetail, $partList);
    }

    function editStudent($studentId) {
        $this->_studentLogic = new StudentsBL();
        $studentDetail = $this->_studentLogic->getStudentDetails($studentId);
        $this->containerUtil = new MainContainerView_S();
        $this->containerUtil->editStudent($studentDetail);
    }

}

?>