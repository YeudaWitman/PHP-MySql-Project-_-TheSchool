<?php
include_once 'dal.php';
include_once 'CourseModel.php';
include_once 'course-students.php';
include_once 'debuger.php';

class CoursesBL {
    function getCourses() {
        $adapter = new DAL();
        $query = "SELECT * FROM `courses`";
        $CoursesArray = $adapter->fetch($query);
        //var_dump($CoursesArray['0']['course_id']);
        $CoursesObjectsArray = array();
        foreach($CoursesArray as $Course) {
            array_push($CoursesObjectsArray, new CourseModel($Course));
        }
        return $CoursesObjectsArray;
    }

    function getCourseDetails($courseId) {
        $adapter = new DAL();
        $query = "SELECT * FROM `courses` WHERE course_id = $courseId";
        $CoursesArray = $adapter->fetch($query);
        $CoursesObjectsArray = array();
        if (is_array($CoursesArray) || is_object($CoursesArray)) {
            foreach($CoursesArray as $Course) {
            array_push($CoursesObjectsArray, new CourseModel($Course));
            }
        }


       // debug($CoursesArray);
        return $CoursesObjectsArray;
    }
    //get students of specific course
    function getCourseStudents($courseId) {
        $adapter = new DAL();
        $query = "SELECT * FROM `participation` WHERE course_id = $courseId";
        $CoursesArray = $adapter->fetch($query);
        $CoursesObjectsArray = array();
        foreach($CoursesArray as $Course) {
            array_push($CoursesObjectsArray, new CourseStudents($Course));
        }
        //debug($CoursesArray);
        return $CoursesObjectsArray;
    }

    function insertCourse($Course) {
        $adapter = new DAL();
        if (isset($Course['capacity'])) {
            $courseCapacity = $Course['capacity'];
        } else {
            $courseCapacity = 20;
        }
        if (isset($Course['image'])) {
            $CourseImage = $Course['image'];
        } else {
            $CourseImage = 'empty';
        }

        $query = 'INSERT INTO `courses` (`course_name`, `course_description`, `course_image`, `course_capacity`)
            VALUES ("'.$Course['courseName'].'","'.$Course['courseDescription'].'","'.$CourseImage.'","'.$courseCapacity.'")';
        $CourseArray = $adapter->fetch($query);
    }

    function deleteCourse($courseId) {
        $adapter = new DAL();
        $query = 'DELETE FROM `courses` WHERE `course_id`="'.$courseId.'"';
        $CourseArray = $adapter->fetch($query);
        $query = 'DELETE FROM `participation` WHERE `course_id`="'.$courseId.'"';
        $CourseArray = $adapter->fetch($query);
    }

    function updateCourse($course, $courseId) {
        $adapter = new DAL();
        $query = 'UPDATE `courses`
            SET `course_name`="'.$course['courseName'].'",
                `course_description`="'.$course['courseDescription'].'",
                `course_image`="'.$course['image'].'",
                `course_capacity`="'.$course['capacity'].'" WHERE `course_id`="'.$courseId.'"';
        $CourseArray = $adapter->fetch($query);
    }
}
?>