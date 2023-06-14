<?php
// database connection link
require_once("../../common_files/php/database.php");

// access category and details
$category = json_decode($_POST['category']);
$details = json_decode($_POST['details']);
// category length check
$length = count($category);
$message = "";
$get_category = "SELECT * FROM category";
$response = $db -> query($get_category);

if($response){
        for($i = 0; $i <$length;$i++){
            $insertData = "INSERT INTO category(category_name,details)
            VALUES('$category[$i]','$details[$i]')";
            if($db ->query($insertData)){
                $message = 'success';
            }else{
                $message = 'unable to store data';
            }
        }
        echo $message;   
}else{
    $create_table = "CREATE TABLE category(
id INT(11) NOT NULL AUTO_INCREMENT,
category_name VARCHAR(255),
details VARCHAR(255),
PRIMARY KEY(id)
 )";

 if($db -> query($create_table)){
    for($i = 0; $i <$length;$i++){
        $insertData = "INSERT INTO category(category_name,details)
        VALUES('$category[$i]','$details[$i]')";
        if($db ->query($insertData)){
            $message = 'success';
        }else{
            $message = 'unable to store data';
        }
    }

    echo $message;
 }else{
    echo 'unable to creat table';
 }
}
