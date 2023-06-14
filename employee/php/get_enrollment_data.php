<?php
// database connection link
require_once("../../common_files/php/database.php");
$table = $_POST['table'];
$data = $_POST['user_data'];

$get_enrollment = "SELECT * FROM  $table WHERE enrollment = '$data'";
$response = $db -> query($get_enrollment);
if($response){
    if($response -> num_rows != 0){
        $data = $response -> fetch_assoc();
        echo json_encode($data);
        }else{
           echo 'not match'; 
        }
}else{
    echo 'not match'; 
}

?>
