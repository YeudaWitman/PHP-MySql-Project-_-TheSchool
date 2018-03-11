<?php
include_once 'debuger.php';
include_once 'MainContainer.php';
include_once 'MainContainerCourse.php';
include_once 'MainContainerStudent.php';
include_once 'SideContainer.php';
include_once 'StudentController.php';
include_once 'CourseController.php';
include_once './model/CoursesBL.php';
include_once './model/StudentsBL.php';

class MainRouter {
        protected $urlKey;
        protected $urlValue;
        private $_mainContainer;
        private $_mainContainerStudent;
        private $_mainContainerCourse;
        private $_sideContainer;
        private $_studentController;
        private $_courseController;

        function __construct() { 
            $this->_studentController = new StudentController();
            $this->_courseController = new CourseController();
            //side container
            $this->_sideContainer = new SideContainer();
            $this->getHTTPvalue();
            $this->route();        
        }

        function getHTTPvalue() {
            if (isset($_GET) && !empty($_GET)) {
                $this->urlKey = array_keys($_GET);
                $this->urlValue = array_Values($_GET);
            }
        }

        function route () {
            switch ($this->urlKey['0']) {
                case "showCourse":
                    $courseById = $this->urlValue['0'];
                    $this->_mainContainerCourse = new MainContainerCourse();
                    $this->_mainContainerCourse->showCourse($courseById);
                    break;
                case "editCourse":
                    $courseById = $this->urlValue['0'];
                    $this->_mainContainerCourse = new MainContainerCourse();
                    $this->_mainContainerCourse->editCourse($courseById);
                    break;
                case "addCourse":
                    include_once './view/MainContainer - Course.php';
                    $this->_mainContainerCourse = new MainContainerView_C();
                    $this->_mainContainerCourse->courseForm();
                    break;
                case "deleteCourseQ":
                    $courseId = $this->urlValue['0'];
                    include_once './view/MainContainer - Course.php';
                    $this->_mainContainerCourse = new MainContainerView_C();
                    $this->_mainContainerCourse->showDeleteConfirmCourse($courseId);
                    break;
                case "showStudent":
                    $studentById = $this->urlValue['0'];
                    $this->_mainContainerStudent = new MainContainerStudent();
                    $this->_mainContainerStudent->showStudent($studentById);
                    break;
                case "editStudent":
                    $studentById = $this->urlValue['0'];
                    $this->_mainContainerStudent = new MainContainerStudent();
                    $this->_mainContainerStudent->editStudent($studentById);
                    break;
                case "addStudent":
                    include_once './view/MainContainer - Student.php';
                    $this->_mainContainerStudent = new MainContainerView_S();
                    $this->_mainContainerStudent->studentForm();
                    break;
                case "deleteStudentQ":
                    $studentId = $this->urlValue['0'];
                    include_once './view/MainContainer - Student.php';
                    $this->_mainContainerStudent = new MainContainerView_S();
                    $this->_mainContainerStudent->showDeleteConfirmStudent($studentId);
                    break;
                case "Msg":
                    $msg = $this->urlValue['0'];
                    $Id = $this->urlValue['1'];
                    include_once 'errors.php';
                    $this->_mainContainer = new errorsContainer();
                    $this->_mainContainer->errorMassage($msg, $Id);
                    break;
                default:
                    $this->_mainContainer = new MainContainer();
                    $this->_mainContainer->renderContainer();
                    break;
            }
        } 
    }