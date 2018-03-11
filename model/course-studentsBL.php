<?php
include_once 'DAL.php';
include_once 'course-students.php';
include_once 'debuger.php';

    class CourseStudentsBL {

        function getStudents() {
            $adapter = new DAL();
            $query = "SELECT * FROM `participation`";
            $studentsArray = $adapter->fetch($query);
            $studentsObjectsArray = array();
            if (is_array($studentsArray) || is_object($studentsArray)) {
                foreach($studentsArray as $studentA) {
                array_push($studentsObjectsArray, new CourseStudents($studentA));
                }
            }
            return $studentsObjectsArray;
        }
        
        function getCourseByStudent($studentId) {
            $adapter = new DAL();
            $query = "SELECT * FROM `participation` WHERE student_id = $studentId";
            $studentsArray = $adapter->fetch($query);
            $studentsObjectsArray = array();
            if (is_array($studentsArray) || is_object($studentsArray)) {
                foreach($studentsArray as $student) {
                array_push($studentsObjectsArray, new CourseStudents($student));
                }
            }
            return $studentsObjectsArray;
        }

        function setCourseByStudent($studentId, $courseId) {
            $adapter = new DAL();
            $query = "INSERT INTO `participation`(`course_id`, `student_id`) VALUES ($studentId, $courseId)";
            $studentsArray = $adapter->fetch($query);
            $studentsObjectsArray = array();
            foreach($studentsArray as $student) {
                array_push($studentsObjectsArray, new CourseStudents($student));
            }
            return $studentsObjectsArray;
        }
}   
?>