<?php
class CourseStudents {

    private $course_id;
    private $student_id;

    function __construct($courseParam) {
        $this->course_id = $courseParam['course_id'];
        $this->student_id = $courseParam['student_id'];

    }
    function getCourseId() {
        return $this->course_id;
    }

    function getStudentId() {
        return $this->student_id;
    }
    
    function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    function setStudentId($student_id) {
        $this->student_id = $student_id;
    }
}   
?>