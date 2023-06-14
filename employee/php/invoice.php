<?php
// database connection link
require_once("../../common_files/php/database.php");
require("../../dompdf/autoload.inc.php");

$enrollment = $_GET['enrollment'];
$name = $_GET['name'];
$category = $_GET['category'];
$course = $_GET['course'];
$batch = $_GET['batch'];
$paid_fee = $_GET['paid-fee'];
$date = $_GET['date'];
$fee_time = $_GET['fee-time'];
$pending = $_GET['pending'];
$recent = $_GET['recent'];

use Dompdf\Dompdf;
$x = new Dompdf();

$design = '

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASIR INSTITUTE</title>
</head>
<body>
    <h1 style="background-color: green;text-align: center;color: white;padding: 1rem ;">NASIR INSTITUTE INVOICE</h1>
    <p style="text-align: center; font-size: 16px;">Block 4 Near Fatima Massjid Metrowill Karachi</p>
    <div style="width: 500px;">
        <strong>Name : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$name.'</span><br><br>
        <strong>Enrollment : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$enrollment.'</span><br><br>
        <strong>Date : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$date.'</span><br><br>
        <strong>Fee Time : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$fee_time.'</span><br><br>
        <strong>Paid Fee : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$paid_fee.'</span><br><br>
    </div>
    <table style="width: 100%;border: 2px solid green;">
        <thead>
            <tr>
                <th style="padding: 5px;">Sr</th>
                <th style="padding: 5px;">Category</th>
                <th style="padding: 5px;">Course</th>
                <th style="padding: 5px;">Batch</th>
                <th style="padding: 5px;">Pending Amount</th>
                <th style="padding: 5px;">Recent Paid</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;padding: 5px;">1</td>
                <td style="text-align: center;padding: 5px;">'.$category.'</td>
                <td style="text-align: center;padding: 5px;">'.$course.'</td>
                <td style="text-align: center;padding: 5px;">'.$batch.'</td>
                <td style="text-align: center;padding: 5px;">'.$pending.'</td>
                <td style="text-align: center;padding: 5px;">'.$recent.'</td>
            </tr>
        </tbody>
    </table>
    <h2>
        TERMS AND CONDITIONS:-
    </h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Numquam voluptatum nobis id voluptas. Voluptatem, nostrum atque.
        Voluptatum quam deserunt fugit ex debitis ullam inventore labore provident.
        Fugiat, labore. Eius totam nulla molestiae natus libero quae modi sapiente omnis temporibus odio fugiat id quod
        voluptate laborum excepturi atque amet commodi,
        minus placeat, rem nostrum. Odio eaque dolorem eius,
        tempora ullam debitis ea obcaecati quod quam illum. Vero minima suscipit repellendus sint. Cumque adipisci
        illum, repellendus architecto nostrum natus omnis recusandae libero fuga perferendis,
        provident commodi unde enim totam alias officia ex aspernatur incidunt neque voluptatibus debitis voluptates
        rem! Nesciunt, hic facere.
    </p>
</body>
</html>
';

$x -> loadHtml($design);
$x -> setPaper('A4','portrait');
$x -> render();
$x -> stream();
?>