<?php

// database connection link
require_once("../../common_files/php/database.php");

$category = $_POST['stu-category'];
$course = $_POST['stu-course'];
$batch = $_POST['stu-batch'];
$enrollment = $_POST['enrollment'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$father = $_POST['father'];
$mother = $_POST['mother'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$fee = $_POST['fee'];
$fee_time = $_POST['fee-time'];
$added_by = $_POST['stu-added-by'];
$status = $_POST['status'];


$get_data = "SELECT * FROM students";

$response = $db->query($get_data);
if ($response) {
    $insert_data = "INSERT INTO students(category,course,batch,enrollment,name,dob,gender,father,mother,email,password,mobile,country,state,city,pincode,fee,fee_time,added_by,status)VALUES('$category','$course','$batch','$enrollment','$name','$dob','$gender','$father','$mother','$email','$password','$mobile','$country','$state','$city','$pincode','$fee','$fee_time','$added_by','$status')";
    if ($db->query($insert_data)) {
        echo 'success';
    } else {
        echo 'enable to store data';
    }
} else {
    $create_table = "CREATE TABLE students(
id INT(11) NOT NULL AUTO_INCREMENT,
category VARCHAR(65),
course VARCHAR(65),
batch VARCHAR(65),
enrollment VARCHAR(255),
name VARCHAR(75),
dob VARCHAR(15),
gender VARCHAR(15),
father VARCHAR(65),
mother VARCHAR(65),
email VARCHAR(70),
password VARCHAR(65),
mobile VARCHAR(15),
country VARCHAR(55),
state VARCHAR(55),
city VARCHAR(55),
pincode VARCHAR(55),
fee VARCHAR(55),
fee_time VARCHAR(55),
paid_fee VARCHAR(20) DEFAULT 0,
photo VARCHAR(55),
signature VARCHAR(55),
id_proof VARCHAR(255),
added_by VARCHAR(255),
status VARCHAR(55),
added_date datetime DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
    )";
    if ($db->query($create_table)) {
        $insert_data = "INSERT INTO students(category,course,batch,enrollment,name,dob,gender,father,mother,email,password,mobile,country,state,city,pincode,fee,fee_time,added_by,status)
        VALUES('$category','$course','$batch','$enrollment','$name','$dob','$gender','$father','$mother','$email','$password','$mobile','$country','$state','$city','$pincode','$fee','$fee_time','$added_by','$status')";
        if ($db->query($insert_data)) {
            echo 'success';
        } else {
            echo 'enable to store data';
        }
    } else {
        echo 'unable to creat table';
    }
}
