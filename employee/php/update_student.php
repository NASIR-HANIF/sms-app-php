<?php
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
$id = $_POST['id'];


$update_student = "UPDATE students SET category = '$category',course = '$course',batch = '$batch',enrollment = '$enrollment',
 name= '$name',dob = '$dob',gender = '$gender',father = '$father',mother = '$mother',email = '$email',password = '$password',
 mobile = '$mobile',country = '$country',state = '$state',city = '$city',pincode = '$pincode',fee = '$fee',fee_time = '$fee_time',added_by = '$added_by',status = '$status',
status = '$status' WHERE id = '$id'";
if($db -> query($update_student)){
   echo 'success';
}else{
   echo 'unable to update data';
}


?>