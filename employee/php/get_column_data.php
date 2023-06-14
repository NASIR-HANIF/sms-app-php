<?php 
// database connection link
require_once("../../common_files/php/database.php");

$table = $_POST['table'];
$data = $_POST['user_data'];
$column = $_POST['column'];

$get_data = "SELECT $column FROM $table Where $column = '$data'";
$response = $db -> query($get_data);
if($response){
    if($response -> num_rows == 0){
        echo 'not match';
        }else{
        echo 'Already Exists !';
        }
}else{
    echo 'not match';
}
