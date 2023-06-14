<?php

// database connection link
require_once("../../common_files/php/database.php");

$id = $_POST['id'];
$table = $_POST['table'];

$delete_data = "DELETE FROM $table WHERE id = '$id' ";
if($db -> query($delete_data)){
    echo "success";
}else{
    echo "unable to delete data";
}

?>