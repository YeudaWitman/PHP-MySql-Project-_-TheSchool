<?php
class StudentModel {

    private $student_id;
    private $student_name;
    private $student_phone;
    private $student_email;
    private $student_image;

    function __construct($studentParam) {
        $this->student_id = $studentParam['student_id'];
        $this->student_name = $studentParam['student_name'];
        $this->student_phone = $studentParam['student_phone'];
        $this->student_email = $studentParam['student_email'];
        $this->student_image = $studentParam['student_image'];
    }

    function getID() {
        return $this->student_id;
    }

    function getName() {
        return $this->student_name;
    }

    function getPhone() {
        return $this->student_phone;
    }

    function getEmail() {
        return $this->student_email;
    }

    function getImage() {
        if ($this->student_image === 'empty') {
            return 'uploads/defaultAvatar.jpg';
        } else {
            return $this->student_image;
        }
        
    }
}
?>