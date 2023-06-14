<?php
// database connection link
require_once("../../common_files/php/database.php");
$table = $_POST['table'];
$category = $_POST['category'];
$course = $_POST['course'];
$get_batch = "SELECT * FROM $table WHERE category = '$category' AND course = '$course'";

$response = $db -> query($get_batch);
$all_data = [];
if($response){

    if($response -> num_rows != 0){
        while($data = $response -> fetch_assoc()){
            array_push($all_data,$data);

        }
        print_r(json_encode($all_data));

    }else{
        echo 'there is no data';  
    }
    
}else{
    echo 'there is no data'; 
}

?>