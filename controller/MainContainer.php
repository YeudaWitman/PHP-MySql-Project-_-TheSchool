<?php
include_once './debuger.php';

class MainContainer {
    private $courseLogic;
    private $studentLogic;
    private $containerUtil;

    function renderContainer() {
        $this->courseLogic = new CoursesBL();
        $this->courseList = $this->courseLogic->getCourses();
        $this->studentLogic = new StudentsBL();
        $this->studentList  = $this->studentLogic->getStudents();
        $this->containerUtil = new MainContainerView();
        $headingString = 'Welcome '.$_SESSION['username'];
        $this->containerUtil->renderHeader($headingString);
        //show sum of courses and students
        $this->containerUtil->emptyContainer(count($this->studentList), count($this->courseList));
        $this->containerUtil->renderFooter();
    }
}

?>