<?php
include_once './model/StudentsBL.php';
include_once './model/CoursesBL.php';
include_once './model/course-studentsBL.php';
include_once './model/course-students.php';
include_once './debuger.php';


    class StudentForm {
        private $studentId = '0';

        private function CourseList() {
            $courseLogic = new CoursesBL();
            $courseList = $courseLogic->getCourses();
            foreach($courseList as $courseRow){
                echo '<h5><label class="form-check-label">'.$courseRow->getname().'
                <input type="checkbox" class="form-check-input" name="course[]" value="'.$courseRow->getID().'"></label></h5>';
            }  
        }

        private function CourseListEdit($studentId) {
            //Array courses IDs
            $courseIdsArray = array();
            //Array courses List by student
            $courseListArray = array();
            $participation = new CourseStudentsBL();
            $partList = $participation->getCourseByStudent($studentId);
            $courseLogic = new CoursesBL();
            $courseList = $courseLogic->getCourses();
            //push the ids to array        
            foreach($partList as $Row){
                $courseID = $Row->getCourseId();
                array_push($courseListArray, $courseID);
            }
            //create list of courses
            foreach($courseList as $courseRow) {
                //debug('',$courseRow->getID());
                if (in_array($courseRow->getID(), $courseListArray)) {
                    echo '<label class="form-check-label">'.$courseRow->getname().'
                    <input type="checkbox" class="form-check-input" name="course[]" value="'.$courseRow->getID().'" checked></label>';
                } else {
                    echo '<label class="form-check-label">'.$courseRow->getname().'
                    <input type="checkbox" class="form-check-input" name="course[]" value="'.$courseRow->getID().'"></label>';
                }
            }
        }

        function addForm() {
            include_once 'Forms/addStudent.php';
        }

        function editForm($studentDetail) {
            $studentRow = $studentDetail['0'];
            $studentId = $studentRow->getID();
            include_once 'Forms/editStudent.php';
        }
    
}
?>