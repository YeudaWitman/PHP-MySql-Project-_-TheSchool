<?php
include_once '../model/StudentsBL.php';
//include_once '../model/CoursesBL.php';
include_once '../debuger.php';

$uri = explode('/', $_GET['param1']);
$action = $uri['0'];

switch ($action) {
    case "students":
        //http://localhost/PHP_MySQL_Project/api/students/
        //Show All Student
        $studentsBL = new StudentsBL();
        $studentsList = $studentsBL->getStudents();
        $studentArray = array();
        foreach($studentsList as $student) {
            array_push($studentArray, $student->getName());
        }
        $myJSON = json_encode($studentArray);
        echo $myJSON;
        break;
    case "student":
        //http://localhost/PHP_MySQL_Project/api/student/{id}
        $studentId = $uri['1'];
        $studentsBL = new StudentsBL();
        $studentObj = $studentsBL->getStudentDetails($studentId);
        $studentArr = array(
            'Name' => $studentObj['0']->getName(), 
            'Phone' => $studentObj['0']->getPhone(), 
            'Email' => $studentObj['0']->getEmail(), 
            'Image' => $studentObj['0']->getImage(), 
                );
        $studentJSON = json_encode($studentArr);
        echo $studentJSON;
        break;
    case "sales":
        //http://localhost/PHP_MySQL_Project/api/student/post
        //Add student
        //$studentsBL = new StudentsBL();
        // $student is $_POST
        //$studentsList = $studentsBL->insertStudent($studentP);
        break;
    default:
        break;
}




?>