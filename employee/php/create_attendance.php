<?php
// database connection link
require_once("../../common_files/php/database.php");

$name = json_decode($_POST['name']);
$enrollment = json_decode($_POST['enrollment']);
$batch = json_decode($_POST['batch']);
$attendance = json_decode($_POST['attendance']);
$length = count($name);
$message = "";


$getData = "SELECT * FROM attendance";
$response = $db -> query($getData);
if($response){
    for($i = 0; $i < $length;$i++){
        $insert_data = "INSERT INTO attendance(name,enrollment,batch,attendance)VALUES('$name[$i]','$enrollment[$i]','$batch[$i]','$attendance[$i]')";
    if($db -> query($insert_data)){
       $message = "success";  
    }else{
         $message = "Unable To Insert Data";
    }
    }
    echo $message;
}else{
    $creattable = "CREATE TABLE attendance(
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(55),
        enrollment VARCHAR(55),
        batch VARCHAR(55),
        attendance VARCHAR(55),
        PRIMARY KEY (id)

    )";
    if($db -> query($creattable)){
for($i = 0; $i < $length;$i++){
    $insert_data = "INSERT INTO attendance(name,enrollment,batch,attendance)VALUES('$name[$i]','$enrollment[$i]','$batch[$i]','$attendance[$i]')";
if($db -> query($insert_data)){
   $message = "success";  
}else{
     $message = "Unable To Insert Data";
}
}
echo $message;
    }else{
echo "Unable To Creat Table";
    }
}
