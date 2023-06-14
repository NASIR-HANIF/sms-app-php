<?php
// database connection link
require_once("../../common_files/php/database.php");

$category = $_POST['course-category'];
$code = $_POST['course-code'];
$course_name = $_POST['course-name'];
$detail = $_POST['course-detail'];
$duration = $_POST['course-duration'];
$time = $_POST['course-time'];
$fee = $_POST['course-fee'];
$fee_time = $_POST['course-fee-time'];
$file = $_FILES['course-logo'];
$added_by = $_POST['course-added-by'];
$status = $_POST['status'];
$id = $_POST['id'];

$logo = "";
$name = "";
$location = "";

if($file['name']  == ""){
    $logo = "";
    $name = "";
    $location = "";
}else{
    $name = $file['name'];
    $location = $file['tmp_name'];
    $logo = "course/".$name;
}

if($file['name'] == ""){
    $update_course = "UPDATE course SET category = '$category',code = '$code',name = '$course_name',detail = '$detail',
     duration = '$duration',course_time = '$time',fee = '$fee',fee_time = '$fee_time',added_by = '$added_by',
     status = '$status' WHERE id = '$id'";
     if($db -> query($update_course)){
        echo 'Success';
     }else{
        echo 'unable to update data';
     }
}else{
    $update_course = "UPDATE course SET category = '$category',code = '$code',name = '$course_name',detail = '$detail',
    duration = '$duration',course_time = '$time',fee = '$fee',fee_time = '$fee_time',logo = '$logo',added_by = '$added_by',
    status = '$status' WHERE id = '$id'";
    if($db -> query($update_course)){
       echo 'Success';
       move_uploaded_file($location,"../course/".$name);
    }else{
       echo 'unable to update data';
    }
}

?>