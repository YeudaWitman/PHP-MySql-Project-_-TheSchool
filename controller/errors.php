<?php
class errorsContainer extends MainContainer {
    private $massage;

    function errorMassage($msg, $Id) {
        switch ($msg) {
            case "capacity":
                $this->massage = 'The capacity cant be a negative number!';
                $Id = 0;
                break;
            case "emptyFields":
                $this->massage = 'Plaese fill all the input field';
                $Id = $Id;
                break;
            case "deleteCourse":
                $this->massage = 'Course deleted!';
                $Id = $Id;
                break;
            case "fullCourse":
                $this->courseLogic = new CoursesBL();
                $this->courseList = $this->courseLogic->getCourseDetails($Id);
                $course = $this->courseList['0']->getName();
                $this->massage = $course. ' course are full!';
                break;
        }
        $this->containerUtil = new MainContainerView();
        $this->containerUtil->showErrors($this->massage, $Id);
    }
}