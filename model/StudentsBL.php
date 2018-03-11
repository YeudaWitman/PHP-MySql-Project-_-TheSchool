<?php
include_once 'DAL.php';
include_once 'StudentModel.php';
//include_once './debuger.php';

class StudentsBL {
    function getStudents() {
        $adapter = new DAL();
        $query = "SELECT * FROM `students`";
        $studentsArray = $adapter->fetch($query);
        $studentsObjectsArray = array();
        foreach($studentsArray as $student) {
            array_push($studentsObjectsArray, new StudentModel($student));
        }
        return $studentsObjectsArray;
    }

    function getStudentDetails($studentId) {
        $adapter = new DAL();
        $query = "SELECT * FROM `students` WHERE student_id = $studentId";
        $studentsArray = $adapter->fetch($query);
        $studentsObjectsArray = array();
        if (is_array($studentsArray) || is_object($studentsArray)) {
            foreach($studentsArray as $student) {
            array_push($studentsObjectsArray, new StudentModel($student));
            }
        }
        return $studentsObjectsArray;
    }

    function insertStudent($student) {
        if (isset($student['image'])) {
            $studentImage = $student['image'];
        } else {
            $studentImage = 'empty';
        }
        $adapter = new DAL();
        $query = 'INSERT INTO `students` (`student_name`, `student_phone`, `student_email`,  `student_image`)
            VALUES ("'.$student['studentName'].'","'.$student['phone'].'","'.$student['email'].'","'.$studentImage.'")';
        //return the last id inserted to db
        $lastId = $adapter->fetchInsert($query);
        if (isset($student['course'])) {
            $courseIdArray = $student['course'];
            foreach ($courseIdArray as $courseId) {
                $query = "INSERT INTO `participation`(`course_id`, `student_id`) VALUES ($courseId, $lastId)";
                $studentsArray = $adapter->fetch($query);
            }
        }
    }
       
    function deleteStudent($studentId) {
        $adapter = new DAL();
        $query = 'DELETE FROM `students` WHERE `student_id`="'.$studentId.'"';
        $studentsArray = $adapter->fetch($query);
        $query = 'DELETE FROM `participation` WHERE `student_id`="'.$studentId.'"';
        $studentsArray = $adapter->fetch($query);
    }

    function updateStudent($student, $studentId) {
        if (isset($student['image'])) {
            $studentImage = $student['image'];
        } else {
            $studentImage = 'empty';
        }
        $adapter = new DAL();
        $query = 'UPDATE `students`
            SET `student_name`="'.$student['studentName'].'",
                `student_phone`="'.$student['phone'].'",
                `student_email`="'.$student['email'].'",
                 `student_image` ="'.$studentImage.'" WHERE `student_id`="'.$studentId.'"';
        $studentsArray = $adapter->fetch($query);
        $courseIdArray = $student['course'];
        if (isset($student['course'])) {
            $courseIdArray = $student['course'];
            $queryDel = 'DELETE FROM `participation` WHERE `student_id`="'.$studentId.'"';
            $studentsArrayDel = $adapter->fetch($queryDel);
            foreach ($courseIdArray as $courseId) {
                $queryIns = "INSERT INTO `participation`(`course_id`, `student_id`) VALUES ($courseId, $studentId)";
                $studentsArrayIns = $adapter->fetch($queryIns);
            }
        } 
    }
}
?>