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

$get_data = "SELECT * FROM batch";

$response = $db -> query($get_data);
if($response){
    $insert_data = "INSERT INTO batch(category,course,code,name,detail,batch_from,batch_to,
        batch_from_date,batch_to_date,logo,added_by,status)VALUES('$batch_category','$batch_course','$batch_code','$batch_name','$batch_detail','$batch_from',
    '$batch_to','$batch_from_date','$batch_to_date','$logo','$added_by','$status')";
     if($db -> query($insert_data)){
    echo 'success';
    move_uploaded_file($location,"../batch/".$name);
     }else{
        echo 'enable to store data';
     }
}else{
    $create_table = "CREATE TABLE batch(
id INT(11) NOT NULL AUTO_INCREMENT,
category VARCHAR(65),
course VARCHAR(65),
code VARCHAR(55),
name VARCHAR(55),
detail VARCHAR(55),
batch_from VARCHAR(55),
batch_to VARCHAR(55),
batch_from_date VARCHAR(55),
batch_to_date VARCHAR(65),
logo VARCHAR(55),
added_by VARCHAR(55),
added_date datetime DEFAULT CURRENT_TIMESTAMP,
status VARCHAR(55),
PRIMARY KEY (id)
    )";
    if($db -> query($create_table)){
        $insert_data = "INSERT INTO batch(category,course,code,name,detail,batch_from,batch_to,
        batch_from_date,batch_to_date,logo,added_by,status)VALUES('$batch_category','$batch_course','$batch_code','$batch_name','$batch_detail','$batch_from',
    '$batch_to','$batch_from_date','$batch_to_date','$logo','$added_by','$status')";
     if($db -> query($insert_data)){
    echo 'success';
    move_uploaded_file($location,"../batch/".$name);
     }else{
        echo 'enable to store data';
     }
    }

   
}


?>
