<?php
class CourseModel {

    private $course_id;
    private $course_name;
    private $course_description;
    private $course_image;
    private $course_capacity;

    function __construct($courseParam) {
        $this->course_id = $courseParam['course_id'];
        $this->course_name = $courseParam['course_name'];
        $this->course_description = $courseParam['course_description'];
        $this->course_image = $courseParam['course_image'];
        $this->course_capacity = $courseParam['course_capacity'];
    }

    function getID() {
        return $this->course_id;
    }

    function getName() {
        return $this->course_name;
    }

    function getDescription() {
        return $this->course_description;
    }

    function getImage() {
        return $this->course_image;
    }

    function getCapacity() {
        if (empty($this->course_capacity)) {
            return 20;
        } else {
            return $this->course_capacity;
        }
    }

}
?>