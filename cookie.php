<?php
require("common_files/php/database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot strape 5 link css -->
    <link rel="stylesheet" href="common_files/css/bootstrap.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="common_files/css/animation.css">
    <!-- index css link -->
    <link rel="stylesheet" href="pages/index.css">
    <!-- bootstrap javascript -->
    <script src="common_files/js/bootstrap.bundle.min.js"></script>
    <!-- font owsum -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweetalert -->
    <script src="common_files/js/sweetalert.js"></script>
    <!-- jqueary -->
    <script src="common_files/js/jquery.js"></script>
    <title>sms-app</title>

</head>

<body>
    <?php require("assets/nav.php") ?>
 <div class="container p-4 bg-white shadow-lg border" style="margin-top: 100px;">
    <?php echo $brand_res['brand_cookie'] ?>
 </div>
    <?php require("assets/footer.php") ?>
</body>

</html>