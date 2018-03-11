<?php
include_once './model/CoursesBL.php';
include_once './model/course-studentsBL.php';
include_once './model/course-studentsBL.php';
include_once './debuger.php';
class CourseController {

    public function __construct() {
        //add course by form
        if (isset($_POST['addCourse'])) {
            
            if (isset($_POST['courseName']) && !empty($_POST['courseName'])) {
                if ($_POST['capacity'] < 0) {
                    header("Location: index.php?Msg=capacity&id=");
                    exit();
                } else {
                    if (isset($_POST['image']) && !empty($_POST['image'])) {
                        include_once 'uploadImage.php';
                    }
                    $businessLogic = new CoursesBL();
                    $businessLogic->insertCourse($_POST);
                    header("Refresh: 0");
                }
            }
            else {
                header("Location: index.php?Msg=emptyFields&id=");
            }
        }
        //delete course by button and id
        if (isset($_GET['deleteCourse']) && !empty($_GET['deleteCourse']) ) {
            $courseId = $_GET['deleteCourse'];
            $businessLogic = new CoursesBL();
            $businessLogic->deleteCourse($courseId);
            header("Location: index.php?Msg=deleteCourse&id=");
            exit();
        }
        //update course by form
        if (isset($_POST['updateCourse'])) {
            $courseId = $_POST['courseID'];
            if (isset($_POST['courseName']) && !empty($_POST['courseName'])) {
                if (isset($_POST['image']) && !empty($_POST['image'])) {
                    include_once 'uploadImage.php';
                    $businessLogic = new CoursesBL();
                    $businessLogic->updateCourse($_POST, $courseId);
                    header('Location: index.php?showCourse='.$courseId.'');
                    exit();
                }
            }
            else {
                echo "error: empty";
            }
        }
    }
}

?>