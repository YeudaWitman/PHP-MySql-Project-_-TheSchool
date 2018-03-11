<?php
include_once './model/StudentsBL.php';
include_once './model/course-studentsBL.php';
include_once './debuger.php';
class StudentController {
    private $courseLogic;

    public function __construct() {
        //add student by form
        if (isset($_POST['addStudent'])) {
            if (isset($_POST['studentName']) && !empty($_POST['studentName'])) {
                if ($this->phoneValidation($_POST['phone'])) {
                    if (isset($_FILES)) {
                        include_once 'uploadImage.php';
                    }
                    if (isset($_POST['course'])) {
                        if($this->validateCapacity($_POST['course']) == true) {
                        } else {
                            echo 'stop = course full!';
                        }
                    }
                    $businessLogic = new StudentsBL();
                    $businessLogic->insertStudent($_POST);
                    header("Refresh: 0");
                } 
                else {
                    echo 'phone number not valid';
                }
            }
            else {
                echo 'Empty Fields';
                //header("Location: index?error=emptyFields.php");
            }
        }
        //delete student by button and id
        if (isset($_GET['deleteStudent']) && !empty($_GET['deleteStudent']) ) {
            $studentId = $_GET['deleteStudent'];
            $businessLogic = new StudentsBL();
            $businessLogic->deleteStudent($studentId);
            header("Location: index.php");
            exit();
        }
        //update student by form
        if (isset($_POST['updateStudent'])) {
            $studentId = $_POST['studentID'];
            if (isset($_POST['studentName']) && !empty($_POST['studentName'])) {
                if (isset($_POST['image'])) {
                    include_once 'uploadImage.php';
                }
                if (isset($_POST['course'])) {
                    if ($this->validateCapacity($_POST['course'])) {
                            $businessLogic = new StudentsBL();
                            $businessLogic->updateStudent($_POST, $studentId);
                            header('Location: index.php?showStudent='.$studentId.'');
                            exit();
                    }
                }
            }
            else {
                echo "error: empty";
            }
        }
    }
    
    function getParticipation() {
        $participation = new CourseStudentsBL();
            //return courses list
        $partList = $participation->getCourseByStudent($studentById);
            foreach($partList as $Row){
                echo ' course: '.$Row->getCourseId();
                echo ", ";
                echo ' student: '.$Row->getStudentId();
                echo " || ";
        }
    }

    private function validateCapacity($courseArray) {
        $this->courseLogic = new CoursesBL();
        foreach ($courseArray as $courseId) {
            $seats = $this->courseLogic->getCourseStudents($courseId);
            $courseDesc = $this->courseLogic->getCourseDetails($courseId);
            $capacity = $courseDesc['0']->getCapacity();
            if (count($seats) >= $capacity) {
                    header("Location: index.php?Msg=fullCourse&id=$courseId");
                    return false;
            } else {
                return true;
            }
        }
    }

    private function phoneValidation($phoneNum) {
        if (is_numeric($phoneNum)) {
            return true;
        } else {
            return false;
        }
    }

}

?>