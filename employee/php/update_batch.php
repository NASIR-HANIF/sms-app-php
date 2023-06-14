<?php
// database connection link
require_once("../../common_files/php/database.php");

$batch_category = $_POST['batch-category'];
$batch_course = $_POST['batch-course'];
$batch_code = $_POST['batch-code'];
$batch_name = $_POST['batch-name'];
$batch_detail = $_POST['batch-detail'];
$batch_from = $_POST['batch-from'];
$batch_to = $_POST['batch-to'];
$batch_from_date = $_POST['batch-from-date'];
$batch_to_date = $_POST['batch-to-date'];
$file = $_FILES['batch-logo'];
$added_by = $_POST['batch-added-by'];
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
    $logo = "batch/".$name;
}

if($file['name'] == ""){
    $update_batch = "UPDATE batch SET category = '$batch_category',course = '$batch_course',code = '$batch_code',name = '$batch_name',detail = '$batch_detail',
     batch_from = '$batch_from',batch_to = '$batch_to',batch_from_date = '$batch_from_date',batch_to_date = '$batch_to_date',added_by = '$added_by',
     status = '$status' WHERE id = '$id'";
     if($db -> query($update_batch)){
        echo 'success';
     }else{
        echo 'unable to update data';
     }
}else{
    $update_batch = "UPDATE batch SET category = '$batch_category',course = '$batch_course',code = '$batch_code',name = '$batch_name',detail = '$batch_detail',
     batch_from = '$batch_from',batch_to = '$batch_to',batch_from_date = '$batch_from_date',batch_to_date = '$batch_to_date',logo = '$logo',added_by = '$added_by',
     status = '$status' WHERE id = '$id'";
     if($db -> query($update_batch)){
        move_uploaded_file($location,"../batch/".$name);
        echo 'success';
     }else{
        echo 'unable to update data';
     }
}

?>