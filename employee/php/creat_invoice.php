<?php
// database connection link
require_once("../../common_files/php/database.php");

$enrollment = $_POST['invoice-enrollment'];
$name = $_POST['invoice-name'];
$category = $_POST['invoice-category'];
$course = $_POST['invoice-course'];
$batch = $_POST['invoice-batch'];
$paid_fee = $_POST['paid_fee'];
$pending = $_POST['pending'];
$fee_time = $_POST['invoice-fee-time'];
$invoice_pending = $_POST['invoice-pending'];
$invoice_recent = $_POST['invoice-recent'];
$date = $_POST['date'];

$get_data = "SELECT * FROM invoice";
$response = $db -> query($get_data);
if($response){
    $insert_data = "INSERT INTO invoice(enrollment,name,category,course,batch,paid_fee,pending,fee_time,recent_paid,invoice_date)
    VALUES('$enrollment','$name','$category','$course','$batch','$paid_fee','$pending','$fee_time','$invoice_recent','$date')";
    if($db -> query(($insert_data))){
        $update_student = "UPDATE students SET paid_fee = '$paid_fee' WHERE enrollment ='$enrollment'";
        $db -> query($update_student);
        echo 'success';

    }else{
        echo 'unable to insert data';

    }
}else{
    $create_table = "CREATE TABLE invoice(
id INT(11) NOT NULL AUTO_INCREMENT,
enrollment VARCHAR(50),
name VARCHAR(50),
category VARCHAR(50),
course VARCHAR(50),
batch VARCHAR(50),
paid_fee VARCHAR(50),
pending VARCHAR(50),
fee_time VARCHAR(50),
recent_paid VARCHAR(50),
invoice_date VARCHAR(50),
PRIMARY KEY(id)
    )";
    if($db ->query(($create_table))){
    $insert_data = "INSERT INTO invoice(enrollment,name,category,course,batch,paid_fee,pending,fee_time,recent_paid,invoice_date)
    VALUES('$enrollment','$name','$category','$course','$batch','$paid_fee','$pending','$fee_time','$invoice_recent','$date')";
    if($db -> query(($insert_data))){
        $update_student = "UPDATE students SET paid_fee = '$paid_fee' WHERE enrollment ='$enrollment'";
        $db -> query($update_student);
        echo 'success';

    }else{
        echo 'unable to insert data';

    }
    }else{
    echo "Unable To Created Table";
    }
}
