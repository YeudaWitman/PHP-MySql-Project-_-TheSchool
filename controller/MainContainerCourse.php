<?php
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';
include_once './model/course-studentsBL.php';
include_once './view/MainContainer.php';
include_once './view/MainContainer - Course.php';
include_once './debuger.php';

class MainContainerCourse {
    private $courseLogic;
    private $studentLogic;
    private $containerUtil;

    function showCourse($courseId) {
        $this->courseLogic = new CoursesBL();
        $courseDesc = $this->courseLogic->getCourseDetails($courseId);
        $courseStudentList = $this->courseLogic->getCourseStudents($courseId);
        $this->containerUtil = new MainContainerView_C();
        $this->containerUtil->showCourse($courseId, $courseDesc, $courseStudentList);
    }
    
    function editCourse($courseId) {
        $this->courseLogic = new CoursesBL();
        $courseDetail = $this->courseLogic->getCourseDetails($courseId);
        //debug ('cont', $courseDetail);
        $this->containerUtil = new MainContainerView_C();
        $this->containerUtil->editCourse($courseDetail);
    }

}

?>