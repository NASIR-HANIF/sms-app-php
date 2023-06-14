<?php
// database connection link
require_once("../../common_files/php/database.php");
$table = $_POST['table'];

$allCategory = [];
$get_category_list = "SELECT * FROM $table";

$response = $db -> query($get_category_list);

if($response){
if($response -> num_rows != 0){
while($data = $response ->fetch_assoc()){
array_push($allCategory,$data);
}
echo json_encode($allCategory);
}else{
    echo 'There is no category table data'; 
}
}else{
    echo 'There is no category';
}

?>