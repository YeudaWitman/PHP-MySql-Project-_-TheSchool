<?php
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';
include_once './model/course-studentsBL.php';
include_once './view/MainContainerAdmin.php';
include_once './debuger.php';

class MainContainerAdmin {
    private $courseLogic;
    private $studentLogic;
    private $containerUtil;
    private $adminLogic;


    function __construct () {
        $this->courseLogic = new CoursesBL();
        $this->courseList = $this->courseLogic->getCourses();
        $this->studentLogic = new StudentsBL();
        $this->studentList  = $this->studentLogic->getStudents();
        $this->containerUtil = new MainContainerAdminView;
        $this->adminLogic = new AdminBL();
        $this->adminList  = $this->adminLogic->getAdmins();
    }

    function renderContainer() {
        $headingString = 'Welcome '.$_SESSION['username'];
        $this->containerUtil->renderHeader($headingString);
        //show sum of courses and students
        $this->containerUtil->emptyContainer(count($this->studentList), count($this->courseList), count($this->adminList));
        $this->containerUtil->showCoursesList($this->courseList);
        $this->containerUtil->renderFooter();
    }

    function showAdmin($adminId) {
        $adminDetails = $this->adminLogic->getAdminDetails($adminId);
        $this->containerUtil->showAdmin($adminId, $adminDetails);
    }

    function editAdmin($adminId) {
        $adminDetails = $this->adminLogic->getAdminDetails($adminId);
        $this->containerUtil->editAdmin($adminDetails);
    }
}

?>