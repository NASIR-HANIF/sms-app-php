<?php
// database connection link
require_once("../../common_files/php/database.php");
$table = $_POST['table'];
$category = $_POST['category'];
$get_course = "SELECT name FROM $table WHERE category = '$category'";

$response = $db -> query($get_course);
$all_data = [];
if($response){

    if($response -> num_rows != 0){
        while($data = $response -> fetch_assoc()){
            array_push($all_data,$data);

        }
        echo json_encode($all_data);

    }else{
        echo 'there is no data';  
    }
    
}else{
    echo 'there is no data'; 
}

?>