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

$get_data = "SELECT * FROM course";

$response = $db -> query($get_data);
if($response){
    $insert_data = "INSERT INTO course(category,code,name,detail,duration,course_time,
    fee,fee_time,logo,added_by,status)VALUES('$category','$code','$course_name','$detail','$duration',
    '$time','$fee','$fee_time','$logo','$added_by','$status')";
     if($db -> query($insert_data)){
    echo 'success';
    move_uploaded_file($location,"../course/".$name);
     }else{
        echo 'enable to store data';
     }
}else{
    $create_table = "CREATE TABLE course(
id INT(11) NOT NULL AUTO_INCREMENT,
category VARCHAR(65),
code VARCHAR(55),
name VARCHAR(55),
detail VARCHAR(55),
duration VARCHAR(55),
course_time VARCHAR(55),
fee VARCHAR(55),
fee_time VARCHAR(65),
logo VARCHAR(55),
added_by VARCHAR(55),
added_date datetime DEFAULT CURRENT_TIMESTAMP,
status VARCHAR(55),
PRIMARY KEY (id)
    )";
    if($db -> query($create_table)){
        $insert_data = "INSERT INTO course(category,code,name,detail,duration,course_time,
        fee,fee_time,logo,added_by,status)VALUES('$category','$code','$course_name','$detail','$duration',
        '$time','$fee','$fee_time','$logo','$added_by','$status')";
         if($db -> query($insert_data)){
        echo 'success';
        move_uploaded_file($location,"../course/".$name);
         }else{
            echo 'enable to store data';
         }
    }

   
}


?>