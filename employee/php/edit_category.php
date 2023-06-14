<?php
// database connection link
require_once("../../common_files/php/database.php");

// access category and details
$category = $_POST['category'];
$details = $_POST['details'];
$id = $_POST['id'];



$upDate_category = "UPDATE category SET category_name = '$category',details = '$details' WHERE id = '$id'";

if($db -> query($upDate_category)){
    echo 'success';
}else{
    echo "unable to update data";
}

?>